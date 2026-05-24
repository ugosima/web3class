<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
 use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Services\Lessonmap;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
protected $signature = 'generate:sitemap';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */


public function handle()
{
    $sitemap = Sitemap::create();

    // homepage
    $sitemap->add(
        Url::create('/')
            ->setPriority(1.0)
    );

    // auth pages
    $sitemap->add(Url::create('/login'));
    $sitemap->add(Url::create('/register'));

    // lesson pages
    $lessonMap = app(Lessonmap::class);

    foreach ($lessonMap->lessons() as $lesson) {

        $sitemap->add(
            Url::create("/lessons/{$lesson}")
                ->setPriority(0.8)
        );
    }

    // generate sitemap.xml
    $sitemap->writeToFile(public_path('sitemap.xml'));

    $this->info('Sitemap generated successfully!');
}
}
