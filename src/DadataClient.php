<?php

namespace Dadata;

class DadataClient
{
    private $cleaner;
    private $profile;
    private $suggestions;

    public function __construct($token, $secret, $baseUrlClean = "https://cleaner.dadata.ru/api/v1/", $baseUrlProfile = 'https://dadata.ru/api/v2/', $baseUrlSuggest = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/')
    {
        $this->cleaner = new CleanClient($token, $secret, $baseUrlClean);
        $this->profile = new ProfileClient($token, $secret, $baseUrlProfile);
        $this->suggestions = new SuggestClient($token, $secret, $baseUrlSuggest);
    }

    public function clean($name, $value)
    {
        return $this->cleaner->clean($name, $value);
    }

    public function cleanRecord($structure, $record)
    {
        return $this->cleaner->cleanRecord($structure, $record);
    }

    public function findAffiliated($query, $count = Settings::SUGGESTION_COUNT, $kwargs = [])
    {
        return $this->suggestions->findAffiliated($query, $count, $kwargs);
    }

    public function findById($name, $query, $count = Settings::SUGGESTION_COUNT, $kwargs = [])
    {
        return $this->suggestions->findById($name, $query, $count, $kwargs);
    }

    public function geolocate($name, $lat, $lon, $radiusMeters = 100, $count = Settings::SUGGESTION_COUNT, $kwargs = [])
    {
        return $this->suggestions->geolocate($name, $lat, $lon, $radiusMeters, $count, $kwargs);
    }

    public function getBalance()
    {
        return $this->profile->getBalance();
    }

    public function getDailyStats($date = null)
    {
        return $this->profile->getDailyStats($date);
    }

    public function getVersions()
    {
        return $this->profile->getVersions();
    }

    public function iplocate($ip, $kwargs = [])
    {
        return $this->suggestions->iplocate($ip, $kwargs);
    }

    public function suggest($name, $query, $count = Settings::SUGGESTION_COUNT, $kwargs = [])
    {
        return $this->suggestions->suggest($name, $query, $count, $kwargs);
    }
}
