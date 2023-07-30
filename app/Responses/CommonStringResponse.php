<?php

namespace App\Responses;

use App\Responses\Contracts\ResponseInterface;
use Illuminate\Http\Client\Response;

class CommonStringResponse implements ResponseInterface
{
    public function __construct(
        protected string $content,
        protected bool   $succeed = true
    )
    {
    }

    public function toHtml(): string
    {
        if ($this->succeed) {
            $html = nl2br($this->content);
            return <<<HTML
    <div class="text-green-400">
        $html
    </div>
HTML;
        }

        return <<<HTML
    <div class="bg-red-500">
        $this->content
    </div>
HTML;
    }

    public static function create($apiResponse): static
    {
        if (!$apiResponse instanceof Response) {
            return new static('Error', false);
        }

        return new static($apiResponse->ok() ? $apiResponse->json('data') : "Error. Status: " . $apiResponse->status(), $apiResponse->ok());
    }
}
