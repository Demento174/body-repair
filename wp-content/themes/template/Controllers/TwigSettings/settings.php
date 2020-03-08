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
                'social_networks'=>function(){ return \Controllers\Blocks\BlocksControllers\Details\SocialNetworks::get_data(); },
                'form_modal'=>function(){  return \Controllers\Blocks\BlocksControllers\Forms\FormModalBlock::get_data(); },
                'menu_header'=>function(){wp_nav_menu( ['menu'  => 'header','container'=>false,'menu_class'=>'navigation flex_row justify_around align_center']);} ,
            ],
    ];