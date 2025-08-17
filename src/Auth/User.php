<?php

declare(strict_types=1);

namespace LaraGram\MongoDB\Auth;

use LaraGram\Foundation\Auth\User as BaseUser;
use LaraGram\MongoDB\Eloquent\DocumentModel;

class User extends BaseUser
{
    use DocumentModel;

    protected $keyType = 'string';
}
