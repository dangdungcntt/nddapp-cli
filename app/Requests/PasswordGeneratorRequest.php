<?php

namespace App\Requests;

class PasswordGeneratorRequest implements RequestInterface
{
    public function __construct(
        protected int $length = 24,
        protected int $count = 1,
        protected bool $symbols = false,
        protected bool $number = true,
        protected bool $lower = true,
        protected bool $upper = true,
    ) {
    }

    public function body(): array
    {
        return [
            'inputs' => [
                'length'                       => $this->length,
                'number_of_passwords'          => $this->count,
                'include_symbols'              => $this->symbols,
                'include_numbers'              => $this->number,
                'include_lowercase_characters' => $this->lower,
                'include_uppercase_characters' => $this->upper,
            ]
        ];
    }

    public function path(): string
    {
        return '/password-generator.html';
    }

    public function method(): string
    {
        return 'POST';
    }
}
