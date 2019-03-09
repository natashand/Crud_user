<?php

namespace App\Console\Commands;

use DOMDocument;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

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
        $this->info('Content: '.$content);

        $doc = new DOMDocument();
        $doc->loadHTML($content, \LIBXML_NOERROR | \LIBXML_NOWARNING | \LIBXML_NOEMPTYTAG);
        $xpath = new \DOMXPath($doc);

        $elements = $xpath->query('//div[@class="tribe-clearfix"]/div[@class="type-tribe_events"]div[@class="tribe-events-photo-event-wrap"]/div[@class="tribe-clearfix"]');
        foreach ($elements as $node) {
            $url = $node->find('h2[@class="tribe-events-list-event-title"]/a')->getAttribute('title');
            $this ->info("Content: ". $url);
        }

    }
}
