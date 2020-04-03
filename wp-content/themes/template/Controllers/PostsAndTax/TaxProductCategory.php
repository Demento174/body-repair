<?php
namespace Controllers\PostsAndTax;

use Controllers\ACF\GetACF;

class TaxProductCategory extends TaxonomyAbstract {

    static $options =
        [
            'type' => 'product_cat',
            'fields' =>
                [
                    'img'
                ],
        ];

    public $icon;
    public function __construct($id)
    {
        if($id === 15)
        {
            return false;
        }
        parent::__construct(self::$options['type'],$id,self::$options['fields']);


        $this->set_parent();
    }

    protected function set_link()
    {
        $this->link = get_page_link(73).'?tax='.$this->term->slug;
    }


    public function set_parent($className='\\'.__CLASS__)
    {
        parent::set_parent($className);
    }

    public static function set_termParent($type='',$className='')
    {
        return parent::set_termParent(self::$options['type'],'\\'.__CLASS__);

    }

    public static function set_termHierarchical($type='',$className='')
    {
        return parent::set_termHierarchical(self::$options['type'],'\\'.__CLASS__);
    }

    public static function get_allTerms($type='',$className='')
    {
        return parent::set_allTerms(self::$options['type'],'\\'.__CLASS__);
    }
}