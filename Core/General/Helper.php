<?php

namespace Core\General;

class Helper
{
    public static function print(mixed $array, string $color = 'white') :void
    {
        echo '<pre style="color:' . $color . '">';
        print_r($array);
        echo '</pre>';
    }

    public static function includeAllFilesFromDir(string $dirName) :void
    {
        $pathToDir =  $_SERVER['DOCUMENT_ROOT'] . "/Core/$dirName/";
        $files = scandir($pathToDir);

        foreach ($files as $file) {
            $filename = $pathToDir . $file;

            if ($file != '.' && $file != '..' && $file != __FILE__) {
                include_once $filename;
            }
        }
    }
}