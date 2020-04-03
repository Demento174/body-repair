<?php
return
    [
        'dirname'=>'Views',
        'functions'=>
            [
                'get_field'=>'get_field',
                'wp_head'=>'wp_head',
                'wp_footer'=>'wp_footer',
                'get_permalink'=>'get_permalink',
                'get_page_link'=>'get_page_link',
                'get_pagesServices'=>'get_pagesServices',
                'social_networks'=>function(){ return \Controllers\Blocks\BlocksControllers\Details\SocialNetworks::get_data(); },
                'form_modal'=>function(){  return \Controllers\Blocks\BlocksControllers\Forms\FormModalBlock::get_data(); },
                'menu'=>function(){wp_nav_menu( ['menu'  => 'menu','container'=>false,'menu_class'=>'']);} ,
            ],
    ];