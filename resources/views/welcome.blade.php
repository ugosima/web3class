
<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <x-slot name="title">HOME</x-slot>
    <style>
        body { background: linear-gradient(to bottom, #f8fafc, #ffffff); }
    </style>


    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl -ml-48 -mb-48"></div>

        <div class="relative max-w-7xl mx-auto px-6 py-32 text-center">
            <div class="space-y-8">
                <div class="inline-block bg-emerald-500/20 border border-emerald-400/40 rounded-full px-4 py-2">
                    <span class="text-emerald-300 text-sm font-semibold">Welcome to Web3 Learning</span>
                </div>

                <h1 class="text-5xl md:text-6xl font-bold text-white leading-tight">
                    Welcome to the All New World of <span class="text-emerald-400">Digital Finance</span>
                </h1>

                <p class="text-xl text-slate-300 max-w-2xl mx-auto italic">
                    "Every lesson completed brings you closer to something valuable"
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-8">
                    <a href="{{ route('register') }}" class="inline-block bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-8 py-4 rounded-lg transition transform hover:scale-105 duration-300 shadow-lg shadow-emerald-500/30">
                        Get Started →
                    </a>
                    <a href="{{ route('login') }}" class="inline-block border-2 border-emerald-400 text-emerald-400 hover:bg-emerald-500/10 font-semibold px-8 py-4 rounded-lg transition duration-300">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Crypto Market Section -->
    <section class="py-10 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-6">
                <h2 class="text-4xl md:text-3xl font-bold text-slate-900 mb-3">Crypto market overview</h2>
                {{-- <p class="text-lg text-slate-600">Real-time cryptocurrency prices and market data</p> --}}
                {{-- <div class="h-1 w-16 bg-emerald-500 mt-6"></div> --}}
            </div>

            <!-- Crypto Table -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-2xl shadow-slate-900/10">
                <div class="px-6 py-5 bg-slate-950 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-wider text-emerald-300 font-bold">Live Market</p>
                        <h3 class="text-xl font-bold text-white">Top Crypto Assets</h3>
                    </div>
                    <div class="inline-flex items-center gap-2 text-sm text-slate-300">
                        <span class="h-2 w-2 rounded-full bg-emerald-400 shadow-lg shadow-emerald-400/60"></span>
                        Updating from CoinGecko
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <!-- Table Header -->
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 border-b border-slate-200">
                                <th class="px-6 py-4 text-left font-bold text-xs uppercase tracking-wider">Asset</th>
                                <th class="px-6 py-4 text-right font-bold text-xs uppercase tracking-wider">Price</th>
                                <th class="px-6 py-4 text-right font-bold text-xs uppercase tracking-wider">24h Change</th>
                                <th class="px-6 py-4 text-right font-bold text-xs uppercase tracking-wider hidden md:table-cell">Market Cap</th>
                            </tr>
                        </thead>

                        <tbody id="crypto-body" class="divide-y divide-slate-200">
                            @forelse ($cryptoPrices as $coin)
                                @php
                                    $change = $coin['price_change_percentage_24h'] ?? 0;
                                    $isPositive = $change >= 0;
                                    $changeClasses = $isPositive
                                        ? 'bg-emerald-50 text-emerald-600 ring-emerald-100'
                                        : 'bg-red-50 text-red-600 ring-red-100';
                                @endphp

                                <tr class="border-b border-slate-100 hover:bg-slate-50/80 transition-colors">
                                    <td class="px-6 py-5 text-left">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ $coin['image'] ?? '' }}" alt="{{ $coin['name'] ?? 'Crypto' }} logo" class="h-10 w-10 rounded-full ring-1 ring-slate-200">
                                            <div>
                                                <div class="text-base font-extrabold text-slate-950 leading-tight">{{ $coin['name'] ?? 'Unknown asset' }}</div>
                                                <div class="text-xs font-semibold uppercase tracking-wide text-slate-500">{{ $coin['symbol'] ?? '' }}/USD</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-5 text-right font-semibold text-slate-800 tabular-nums">
                                        ${{ number_format($coin['current_price'] ?? 0, 2) }}
                                    </td>

                                    <td class="px-6 py-5 text-right">
                                        <span class="inline-flex min-w-20 justify-center rounded-full px-3 py-1 text-xs font-bold ring-1 {{ $changeClasses }}">
                                            {{ $isPositive ? '+' : '' }}{{ number_format($change, 2) }}%
                                        </span>
                                    </td>

                                    <td class="px-6 py-5 text-right hidden md:table-cell font-semibold text-slate-700 tabular-nums">
                                        ${{ number_format(($coin['market_cap'] ?? 0) / 1000000000, 2) }}B
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-slate-500">
                                        Market data is temporarily unavailable.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer Info -->
                <div class="px-6 py-4 bg-slate-200/50 border-t border-slate-200 flex items-center justify-between text-sm text-slate-600">
                    <p>Last updated: <span id="update-time" class="font-semibold text-slate-900">{{ $cryptoPricesUpdatedAt ?? '--' }}</span></p>
                    <p class="hidden sm:block text-slate-600">Data from major cryptocurrency exchanges</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Features Section -->
    <section id="features" class="py-2 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-10">
                <h2 class="text-4xl md:text-3xl font-bold text-slate-900 mb-4">Why choose TOKENDEMY?</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group relative p-8 bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl border border-slate-200 hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="relative z-10">
                        <div class="mb-4 flex justify-center">
                            <div class="w-14 h-14 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-bullseye text-emerald-600 text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3 text-center">Goal-Based Learning</h3>
                        <p class="text-slate-600 text-center">Clearly defined learning objectives that guide your Web3 journey step by step.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative p-8 bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl border border-slate-200 hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="relative z-10">
                        <div class="mb-4 flex justify-center">
                            <div class="w-14 h-14 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-gift text-emerald-600 text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3 text-center">100% Free</h3>
                        <p class="text-slate-600 text-center">Learning is completely free with no hidden charges. Just sign up and explore.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative p-8 bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl border border-slate-200 hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="relative z-10">
                        <div class="mb-4 flex justify-center">
                            <div class="w-14 h-14 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-wrench text-emerald-600 text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3 text-center">Practice Based</h3>
                        <p class="text-slate-600 text-center">Learn through hands-on practice with demo versions of real DeFi tools.</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="group relative p-8 bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl border border-slate-200 hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="relative z-10">
                        <div class="mb-4 flex justify-center">
                            <div class="w-14 h-14 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-lightning-bolt text-emerald-600 text-2xl">
                                    <x-icons.bolt color="text-yellow-700" size="w-9 h-9"/>
