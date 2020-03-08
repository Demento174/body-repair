<?php

global $post;
$portfolio = new Controllers\PostsAndTax\PostPortfolio();

get_header();
renderBlock('Titles\TitleCarouselsBlock',['title'=>$portfolio->title,'img'=>$portfolio->img,'price','deadline','characters']);
renderBlock('Content\YoutubeBlock',['task'=>'blockTask_task','wishes'=>'blockTask_wishes','video'=>'blocktask_youtube']);
foreach (get_field('blockscollapsed',$post->id) as $item)
{
    renderBlock('Content\ColumnChessContentImgBlock',
            [
                'link'=>'<a href="#'.\Controllers\Translite\TransliteController::convertor($item['title']).'" class="flex_row justify_center align_center"><i class="fas fa-chevron-circle-down"></i>'.$item['title'].'</a>',
                'items'=>$item['items'],
                'id'=>\Controllers\Translite\TransliteController::convertor($item['title']),
                'class'=>'toggle_block'
            ]);
}
renderBlock('Content\YoutubeBlock',['review']);
renderBlock('Forms\FormColumnContentPhone',['form']);
renderBlock('Carousels\CarouselCardFurniture',['title'=>get_field('carouselPortfolioItems_title','options_post-portfolio')]);

get_footer();