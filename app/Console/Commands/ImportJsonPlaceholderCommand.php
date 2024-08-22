<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    protected $signature = 'import-json-placeholder';

    protected $description = 'Get data from JSONPlaceholder';


    public function handle()
    {
        $client = new ImportDataClient();
        $response = $client->request('GET', 'posts');
        dd($response);
    }
}
