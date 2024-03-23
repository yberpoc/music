<?php

namespace Core\General;

class Settings
{
    /**
     * @return array
     * Получение данных настроек базы данных
     */
    public static function getDB(string $path = '/settingsDB') :array
    {
        return self::getFromFile($path);
    }

    /**
     * @param string $settingsFilePath
     * @return array
     * Получение данных из файла настроек
     */
    private static function getFromFile(string $settingsFilePath) :array
    {
        $fileLines = file($_SERVER['DOCUMENT_ROOT'] . $settingsFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($fileLines)
        {
            foreach ($fileLines as $line)
            {
                list($key, $value) = explode('=', $line);

                $key = trim($key);
                $value = trim($value);

                $arSettings[$key] = $value;
            }
        }

        return $arSettings ?? [];
    }
}