<?php
global $post;
$furniture = new Controllers\PostsAndTax\PostFurniture();

get_header();
renderBlock('Titles\TitleCardProduct',
    [
        'img'=>$furniture->img,
        'title'=>$furniture->title,
        'lot'=>$furniture->acf['art'],
        'content'=>$furniture->acf['content'],
        'price'=>$furniture->acf['prices'],
        'characters'=>$furniture->acf['characters'],
    ]);

renderBlock('StepsBlock',
    [
        'title'=>$furniture->acf['how_to_place_an_order_title'],
        'items'=>$furniture->acf['how_to_place_an_order'],

    ]);

renderBlock('Carousels\CarouselImg',
    [
        'title'=>$furniture->acf['carouselImg_title'],
        'items'=>$furniture->acf['gallery'],
        'owlClass'=>'carousel-img-threeColumns'
    ]);

renderBlock('Forms\FormRowPhone',
    [
        'title'=>$furniture->acf['form_row']['title'],
        'btnContent'=>$furniture->acf['form_row']['btn_text'],
        'response'=>$furniture->acf['form_row']['response'],
    ]);
get_footer();