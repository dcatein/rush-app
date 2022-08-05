<?php

namespace App\Adapters\Http;

interface Client
{
    public function request(string $method, string $uri, array $options = []);
}
