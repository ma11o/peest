<?php
declare (strict_types = 1);

namespace peest\Loader;

class FileLoader
{
    public function load($path = null)
    {
        if (!$path) {
            return false;
        }

        $classes = [];

        foreach (glob($path . '/*.php', GLOB_BRACE) as $file) {
            var_dump($file);
            if (is_file($file)) {
                require_once $file;
                $classes[] = str_replace(".php", "", basename($file));
            }
        }
        var_dump($classes);
        return $classes;
    }

    /**
     * Get the value of classes
     */ 
    public function getClasses()
    {
        return $this->classes;
    }
}
