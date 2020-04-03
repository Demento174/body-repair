<?php
namespace Controllers\Blocks\BlocksControllers\Pages\Cart;


use Controllers\PostsAndTax\PostProduct;

class Content extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/Pages/Cart/content',
        ];

    public function __construct($input,$id = null)
    {
        parent::__construct(static::$options['template'], $id , $input);
    }

    private function get_products($basket =[])
    {
        $result = [];
        foreach ($basket as $key=>$item)
        {
            $result[]=
                [
                    'quantity'=>$item['quantity'],
                    'product'=>new PostProduct($item["product_id"]),
                    'key'=>$item['key']
                ];
        }

        return $result;
    }

    protected function set_data()
    {
        parent::set_data();
        global $woocommerce;
        $this->data['basket'] = $this->get_products($this->data['basket']);

        $this->data['total_price']=$woocommerce->cart->total;
    }

}