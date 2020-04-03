<?php
namespace Controllers\Blocks\BlocksControllers\Pages\Index;

use Controllers\PostsAndTax\TaxProductTag;

class CatLinksBlock extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/Pages/Index/cat_links',
            'id' => 'options',
        ];

    public function __construct($input,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }

    protected function set_data()
    {
        $taxs = TaxProductTag::get_allTerms();
        usort($taxs,'sort_cat');

        foreach ($taxs as $key=>$item )
        {
            $taxs[$key]->link = get_page_link(76).'?cat='.$item->slug;
        }
        $this->data['items']=$taxs;

    }

}