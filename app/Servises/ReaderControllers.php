<?php

namespace App\Servises;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;

class ReaderControllers
{
    private $scanPath;

    public function __construct()
    {
        $this->scanPath = 'app/Http/Controllers/Admin/';
//        var_dump(base_path('app/Http/Controllers/Admin'));
    }

    public function getActions()
    {
        $files = $this->readDirRecursive(base_path($this->scanPath));
        $classes = $this->getReflectionObject($files);

        $methods = [];
        foreach ($classes as $obj) {
            foreach ($obj->getMethods() as $method) {
                if (str_starts_with($method->class, str_replace('/', '\\', ucfirst($this->scanPath)))
                    and !str_starts_with($method->name, '__')
                ){
                    $methods[] = $method->class . '::' . $method->name;
                }
            }
//            $methods[] = '-----------------------';
        }

        return array_unique($methods);
    }


    private function getReflectionObject($files)
    {
        $classes = [];
        foreach ($files as $file) {
            require $file;
        }

        $declared_classes = get_declared_classes();
        foreach ($declared_classes as $class) {
            $ref_class = new \ReflectionClass($class);
            if ($ref_class->isSubclassOf(Controller::class)) {
                $classes[] = $ref_class;
            }
        }

        return $classes;
    }


    private function readDirRecursive($path)
    {
        $files = [];

        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                if (is_file($path . '/' . $entry)) {
                    $files[] = $path . '/' . $entry;
                } elseif ($entry != "." && $entry != ".." && is_dir($path . '/' . $entry)) {
                    $sub_files = $this->readDirRecursive($path . '/' . $entry);
                    foreach ($sub_files as $sub_file) {
                        $files[] = $sub_file;
                    }
                }
            }
            closedir($handle);
        }

        return $files;
    }
}