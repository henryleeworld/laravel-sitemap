<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Tags\Sitemap as TagSitemap;
use App\Product;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        ini_set('memory_limit', '-1');
        $take = 50000;
        $skip = 0;
        $group = floor(Product::count() / $take);
        $sitemapIndex = SitemapIndex::create();
        for ($i = 0; $i <= $group; $i++) {
            $sitemap = Sitemap::create();
            $products = Product::orderBy('id', 'asc')->skip($skip)->take($take)->get();
            foreach ($products as $product) {
                $sitemap->add(Url::create('prod/' . $product->no)->setLastModificationDate($product->updated_at));
            }
            if (!empty($products)) {
                $filename = 'sitemap-' . ($i + 1) . '.xml';
                $sitemap->writeToFile(public_path($filename));
                $sitemapIndex->add(TagSitemap::create('/' . $filename)->setLastModificationDate(Carbon::yesterday()));
            }
            $skip = $skip + $take;
        }
        $sitemapIndex->writeToFile(public_path('sitemap-index.xml'));
    }
}