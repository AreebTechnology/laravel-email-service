<?php

namespace Areeb\EmailService\Clients\SendPulse;

use Areeb\EmailService\Classes\Config;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class SendPulseClient
{
    private PendingRequest $request;
    protected array $headers = [];

    public function __construct()
    {
        $this->headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $this->accessToken(),
        ];

        $this->request = Http::baseUrl(Config::get('base_url'))->withHeaders($this->headers);
    }

    public function post($url, array $data): \Illuminate\Support\Collection
    {
        $response = $this->request->post($url, $data);
        if (!$response->ok()) {
            Log::critical('Email service trigger', $response->json());
        }
        return $response->collect();
    }

    public function get($url, array $data): \Illuminate\Support\Collection
    {
        $response = $this->request->get($url, $data);
        return $response->collect();
    }

    public function withHeaders(array $headers): static
    {
        $this->headers += $headers;
        return $this;
    }

    public function accessToken()
    {
        $this->request = Http::baseUrl(Config::get('base_url'))->withHeaders($this->headers);

        if (Cache::get(Config::get('cache_key') . 'access_token')) {
            return Cache::get(Config::get('cache_key') . 'access_token');
        }

        $response = $this->post('oauth/access_token', [
            'grant_type' => Config::get('grant_type'),
            'client_id' => Config::get('client_id'),
            'client_secret' => Config::get('client_secret'),
        ])->get('access_token');

        Cache::set(Config::get('cache_key') . 'access_token', $response, 3000);
        return $response;
    }

}
