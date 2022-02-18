<?php

namespace App\Console\Commands;

use App\Components\ImportRetailData;
use Illuminate\Console\Command;

class ImportJsonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:json';

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
     * @return int
     */
    public function handle()
    {
        $import = new ImportRetailData();
        $response = $import->client->request('GET', 'costs');
        dd(json_decode($response->getBody()->getContents()));
    }
}
