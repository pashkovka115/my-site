<?php

$photo = $_FILES['image']['tmp_name'];
$name = md5($photo) . '.jpg';
$dir = substr(md5(microtime()), mt_rand(0, 30), 2) . '/' . substr(md5(microtime()), mt_rand(0, 30), 2);
$path = $dir . '/' . $name;
