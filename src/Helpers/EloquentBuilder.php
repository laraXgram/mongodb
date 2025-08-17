<?php

declare(strict_types=1);

namespace LaraGram\MongoDB\Helpers;

use LaraGram\Database\Eloquent\Builder;

class EloquentBuilder extends Builder
{
    use QueriesRelationships;
}
