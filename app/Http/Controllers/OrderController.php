<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    public function submit(Request $request)
    {
        $name = $request->input('name');
        $FIO = explode(' ', $name, 3);
        for ($i = 0; $i < 3; $i++){
            if (!isset($FIO[$i])){
                $FIO[$i] = '';
            }
        }
        $comment = $request->input('komment');
        $article = $request->input('article');
        $brand = $request->input('brand');

        $headers = ['X-API-KEY' => 'QlnRWTTWw9lv3kjxy1A8byjUmBQedYqb', 'Content-Type' => 'application/x-www-form-urlencoded'];
        $query = ['filter[manufacturer]' => $brand, 'filter[name]' => $article];
        $client = new Client([
            'base_uri' => 'https://superposuda.retailcrm.ru/api/v5/',
            'timeout'  => 2.0,
            'headers' => $headers,
        ]);

        try {
            $response = $client->request('GET', 'store/products', ['query'=>$query] );
            $res = json_decode($response->getBody()->getContents());

            if (!isset($res->products[0]->offers[0]->id)){
                echo 'takova tovara net';
                return;
            }
            $idTovara = $res->products[0]->offers[0]->id;
            $items = [
                0 => [
                    'offer' => [
                        'id' => $idTovara
                    ]
                ]
            ];

            $zakaz = [
                'status' => 'trouble',
                'number' => '6081992',
                'orderType' => 'fizik',
                'orderMethod' => 'test',
                'site'=>'test',
                'lastName' => $FIO[0],
                'firstName' => $FIO[1],
                'patronymic' => $FIO[2],
                'customerComment' => $comment,
                'items'=> $items,
            ];
            $toJson = json_encode($zakaz);
            $myBody['order'] = $toJson;

            $response1 = $client->request('POST','orders/create', ['form_params'=>$myBody]);
            dd(json_decode($response1->getBody()->getContents()));

        } catch(Guzzle\Http\Exception\BadResponseException $e)
        {
            echo 'Uh Bad request ' . $e->getMessage();
        }
    }
}
