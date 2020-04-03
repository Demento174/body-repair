<?php
/*
Template Name: Каталог
*/
get_header();

renderBlock('Pages\Catalog\Content', //-----------[ Controller ]
    [
        'title',
        'activeCat'=>!isset($_GET['cat'])?'0':get_term_by('slug',$_GET['cat'],'product_tag')->term_id,
        'activeMark'=>!isset($_GET['mark'])?'0':get_term_by('slug',$_GET['mark'],'product_cat')->term_id,
        'pagination_quantity',
        'default_img'=>'product_default_img'
    ]);

get_footer();