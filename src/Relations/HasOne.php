<?php

declare(strict_types=1);

namespace LaraGram\MongoDB\Relations;

use LaraGram\Database\Eloquent\Builder;
use LaraGram\Database\Eloquent\Model;
use LaraGram\Database\Eloquent\Relations\HasOne as EloquentHasOne;
use Override;

/**
 * @template TRelatedModel of Model
 * @template TDeclaringModel of Model
 * @extends EloquentHasOne<TRelatedModel, TDeclaringModel>
 */
class HasOne extends EloquentHasOne
{
    /**
     * Get the key for comparing against the parent key in "has" query.
     *
     * @return string
     */
    #[Override]
    public function getForeignKeyName()
    {
        return $this->foreignKey;
    }

    /**
     * Get the key for comparing against the parent key in "has" query.
     *
     * @return string
     */
    public function getHasCompareKey()
    {
        return $this->getForeignKeyName();
    }

    /** @inheritdoc */
    #[Override]
    public function getRelationExistenceQuery(Builder $query, Builder $parentQuery, $columns = ['*'])
    {
        $foreignKey = $this->getForeignKeyName();

        return $query->select($foreignKey)->where($foreignKey, 'exists', true);
    }

    /** Get the name of the "where in" method for eager loading. */
    #[Override]
    protected function whereInMethod(Model $model, $key)
    {
        return 'whereIn';
    }
}
