<?php
namespace Controllers\PostsAndTax;
use \Controllers\ACF\GetACF as GetACF;
use Controllers\WC\WCController;

class PostProduct extends PostAbstract {

    static $postType = 'product';
    static $tax_marks = 'product_cat';
    static $tax_details = 'product_tag';

    private $product;
    public $price;
    public $number;
    public $manufacturer;
    public $originality;
    public $stock;
    public $attributes=[];

    public $marks;
    public $details;
    public $cats;

    public function __construct($id=null)
    {
        parent::__construct(self::$postType,$id);
        $this->set_product();
        $this->set_price();
        $this->set_number();
        $this->set_manufacturer();
        $this->set_originality();
        $this->set_stock();
        $this->set_attributes();
        $this->set_marks();
        $this->set_details();
        $this->set_cats();
    }

    private function set_product()
    {
        $this->product = wc_get_product($this->id);
    }

    private function set_price()
    {
        $this->price = $this->product->get_price();
    }

    private function set_number()
    {
        $this->number = $this->product->get_sku();
    }

    private function set_manufacturer()
    {
        $this->manufacturer = $this->product->get_attribute('manufacturer');
    }

    private function set_originality()
    {
        $this->originality = $this->product->get_attribute('originality');
    }

    private function set_stock()
    {
        $this->stock = $this->product->get_stock_quantity();
    }

    private function set_attributes()
    {
        foreach ($this->product->get_attributes() as $key=>$item)
        {
            $attribute = wc_get_attribute( $item['id'] );
            $this->attributes[$key]['title']= $attribute->name;
            $this->attributes[$key]['slug']= $attribute->slug;
            $this->attributes[$key]['value']= $this->product->get_attribute($attribute->slug);
        }

    }

    private function set_marks()
    {
        $this->marks = implode(",", $this->product->get_category_ids());
    }

    private function set_details()
    {
        $this->details = implode(",", $this->product->get_tag_ids());
    }

    private function set_cats()
    {
        $this->cats =implode(',',array_merge($this->product->get_category_ids(),$this->product->get_tag_ids())) ;
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