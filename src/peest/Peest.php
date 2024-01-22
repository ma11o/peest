<?php
declare (strict_types = 1);

namespace peest;

use peest\Loader\ClassLoader;
use peest\Render\OutPut;

class Peest
{
    private $loader;

    private $render;

    private $methods = [];

    private $assertion = 0;

    private $failure = 0;

    private $failureMethods = [];

    public function __construct($path)
    {
        $this->loader = new ClassLoader($path);
        $this->loader->parse();
        $this->render = new OutPut();
    }

    public function getAssertion()
    {
        return $this->assertion;
    }

    public function getFailure()
    {
        return $this->failure;
    }

    public function getFailureMethods()
    {
        return $this->failureMethods;
    }

    public function run()
    {
        $this->callMethods();
        $this->render->render($this);
    }

    public function callMethods()
    {
        foreach ($this->loader->getMethods() as $class => $methods) {
            $obj = new $class;

            foreach ($methods as $method) {
                $obj->{$method}();

                /*
                if (!$result) { 
                    $this->failureMethods[] = get_class($obj) . "::" . $method;
                    $this->failure++;
                } 
                //var_dump($this->failure);
                $this->assertion++;
                */
            }
        }
    }
}
