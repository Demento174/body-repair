<?php
namespace Controllers\PostsAndTax;

use Controllers\ACF\GetACF;

class TaxCat extends TaxonomyAbstract {

    static $options =
        [
             'type' => 'tax_cat',
             'fields' =>
                [
                    'img'
                ],
        ];

    public $icon;
    public function __construct($id)
    {
        parent::__construct(self::$options['type'],$id,self::$options['fields']);
       $this->set_icon();
    }

    protected function set_link()
    {
        $this->link = get_page_link(73).'?tax='.$this->term->slug;
    }
    
    private function set_icon()
    {

        if($this->term->parent == 0)
        {
            $this->icon = $this->acf['img'];
        }else
            {
                $this->set_parent();
                
                $this->icon = GetACF::getACF(['img'],$this->parent[0]);
            }
    }

    public static function set_termParent($type='',$className='')
    {
        return parent::set_termParent(self::$options['type'],'\\'.__CLASS__);

    }

    public static function set_termHierarchical($type='',$className='')
    {
        return parent::set_termHierarchical(self::$options['type'],'\\'.__CLASS__);
    }
}