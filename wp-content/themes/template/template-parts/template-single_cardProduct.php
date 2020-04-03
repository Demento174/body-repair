<?php
$product = wc_get_product($post->ID);


get_header();

renderBlock('blocks/Pages/CardProduct/intro',                                  //------------ [ Блок с заголовком и аттрибутами ]
    [
        'id'=>$product->get_id(),
        'number'=>$product->get_sku(),
        'title'=>$product->get_name(),
        'link_back'=>get_page_link(7),
        'attributes'=>\Controllers\WC\WCController::get_attributes($product->get_id()),
        'price'=>$product->get_price(),
        'img'=>get_the_post_thumbnail_url($product->get_id()),
        'default_img'=>'product_default_img'
    ]);

renderBlock('blocks/Pages/CardProduct/Columns',                                 //------------ [ Блок с колонками (Общий блок) ]
    [
        'sale_title'=>'productPage_howToBuy_title',
        'sale'=>"productPage_howToBuy",
        'delivery_title'=>'productPage_delivery_title',
        'delivery'=>'productPage_delivery'
    ]);

renderBlock('blocks/Pages/CardProduct/description',                             //------------ [ Блок с описанием товара ]
    [
        'title'=>'description_title',
        'content'=>'description','map'=>'map'
    ]);

get_footer();

