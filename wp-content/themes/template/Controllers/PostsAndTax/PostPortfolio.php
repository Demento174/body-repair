<?php
namespace Controllers\PostsAndTax;

class PostPortfolio extends PostAbstract {

    static $postType = 'portfolio';
    static $tax_slug = 'tax_cat';
    static $fields =
        [
            'gallery',
            'subtitle',
            'price',
            'deadline',
            'characters',
            'blockTask_task',
            'blockTask_wishes',
            'blocktask_youtube',
            'blockscollapsed',
            'review',
            'form',
        ];
    public $icon = null;

    public function __construct($id=null)
    {
        parent::__construct('furniture',$id,self::$fields);
        $this->set_taxonomy(self::$tax_slug,'\Controllers\PostsAndTax\TaxCat');
        $this->set_icon();
    }

    private function set_icon()
    {

        if($this->taxonomy)
        {
            $this->icon = $this->taxonomy['terms']->icon;
        }

    }

    public static function get_all_posts($postType='',$class='\\'.__CLASS__)
    {
        return parent::get_all_posts(self::$postType,$class);
    }

    public static function get_sample_posts($include,$post='',$class= '\\'.__CLASS__)
    {
        return parent::get_sample_posts($include,self::$postType,$class);
    }

    public static function get_taxonomy_posts($tax_id,$tax_slug='',$type='',$class= '\\'.__CLASS__)
    {
        return parent::get_taxonomy_posts($tax_id,self::$tax_slug,self::$postType,$class= '\\'.__CLASS__);
    }
}