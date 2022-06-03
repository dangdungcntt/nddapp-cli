<?php

namespace App;

use App\Requests\Contracts\RequestInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class NddApp
{
    protected PendingRequest $client;

    public function __construct(string $baseUrl)
    {
        $this->client = Http::baseUrl($baseUrl)
            ->acceptJson()
            ->withoutVerifying();
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
