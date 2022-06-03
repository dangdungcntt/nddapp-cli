<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringEncoder;

class Base64Encoder extends CommonStringEncoder
{
    protected $signature = 'base64 {string} {--u|url-safe}';

    protected $description = 'Base64 encode string';

    public function executeAction(string $string, array $options): string
    {
        return !empty($options['url-safe']) ? $this->encodeURLSafe($string) : base64_encode($string);
    }

    protected function encodeURLSafe($data): string
    {
        return \str_replace('=', '', \strtr(\base64_encode($data), '+/', '-_'));
    }
}
