<?php
declare (strict_types = 1);

namespace peest\Render;

use peest\Peest;

class Output
{
    private $message = "";
    /*
        Time: 0 seconds, Memory: 5.00Mb

        There was 1 failure:

        1) DependencyFailureTest::testOne
        Failed asserting that false is true.

        /home/sb/DependencyFailureTest.php:6

        There was 1 skipped test:

        1) DependencyFailureTest::testTwo
        This test depends on "DependencyFailureTest::testOne" to pass.

        FAILURES!
        Tests: 1, Assertions: 1, Failures: 1, Skipped: 1.
    */
    function render(Peest $peest)
    {
        //var_dump($peest->failure);
        if ($peest->getFailure() > 0) {
            $this->message .= "There was {$peest->getFailure()} failure:\n\n";
        }

        if (count($peest->getFailureMethods()) > 0) {
            $methods = $peest->getFailureMethods();
            var_dump($methods);
            $num = 1;
            foreach ($methods as $method) {
                $this->message .= "{$num}) {$method}\n";
                $num++;
            }

            $this->message .= " FAILURES!\n";
        }

        $this->message .= "Tests: 1, Assertions: {$peest->getAssertion()}, Failures: {$peest->getFailure()}, Skipped: 1.\n";

        echo $this->message;
    }
}