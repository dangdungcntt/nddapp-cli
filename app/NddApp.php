<?php

namespace App;

use App\Requests\RequestInterface;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class NddApp
{
    protected PendingRequest $client;
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('app.base_api_url', 'https://nddapp.com');
        $this->client  = Http::baseUrl($this->baseUrl)->acceptJson()->withoutVerifying();
    }

    /**
     * @throws \Exception
     */
    public function send(RequestInterface $request): \GuzzleHttp\Promise\PromiseInterface|Response|string
    {
        try {
            return $this->client->send($request->method(), $request->path(), [
                'json' => $request->body()
            ]);
        } catch (\Throwable $throwable) {
            return $throwable->getMessage();
        }
    }
}
