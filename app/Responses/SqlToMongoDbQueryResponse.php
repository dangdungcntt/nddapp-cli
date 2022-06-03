<?php

namespace App\Responses;

class SqlToMongoDbQueryResponse extends CommonStringResponse
{
    public function toPrettyHtml(): string
    {
        if ($this->succeed) {
            $html = trim(json_encode(json_decode($this->content), JSON_PRETTY_PRINT));
            return <<<HTML
                <div class="text-green-400"><pre>$html</pre></div>
HTML;
        }

        return parent::toHtml();
    }
}
