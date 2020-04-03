<?php
/*
Template Name: Главная
*/

get_header();

renderBlock('/blocks/Pages/Index/rowColumnsBlock',  //------------ [ Блок с колонками ]
    [
        'title'=>'block_columns_title',
        'items'=>'block_columns'
    ]);

renderBlock('Pages\Index\CatLinksBlock');          //------------ [ Блок с ссылками на Таксаномии (Controller) ]

renderBlock('Pages\Index\MarksBlock',                   //------------ [ Блок с ссылками на категории (Controller) ]
    [
        'title'=>'marks_link_title'
    ]);

renderBlock('/blocks/Pages/Index/content_img',      //------------ [ Блок Контент и изображение ]
    [
        'title'=>'block_contentImg_title',
        'content'=>'block_contentImg_content',
        'img'=>'block_contentImg_img'
    ]);

get_footer();

