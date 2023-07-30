<?php

namespace App\Updater\Strategy;

use LaravelZero\Framework\Components\Updater\Strategy\StrategyInterface;

class GithubReleasesFixedNameStrategy extends \Humbug\SelfUpdate\Strategy\GithubStrategy implements StrategyInterface
{
    protected function getDownloadUrl(array $package): string
    {
        return parent::getDownloadUrl($package) . config('app.build_name');
    }
}