</i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3 text-center">Quick Micro Lessons</h3>
                        <p class="text-slate-600 text-center">Short, powerful lessons designed perfectly for busy people like you.</p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="group relative p-8 bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl border border-slate-200 hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="relative z-10">
                        <div class="mb-4 flex justify-center">
                            <div class="w-14 h-14 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-magnet text-emerald-600 text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3 text-center">Disciplined Learning</h3>
                        <p class="text-slate-600 text-center">Persuasive learning conditions that help you maintain focus and consistency.</p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="group relative p-8 bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl border border-slate-200 hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                    <div class="relative z-10">
                        <div class="mb-4 flex justify-center">
                            <div class="w-14 h-14 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-trophy text-emerald-600 text-2xl"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3 text-center">Progress Points</h3>
                        <p class="text-slate-600 text-center">Get points for your progress and achievements. Track your growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    {{-- Crypto news section  --}}

    <section class="py-10 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-8">
                <h2 class="text-4xl md:text-3xl font-bold text-slate-900 mb-4">Latest Crypto News</h2>
                <p class="text-lg text-slate-600">Stay updated with the latest happenings in the crypto world</p>
            </div>

            <!-- News Grid -->
            <div id="news-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($cryptoNews as $article)
                    <a href="{{ $article['url'] }}" target="_blank" rel="noopener noreferrer" class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                        @if (! empty($article['image']))
                            <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="h-44 w-full object-cover">
                        @else
                            <div class="h-44 bg-gradient-to-r from-slate-900 to-emerald-600"></div>
                        @endif
                        <div class="bg-gradient-to-r from-gray-800 to-green-600 h-1"></div>
                        <div class="p-8">
                            <div class="mb-4">
                                <p class="text-xs font-bold uppercase tracking-wider text-emerald-700">
                                    {{ $article['source_name'] ?? 'CoinGecko News' }}
                                </p>
                                <h3 class="mt-2 text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition">
                                    {{ $article['title'] }}
                                </h3>
                            </div>
                            <div class="flex items-center justify-between gap-4 text-sm text-slate-500">
                                <span>{{ $article['author'] ?? 'Crypto desk' }}</span>
                                <span>{{ $article['posted_at_display'] ?? '' }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach



                 <!-- Aidrops &ICO  -->
                <div class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="bg-gradient-to-r from-gray-800 to-green-600 h-1"></div>
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-12 h-12 bg-emerald-500/20 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/30 transition">
                                <i class="fa-solid fa-link text-emerald-600 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">AIRDROPS & ICO</h3>
                        </div>
                        <p class="text-slate-600 mb-6">Stay informed about the latest airdrop opportunities and initial coin offerings in the cryptocurrency space.</p>
                        <div class="inline-block bg-emerald-500/10 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">Coming Soon</div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Coming Soon Section -->
    <section id="coming" class="py-2 bg-gradient-to-b from-slate-50 to-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-3xl font-bold text-slate-900">Coming Soon</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Exciting features in development to supercharge your Web3 learning journey</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
               
                <!-- DApp Demos -->
                <div class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="bg-gradient-to-r from-gray-800 to-green-600 h-1"></div>
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-12 h-12 bg-emerald-500/20 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/30 transition">
                                <i class="fa-solid fa-link text-emerald-600 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">DApp DEMOs</h3>
                        </div>
                        <p class="text-slate-600 mb-6">Interactive live demos of real DeFi applications with tutorial walkthroughs.</p>
                        <div class="inline-block bg-emerald-500/10 text-emerald-700 px-3 py-1 rounded-full text-xs font-semibold">Coming Soon</div>
                    </div>
                </div>

                <!-- Market Analytics -->
                <div class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                <div class="bg-gradient-to-r from-green-600 to-purple-500 h-1"></div>
                    
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-12 h-12 bg-slate-900/10 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/20 transition">
                                <i class="fa-solid fa-chart-line text-slate-900 text-xl group-hover:text-emerald-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">Market Analytics</h3>
                        </div>
                        <p class="text-slate-600 mb-6">Real-time charts, price tracking, and market sentiment analysis to help you understand crypto market dynamics.</p>
                        <div class="inline-block bg-slate-900/5 text-slate-700 px-3 py-1 rounded-full text-xs font-semibold">In Development</div>
                    </div>
                </div>

                <!-- Portfolio Tracker -->
                <div class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                 <div class="bg-gradient-to-r from-purple-500 to-yellow-600 h-1"></div>
                    
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-12 h-12 bg-slate-900/10 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/20 transition">
                                <i class="fa-solid fa-wallet text-slate-900 text-xl group-hover:text-emerald-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">Portfolio and Activity Tracker</h3>
                        </div>
                        <p class="text-slate-600 mb-6">Explore blockchain transactions and track portfolios, monitor holdings, and learn asset allocation strategies.</p>
                        <div class="inline-block bg-slate-900/5 text-slate-700 px-3 py-1 rounded-full text-xs font-semibold">In Development</div>
                    </div>
                </div>


                <!-- Community Forum -->
                <div class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="bg-gradient-to-r from-blue-500 to-green-800 h-1"></div>
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-12 h-12 bg-emerald-500/20 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/30 transition">
                                <i class="fa-solid fa-comments text-emerald-600 text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">Tokens media traction Aggregator</h3>
                        </div>
                        <p class="text-slate-600 mb-6">A tool that is used to monitor token traction in the cryptocurrency community.</p>
                        <div class="inline-block bg-slate-900/5 text-slate-700 px-3 py-1 rounded-full text-xs font-semibold">In Development</div>
                    </div>
                </div>

                
                <!-- Onchain FA -->
                <div class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="bg-gradient-to-r from-red-500 to-gray-600 h-1"></div>
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-12 h-12 bg-slate-900/10 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/20 transition">
                                <i class="fa-solid fa-link text-slate-900 text-xl group-hover:text-emerald-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">AI-FA Bot</h3>
                        </div>
                        <p class="text-slate-600 mb-6">AI powered predictive model that analyzes market trends and provides insights for informed decision-making.</p>
                        <div class="inline-block bg-slate-900/5 text-slate-700 px-3 py-1 rounded-full text-xs font-semibold">In Development</div>
                    </div>
                </div>

                 <!-- Smart Contract Simulator -->
                <div class="group bg-white rounded-2xl border border-slate-200 overflow-hidden hover:border-emerald-400 transition duration-300 hover:shadow-xl">
                    <div class="bg-gradient-to-r from-gray-800 to-blue-500 h-1"></div>
                    
                    <div class="p-8">
                        <div class="flex items-center gap-4 mb-5">
                            <div class="w-12 h-12 bg-slate-900/10 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/20 transition">
                                <i class="fa-solid fa-code text-slate-900 text-xl group-hover:text-emerald-600 transition"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">Agentic trading</h3>
                        </div>
                        <p class="text-slate-600 mb-6">AI-powered autonomous trading bot that executes trades based on predefined strategies and market conditions.</p>
                        <div class="inline-block bg-slate-900/5 text-slate-700 px-3 py-1 rounded-full text-xs font-semibold">In Development</div>
                    </div>
                </div>


            </div>

            <!-- Waitlist CTA -->
            <div class="mt-16 text-center">
                <p class="text-lg text-slate-700 mb-6">Get notified when new features launch</p>
                <button id="joinWaitlistBtn" data-route="{{ route('joinwaitlist') }}" class="bg-gradient-to-r from-slate-900 to-slate-800 hover:from-slate-950 hover:to-slate-900 text-white font-semibold px-10 py-4 rounded-lg transition transform hover:scale-105 duration-300 shadow-lg shadow-slate-900/20">
                    Join Waitlist
                </button>
            </div>
        </div>
    </section>

    <!-- Waitlist Modal -->
    <div id="waitlistModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full animate-scale-up">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-slate-900 to-slate-800 px-8 py-6 flex justify-between items-center">
                <h3 class="text-2xl font-bold text-white">Join Our Waitlist</h3>
                <button id="closeModal" class="text-slate-300 hover:text-white transition text-2xl leading-none">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="p-8">
                <p class="text-slate-600 mb-6">Be the first to know when new features launch. Enter your email below.</p>
                
                <form id="waitlistForm" class="space-y-4">
                    <div>
                        <input 
                            type="email" 
                            id="waitlistEmail" 
                            name="waitlist_email"
                            placeholder="your@email.com" 
                            required
                            class="w-full px-4 py-3 border text-slate-900 border-slate-300 rounded-lg focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition"
                        >
                    </div>
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-slate-900 to-slate-800 hover:from-slate-950 hover:to-slate-900 text-white font-semibold py-3 rounded-lg transition transform hover:scale-105 duration-300 shadow-lg shadow-slate-900/20"
                    >
                        Join Waitlist
                    </button>
                </form>

                <p class="text-xs text-slate-500 text-center mt-4">We'll never share your email. You can unsubscribe anytime.</p>
            </div>
        </div>
    </div>
    <!-- Tailwind CSS for modal animation -->
    <style>
        @keyframes scaleUp {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .animate-scale-up {
            animation: scaleUp 0.3s ease-out;
        }
    </style>

    <!-- External Script -->
    @vite('resources/js/waitlist.js')


</x-app-layout>
