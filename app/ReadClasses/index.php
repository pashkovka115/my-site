<html lang="ru">
<?php
require 'Controllers/Controller.php';

$files = readDirRecursive(__DIR__ . '/Controllers/Admin');

//$classes = [];

//var_dump($files);

$classes = getReflectionObject($files);

$methods = [];
foreach ($classes as $obj){
    foreach ($obj->getMethods() as $method){
        $methods[] = $method->class . '::' . $method->name;
    }
    $methods[] = '-----------------------';
}

var_dump($methods);





function getReflectionObject($files)
{
    $classes = [];
    foreach ($files as $file) {
        require $file;
    }

    $declared_classes = get_declared_classes();
    foreach ($declared_classes as $class){
        $ref_class = new ReflectionClass($class);
        if ($ref_class->isSubclassOf('Controller')){
            $classes[] = $ref_class;
        }
    }

    return $classes;
}

function readDirRecursive($path)
{
    $files = [];

    if ($handle = opendir($path)) {
        while (false !== ($entry = readdir($handle))) {
            if (is_file($path . '/' . $entry)) {
                $files[] = $path . '/' . $entry;
            }elseif ($entry != "." && $entry != ".." && is_dir($path . '/' . $entry)){
                $sub_files = readDirRecursive($path .'/'. $entry);
                foreach ($sub_files as $sub_file){
                    $files[] = $sub_file;
                }
            }
        }
        closedir($handle);
    }

    return $files;
}

?>
</html>
