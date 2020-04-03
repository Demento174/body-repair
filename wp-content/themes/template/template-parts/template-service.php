<?php
/*
Template Name: Услуга
*/
global $post;

get_header();

renderBlock('/blocks/Pages/ServicePage/intro',                  //------------ [ Блок с заголовком ]
    [
        'title'=>$post->post_title,
        'btn_text'=>'servicePage_titles_btn_text',//--[ общее свойство ]
        'img'=>get_the_post_thumbnail_url( $post->ID, 'full' )
    ]);

renderBlock('/blocks/Pages/ServicePage/fourColumnsBlock',       //------------ [ Блок с контентом (общий блок) ]
    [
        'items'=>'servicePage_columns'
    ]);

renderBlock('/blocks/Pages/ServicePage/aboutBlock',             //------------ [ Блок с описанием услуги ]
    [
        'title'=>'block_columns_title',
        'content'=>'block_description_content',
        'img'=>'block_description_img'
    ]);

renderBlock('/blocks/Pages/ServicePage/FormFindOutTheCost',             //------------ [ Блок с формой "Узнать стоимость" (общий блок) ]
    [
        'post_title'=>$post->post_title,
        'img'=>'servicePage_form_img',
        'title'=>'servicePage_form_title',
        'btn'=>'servicePage_form_btn',
        'response'=>'servicePage_form_response',

    ]);

renderBlock('Pages\ServicePage\Portfolio',                      //------------ [ Блок с выполнеными работами (Controller) ]
    [
        'icons'=> //-- [ Общие поля ]
            [
                'credit'=> get_field('servicePage_img_price','options'),
                'deadline'=> get_field('servicePage_img_deadline','options')
            ],
        'items'=> 'block_portfolio'
    ]);

renderBlock('/blocks/Pages/ServicePage/rowForm',                 //------------ [ Блок с формой "Записаться на консультацию" (общий блок) ]
    [
        'title'=>'servicePage_formConsultation_title',
        'btn'=>'servicePage_formConsultation_btn',
        'response'=>'servicePage_formConsultation_response',
    ]);

get_footer();

