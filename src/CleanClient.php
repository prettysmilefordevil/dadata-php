<?php

namespace Dadata;

class CleanClient extends ClientBase
{

    public function __construct($token, $secret, $baseUrl = null)
    {
        if(!$baseUrl) $baseUrl = "https://cleaner.dadata.ru/api/v1/";

        parent::__construct($baseUrl, $token, $secret);
    }

    public function clean($name, $value)
    {
        $url = "clean/$name";
        $fields = array($value);
        $response = $this->post($url, $fields);
        return $response[0];
    }

    public function cleanRecord($structure, $record)
    {
        $url = "clean";
        $data = [
            "structure" => $structure,
            "data" => [$record]
        ];
        $response = $this->post($url, $data);
        return $response["data"][0];
    }
}
