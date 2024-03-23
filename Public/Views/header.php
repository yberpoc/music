<!doctype html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/Public/Assets/css/style.css">
        <link rel="stylesheet" href="/Public/Assets/css/fonts.css">
        <link rel="stylesheet" href="/Public/Assets/css/loader.css">
        <title>Music</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <a href="/" class="sidebar__logo">Music</a>
                <div class="sidebar__menu">
                    <ul>
                        <li class="sidebar__menu_item <?if($_SERVER['REQUEST_URI'] == '/pool/'):?>sidebar__menu_item--active<?endif?>">
                            <div class="sidebar__menu_item--logo"></div>
                            <a href="/pool/">Опрос</a>
                        </li>
                        <li class="sidebar__menu_item <?if($_SERVER['REQUEST_URI'] == '/records/'):?>sidebar__menu_item--active<?endif?>">
                            <div class="sidebar__menu_item--logo"></div>
                            <a href="/records/">Пластинки</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main">

                <div class="wrapper__header">
                    <div class="header">
                        <div class="header_logo">MUSIC</div>
                        <a href="/personal/" class="header_personal">Личный кабинет</a>
                    </div>
                </div>
                <div class="container">

