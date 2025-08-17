<?php

declare(strict_types=1);

namespace LaraGram\MongoDB\Relations;

use LaraGram\Database\Eloquent\Model;
use LaraGram\Database\Eloquent\Relations\MorphMany as EloquentMorphMany;
use Override;

/**
 * @template TRelatedModel of Model
 * @template TDeclaringModel of Model
 * @extends EloquentMorphMany<TRelatedModel, TDeclaringModel>
 */
class MorphMany extends EloquentMorphMany
{
    #[Override]
    protected function whereInMethod(Model $model, $key)
    {
        return 'whereIn';
    }
}
