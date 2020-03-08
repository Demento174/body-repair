<?php
/*
Template Name: Отзывы
*/

global $post;
get_header();
renderBlock('WrapperCol12Block',
        [
            'template'=>'./blocks/title/h1.twig',
            'title'=>
            [
                'title'=>get_field('title',$post->ID),
                'class'=>'paddingTop110 paddingBottom110 h1_about'
            ],
        ]);


renderBlock('ReviewsPage',['items'=>'reviews']);
get_footer();