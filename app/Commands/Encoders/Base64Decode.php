<?php

namespace App\Commands\Encoders;

use App\Commands\Abstracts\CommonStringProcessor;

class Base64Decode extends CommonStringProcessor
{
    protected $name = 'base64-decode';

    protected $description = 'Base64 decode string';

    public function process(string $string, array $options): string
    {
        return $this->decodeURLSafe($string);
    }

    protected function decodeURLSafe($data): string|false
    {
        $remainder = \strlen($data) % 4;
        if ($remainder) {
            $padlen = 4 - $remainder;
            $data .= \str_repeat('=', $padlen);
        }
        return \base64_decode(\strtr($data, '-_', '+/'));
    }
}
