<?php
declare(strict_types=1);

namespace peest\Framework;

use peest\Framework\Assert;

class TestCase extends Assert
{
    private $count = 0;

    private $failure = 0;

    private $failureMethods = [];

    public function getCount()
    {
        return $this->count;
    }

    public function getFailure()
    {
        return $this->failure;
    }

}