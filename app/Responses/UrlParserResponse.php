<?php

namespace App\Responses;

use App\Responses\Contracts\ResponseInterface;
use Illuminate\Http\Client\Response;

class UrlParserResponse implements ResponseInterface
{
    public function __construct(
        protected array|string $data,
        protected bool         $succeed = true
    )
    {
    }

    public function toHtml(): string
    {
        if ($this->succeed) {
            return view('outputs.url-parser', [
                'data' => $this->data
            ])->render();
        }

        return <<<HTML
    <div class="bg-red-500">
        $this->data
    </div>
HTML;
    }

    public static function create($apiResponse): static
    {
        if (!$apiResponse instanceof Response) {
            return new static((string)$apiResponse, false);
        }

        return new static($apiResponse->ok() ? $apiResponse->json('data') : $apiResponse->json('message'),
            $apiResponse->ok());
    }
}
