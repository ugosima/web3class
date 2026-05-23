<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Throwable;

class WelcomeController extends Controller
{
    private const CACHE_SECONDS = 120;

    public function index(): View
    {
        $marketData = $this->cachedCoinGeckoData(
            'coingecko.market_data',
            fn () => $this->fetchMarketData()
        );

        $cryptoNews = $this->cachedCoinGeckoData(
            'coingecko.crypto_news',
            fn () => $this->fetchCryptoNews()
        );

        return view('welcome', [
            'cryptoPrices' => $marketData['data'],
            'cryptoNews' => $cryptoNews['data'],
            'cryptoPricesUpdatedAt' => $marketData['updated_at'],
            'cryptoNewsUpdatedAt' => $cryptoNews['updated_at'],
        ]);
    }

    private function cachedCoinGeckoData(string $key, callable $fetcher): array
    {
        $cached = Cache::get($key);

        if ($cached && Carbon::parse($cached['fetched_at'])->gt(now()->subSeconds(self::CACHE_SECONDS))) {
            return $cached;
        }

        try {
            $fresh = [
                'data' => $fetcher(),
                'fetched_at' => now(),
                'updated_at' => now()->format('M j, Y, g:i:s A'),
            ];

            Cache::put($key, $fresh);

            return $fresh;
        } catch (Throwable $exception) {
            report($exception);

            return $cached ?? [
                'data' => [],
                'fetched_at' => now(),
                'updated_at' => null,
            ];
        }
    }

    private function fetchMarketData(): array
    {
        $coins = [
            'bitcoin',
            'ethereum',
            'solana',
            'binancecoin',
            'bittensor',
            'arbitrum',
            'sui',
        ];

        return $this->coinGeckoRequest('/coins/markets', [
            'vs_currency' => 'usd',
            'ids' => implode(',', $coins),
            'order' => 'market_cap_desc',
            'sparkline' => 'false',
            'price_change_percentage' => '24h',
        ])->json() ?? [];
    }

    private function fetchCryptoNews(): array
    {
        if (! config('services.coingecko.api_key')) {
            return [];
        }

        return collect($this->coinGeckoRequest('/news', [
            'page' => 1,
            'per_page' => 5,
            'language' => 'en',
            'type' => 'news',
        ])->json() ?? [])
            ->map(function (array $article) {
                $postedAt = data_get($article, 'posted_at');

                return [
                    'title' => data_get($article, 'title'),
                    'url' => data_get($article, 'url'),
                    'image' => data_get($article, 'image'),
                    'author' => data_get($article, 'author'),
                    'source_name' => data_get($article, 'source_name'),
                    'posted_at' => $postedAt,
                    'posted_at_display' => $postedAt
                        ? Carbon::parse($postedAt)->format('M j, Y')
                        : null,
                ];
            })
            ->filter(fn (array $article) => filled($article['title']) && filled($article['url']))
            ->take(5)
            ->values()
            ->all();
    }

    private function coinGeckoRequest(string $endpoint, array $query)
    {
        $apiKey = config('services.coingecko.api_key');
        $baseUrl = $apiKey
            ? config('services.coingecko.pro_url')
            : config('services.coingecko.demo_url');

        $request = Http::acceptJson()
            ->timeout(10)
            ->retry(2, 300);

        if ($apiKey) {
            $request = $request->withHeader('x-cg-pro-api-key', $apiKey);
        }

        return $request
            ->get(rtrim($baseUrl, '/') . $endpoint, $query)
            ->throw();
    }
}
