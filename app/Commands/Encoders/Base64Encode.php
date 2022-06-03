<?php

namespace App\Commands\Encoders;

use App\Commands\Abstracts\CommonStringProcessor;

class Base64Encode extends CommonStringProcessor
{
    protected $signature = 'base64 {string} {--u|url-safe}';

    protected $description = 'Base64 encode string';

    public function process(string $string, array $options): string
    {
        return !empty($options['url-safe']) ? $this->encodeURLSafe($string) : base64_encode($string);
    }

    protected function encodeURLSafe($data): string
    {
        return \str_replace('=', '', \strtr(\base64_encode($data), '+/', '-_'));
    }
}
