<?php
/*
Template Name: Главная
*/

get_header();
renderBlock('Titles\MainTitleBlock',['title'=>'mainTitle_title','subTitle'=>'mainTitle_subtitle','img'=>'mainTitle_img']);
renderBlock('TabsBlock',['title'=>'tabs_title']);
renderBlock('Carousels\CarouselCardFurniture',['title'=>'blockCarouselPortfolio_title','switch'=>'blockCarouselPortfolio_itemsAll','items'=>'blockCarouselPortfolio_items']);
get_footer();

