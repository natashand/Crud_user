<?php

namespace App\Console\Commands;

use App\Parse;
use DOMDocument;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class ParserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:start';

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
        $events = $crawler->filterXPath('//div[@class="tribe-events-photo-event-wrap"]')->each(function ($element) {
            $event = new Parse();
            $event->title = $element->filterXPath('//a[@class="tribe-event-url"]')->attr('title');
            $event->image = $element->filterXPath('//img[@class="attachment-medium size-medium wp-post-image"]')->attr('src');
            $event->date_start = $element->filterXPath('//span[@class="tribe-event-date-start"]')->html();
            $event->date_end = $this->issetPath($element->filterXPath('//span[@class="tribe-event-date-end"]'));
            $event->cost = $this->issetPath($element->filterXPath('//span[@class="tribe-events-event-cost"]'));
            $event->save();
            return $event;
        });
        dd($events);

        return $events;
    }

    private function issetPath($e)
    {
        if (count($e) > 0) {
            return $e->html();
        } else {
            return 'Not found';
        }
    }
}
