<?php

declare(strict_types=1);

namespace LaraGram\MongoDB\Validation;

use LaraGram\Validation\ValidationServiceProvider as BaseProvider;
use Override;

class ValidationServiceProvider extends BaseProvider
{
    #[Override]
    protected function registerPresenceVerifier()
    {
        $this->app->singleton('validation.presence', function ($app) {
            return new DatabasePresenceVerifier($app['db']);
        });
    }
}
