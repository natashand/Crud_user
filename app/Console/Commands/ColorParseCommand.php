<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Symfony\Component\CssSelector\CssSelectorConverter;
use Symfony\Component\DomCrawler\Crawler;

class ColorParseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:color';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();
        $responce = $client->get('https://natatnik.by/events/');
        $content = $responce->getBody()->getContents();
        $crawler = new Crawler($content);
        $links = $crawler->filterXPath('//link[@rel="stylesheet"]')->each(function ($element) {
            return $element->attr('href');
        });

        foreach ($links as $link) {
            $res = $client->get($link);
            $contentLink = $res->getBody()->getContents();
            $pieces = explode(".", preg_replace(['/\\n/', '/\\r/', '/{/', '/}/'], '', $contentLink));

            foreach ($pieces as $value) {
                if (strpos($value, 'color:')) {
                    $color[] = strstr($value, 'color:');
                }
            }
        }
        foreach ($color as $item) {
            if (strpos($item, ';')) {
                $new[] = (stristr($item, ';', true));
            } else {
                $new[] = $item;
            }
        }
        dd($new);
    }
}
