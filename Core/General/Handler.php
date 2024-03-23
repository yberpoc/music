<?php

namespace Core\General;

class Handler
{
    public function includeComponentByURL(string $url) :void
    {
        $method = 'Views';

        $componentPathTemplate = $this->getComponentPathFromURL($url);

        if (str_contains($componentPathTemplate, 'Api')) {
            $method = 'Api';
        }

        $this->includeTemplate($method, $componentPathTemplate);
    }

    /**
     * @param string $url
     * @return string
     * Формирование пути компонента из URL
     */
    private function getComponentPathFromURL(string $url) :string
    {
        if ($url == '/') {
            return 'Main';
        }

        $arUrlParams = $this->makeUrlArray($url);

        foreach ($arUrlParams as &$urlParam) {
            $urlParam = ucfirst($urlParam);
        }
        
        return implode('/', $arUrlParams);
    }

    /**
     * @param string $url
     * @return array
     * Формирование из строки URL в массив
     */
    private function makeUrlArray(string $url) :array
    {
        $arUrl = explode('/', $url);

        return $this->clearUrlArray($arUrl);
    }

    /**
     * @param array $arUrl
     * @return array
     * Очистка массива URL от лишних символов и
     * пустых значений
     */
    private function clearUrlArray(array $arUrl) :array
    {
        unset($arUrl[0]);
        unset($arUrl[count($arUrl)]);
        
        return array_values($arUrl);
    }

    private function includeTemplate(string $method, string $componentPathTemplate) :void
    {
        $path = "Public/Views/" . $componentPathTemplate . '/component.php';

        if ($method == 'Api') {

            if (file_exists("Public/" . $componentPathTemplate . '/component.php')) {
                include "Public/" . $componentPathTemplate . '/component.php';;
            } else {
                echo '404';
            }

        } else {
            include 'Public/Views/header.php';

            if (file_exists($path)) {
                include $path;
            } else {
                echo '404';
            }

            include 'Public/Views/footer.php';
        }
    }
}