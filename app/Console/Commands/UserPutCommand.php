<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class UserPutCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:put';

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
        $response = $client->request('PUT', 'http://user.crud/api/user/update/15',
            [
                'form_params' => [
                    'name' => 'timon',
                    'last_name' => 'timon',
                    'email' => 'timon@admin',
                    'password' => '1671457283',
                    'phone' => '12345678',
                    'address' => 'adress_fedor'
                ]
            ]);
        $this->info('Status code: ' . $response->getStatusCode());
        $this->info('Response body: ' . $response->getBody());
    }
}
