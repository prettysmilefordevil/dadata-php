<?php

namespace Dadata;

use DateTime;

class ProfileClient extends ClientBase
{

    public function __construct($token, $secret, $baseUrl = null)
    {
        if(!$baseUrl) $baseUrl = 'https://dadata.ru/api/v2/';
        parent::__construct($baseUrl, $token, $secret);
    }

    public function getBalance()
    {
        $url = "profile/balance";
        $response = $this->get($url);
        return $response["balance"];
    }

    public function getDailyStats($date = null)
    {
        $url = "stat/daily";
        if (!$date) {
            $date = new DateTime();
        }
        $query = ["date" => $date->format("Y-m-d")];
        $response = $this->get($url, $query);
        return $response;
    }

    public function getVersions()
    {
        $url = "version";
        $response = $this->get($url);
        return $response;
    }
}
