<?php
namespace Controllers\PostsAndTax;
use \Controllers\ACF\GetACF as GetACF;

class PostFurniture extends PostAbstract {

    static $postType = 'furniture';
    static $tax_slug = 'tax_cat';
    static $fields =
        [
            'art'       => 'vendor_code',
            'content'   => 'content',
            'prices'    => 'prices',
            'characters'=> 'characters',
            'gallery'   => 'gallery',
            'deadline',
        ];
    static $optionsPage = 'options_post-furniture';
    static $optionsField =
        [
            'how_to_place_an_order_title',
            'how_to_place_an_order',
            'form_row',
            'carouselImg_title'
        ];
    public $icon = null;
    public function __construct($id=null)
    {
        parent::__construct('furniture',$id,self::$fields);
        $this->set_taxonomy(self::$tax_slug,'\Controllers\PostsAndTax\TaxCat');
        $this->set_prices();
        $this->set_icon();
    }

    protected function set_acf($acf=[])
    {
        parent::set_acf($acf);
        $this->acf = GetACF::getACF(self::$optionsField,self::$optionsPage,$this->acf);
    }

    private function set_prices()
    {
        if($this->acf['prices']['switch'])
        {
            $this->acf['prices']['difference'] = $this->acf['prices']['old_price'] - $this->acf['prices']['new_price'];
            $this->acf['price'] = $this->acf['prices']['new_price'];
        }else
            {
                $this->acf['price'] = $this->acf['prices']['old_price'];
            }
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