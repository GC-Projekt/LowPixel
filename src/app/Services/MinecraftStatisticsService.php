<?php


namespace App\Services;


use GuzzleHttp\Client;

class MinecraftStatisticsService
{

    public static function getStats(){

        $server = config('minecraft.server');

        $request = 'https://mcapi.us/server/status?ip='.$server;
        $client = new Client([
            'verify' => false
        ]);
        $result = json_decode($client->get($request)->getBody());
        if ($result->online){
            $players = array_map(function($element){
                return $element->name;
            }, $result->players->sample);
            return [
                'users' => $players,
                'online' => true,
                'max' => $result->players->max
            ];
        }else{
            return [
                'users' => [],
                'online' => false,
                'max' => 0
            ];
        }
    }


}
