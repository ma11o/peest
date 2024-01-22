<?php
declare (strict_types = 1);

namespace peest\Loader;

use peest\Loader\FileLoader;
use ReflectionClass;
use ReflectionMethod;

class ClassLoader
{
    private $classes = [];
    private $methods = [];

    public function __construct($path = null)
    {
        if (!$path) {
            return fslse;
        }
        $loader = new FileLoader();
        $this->classes = $loader->load($path);
    }

    public function parse()
    {
        foreach ($this->classes as $class) {
            $this->loadMethods($class);
        }
    }

    public function loadMethods($class = null)
    {
        $class = new ReflectionClass($class);
        $load_methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($load_methods as $method) {
            $this->methods[$method->class][] = $method->name;
        }
    }

    /**
     * Get the value of methods
     */ 
    public function getMethods()
    {
        return $this->methods;
    }
}
