<?php

namespace LaraGram\MongoDB\Schema;

use Closure;
use LaraGram\Database\Connection;
use LaraGram\Database\Schema\Blueprint as BaseBlueprint;

use function property_exists;

/**
 * We keep the untyped $connection property for older version of LaraGram to maintain compatibility
 * and not break projects that would extend the MongoDB Blueprint class.
 *
 * phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses
 */
if (! property_exists(BaseBlueprint::class, 'connection')) {
    trait BlueprintLaraGramCompatibility
    {
        /**
         * The MongoDB connection object for this blueprint.
         *
         * @var Connection
         */
        protected $connection;

        public function __construct(Connection $connection, string $collection, ?Closure $callback = null)
        {
            parent::__construct($collection, $callback);

            $this->connection = $connection;
            $this->collection = $connection->getCollection($collection);
        }
    }
} else {
    trait BlueprintLaraGramCompatibility
    {
        public function __construct(Connection $connection, string $collection, ?Closure $callback = null)
        {
            parent::__construct($connection, $collection, $callback);

            $this->collection = $connection->getCollection($collection);
        }
    }
}
