<?php
namespace Controllers\Blocks\BlocksControllers\Pages\Catalog;

use Controllers\PostsAndTax\TaxProductCategory;
use Controllers\PostsAndTax\TaxProductTag;

class Content extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/Pages/Catalog/content',
            'id' => 'options',
        ];

    public function __construct($input,$id = null)
    {

        parent::__construct(static::$options['template'], $id , $input);
    }

    protected function set_data()
    {
        parent::set_data();
        $activeCat = "0";
        $activeMark = "0";
        if($this->data['activeCat'] !== '0')
        {
            $tax =new TaxProductTag($this->data['activeCat']);
            $activeCat = $tax->id;
        }

        if($this->data['activeMark'] !== '0')
        {
            
            $tax =new TaxProductCategory($this->data['activeCat']);
            $activeMark = $tax->id;
        }


        $this->data['marks'] = \Controllers\PostsAndTax\TaxProductCategory::get_allTerms();
        $this->data['details'] = \Controllers\PostsAndTax\TaxProductTag::get_allTerms();
        $this->data['products'] = \Controllers\PostsAndTax\PostProduct::get_all_posts();
        $this->data['activeCat']= $activeCat;
        $this->data['$activeMark']= $activeMark;
    }

}