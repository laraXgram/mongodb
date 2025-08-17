<?php

declare(strict_types=1);

namespace LaraGram\MongoDB\Queue;

use DateTime;
use LaraGram\Queue\Jobs\DatabaseJob;

class MongoJob extends DatabaseJob
{
    /**
     * Indicates if the job has been reserved.
     *
     * @return bool
     */
    public function isReserved()
    {
        return $this->job->reserved;
    }

    /** @return DateTime */
    public function reservedAt()
    {
        return $this->job->reserved_at;
    }
}
