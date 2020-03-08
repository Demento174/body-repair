<?php
/*
Template Name: Мебель на заказ
*/

global $post;
$parent = get_post_ancestors($post->ID)[0];
get_header();
renderBlock('Titles\MainTitleTwoColumnsBlock',['title'=>'mainTitle_title','list'=>'mainTitle_list','img'=>'mainTitle_img']);
renderBlock('Forms\FormRowPhone',['title'=>'rowPhone_title','btnContent'=>'rowPhone_btnContent','response'=>'rowPhone_response'],$parent);
renderBlock('Content\RowColumnsBlock',['title'=>'rowСolumns_title','items'=>'rowСolumns_items'],$parent);
renderBlock('Content\RowStringBlock',['content'=>'rowString_content'],$parent);
renderBlock('Content\ColumnChessContentImgBlock',['items'=>'columnСhessСontentImg']);
renderBlock('Content\RowColumnsBlock',['title'=>'rowСolumnsPrice_title','items'=>'rowСolumnsPrice_items','prices'=>true],$parent);
renderBlock('Forms\FormRowPhone',['title'=>'rowPhone_title','btnContent'=>'rowPhone_btnContent','response'=>'rowPhone_response'],$parent);
renderBlock('Content\ImageContentBlock',['img'=>'imgContentBlock_img','content'=>'imgContentBlock_content']);
renderBlock('Carousels\CarouselImgContent',['title'=>'carouselimgContent-title','items'=>'carouselimgContent-items']);
renderBlock('Forms\FormRowPhone',['title'=>'rowPhone_title','btnContent'=>'rowPhone_btnContent','response'=>'rowPhone_response'],$parent);
renderBlock('Carousels\CarouselCardFurniture',['taxonomy' =>'carouseCardFurniture_taxanomyId' ]);
get_footer();

