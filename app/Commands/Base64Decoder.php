<?php

namespace App\Commands;

use App\Commands\Abstracts\CommonStringEncoder;

class Base64Decoder extends CommonStringEncoder
{
    protected $signature = 'base64-decode {string}';

    protected $description = 'Base64 decode string';

    public function executeAction(string $string, array $options): string
    {
        return $this->decodeURLSafe($string);
    }

    protected function decodeURLSafe($data): string|false
    {
        $remainder = \strlen($data) % 4;
        if ($remainder) {
            $padlen = 4 - $remainder;
            $data   .= \str_repeat('=', $padlen);
        }
        return \base64_decode(\strtr($data, '-_', '+/'));
    }
}
