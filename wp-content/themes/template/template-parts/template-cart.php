<?php
/*
Template Name: Корзина
*/

get_header();

renderBlock('Pages\Cart\Content',
    [
        'title',
        'basket'=>WC()->cart->get_cart(),
        'form_title',
        'form_btn'=>'form_btn_text',
        'form_response'
    ]);


get_footer();


