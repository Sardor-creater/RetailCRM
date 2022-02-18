<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportRetailData
{

    public $client;

    public function __construct()
    {

        $headers = ['X-API-KEY' => 'QlnRWTTWw9lv3kjxy1A8byjUmBQedYqb'];
        $this->client = new Client([
            'base_uri' => 'https://superposuda.retailcrm.ru/api/v5/',
            // Вы можете установить любое количество параметров запроса по умолчанию.
            'timeout'  => 2.0,
            'headers' => $headers,
            'verify' => false
        ]);
    }


}
