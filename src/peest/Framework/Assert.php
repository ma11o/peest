<?php
declare(strict_types=1);

namespace peest\Framework;

class Assert
{
    protected function assertSame($val1, $val2)
    {
        $this->count++;

        $result = ($val1 === $val2);

        if (!$result) {
            $this->failure++;
        }
    }
}