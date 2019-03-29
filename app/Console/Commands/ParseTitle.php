<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class ParseTitle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:title';

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
        $res = $client->get('https://natatnik.by/events/');
        $content = $res->getBody()->getContents();
        $crawler = new Crawler($content);
        $h1 = $crawler->filterXPath('//h1')->each(function ($element) {
            return [
                'h1 class' => $this->issetPath($element->attr('class')),
                'h1 id' => $this->issetPath($element->attr('id')),
            ];
        });
        $h2 = $crawler->filterXPath('//h2')->each(function ($element) {
            return [
                'h2 class' => $this->issetPath($element->attr('class')),
                'h2 id' => $this->issetPath($element->attr('id')),
            ];
        });
        $h3 = $crawler->filterXPath('//h3')->each(function ($element) {
            return [
                'h3 class' => $this->issetPath($element->attr('class')),
                'h3 id' => $this->issetPath($element->attr('id')),
            ];
        });
        $common = [
            'h1' => $h1,
            'h2' => $h2,
            'h3' => $h3,
        ];
dd($common);
        return $common;
    }

    private function issetPath($e)
    {
        if (count($e) > 0) {
            return $e;
        } else {
            return 'Not found';
        }
    }
}
