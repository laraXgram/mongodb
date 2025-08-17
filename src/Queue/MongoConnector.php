<?php

declare(strict_types=1);

namespace LaraGram\MongoDB\Queue;

use LaraGram\Contracts\Queue\Queue;
use LaraGram\Database\ConnectionResolverInterface;
use LaraGram\Queue\Connectors\ConnectorInterface;

class MongoConnector implements ConnectorInterface
{
    /**
     * Database connections.
     *
     * @var ConnectionResolverInterface
     */
    protected $connections;

    /**
     * Create a new connector instance.
     */
    public function __construct(ConnectionResolverInterface $connections)
    {
        $this->connections = $connections;
    }

    /**
     * Establish a queue connection.
     *
     * @return Queue
     */
    public function connect(array $config)
    {
        if (! isset($config['collection']) && isset($config['table'])) {
            $config['collection'] = $config['table'];
        }

        if (! isset($config['retry_after']) && isset($config['expire'])) {
            $config['retry_after'] = $config['expire'];
        }

        return new MongoQueue(
            $this->connections->connection($config['connection'] ?? null),
            $config['collection'] ?? 'jobs',
            $config['queue'] ?? 'default',
            $config['retry_after'] ?? 60,
        );
    }
}
