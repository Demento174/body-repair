<?php
namespace Controllers\Blocks\BlocksControllers\Base;


use Controllers\WC\WCController;

class HeaderBlock extends \Controllers\Blocks\BlockAbstractController {

    static $options  =
        [
             'templateHead'  => './blocks/base/head.twig',
             'templateHeader'  => './blocks/base/header.twig',
             'templateNavigation'  => './blocks/base/navigation.twig',
             'id' => 'options',
             'fields' => ['logo','content','address','working_hours','phone','basket_img'],
        ];

    public function __construct($options=[],$id = null)
    {
        parent::__construct(static::$options['templateHead'], !$id?static::$options['id']:$id , !$options?static::$options['fields']:$options);
        $this->set_data();
    }

    protected function set_data($fields=[])
    {

        $this->data =
            [
                'logo'=>
                    [
                        'link'=>is_front_page()?'#':'/',
                        'img'=>$this->acf['logo'],
                    ],
                'content'=>$this->acf['content'],
                'address'=>$this->acf['address'],
                'working_hours'=>$this->acf['working_hours'],
                'phone'=>$this->acf['phone'],
                'basket_icon'=>$this->acf['basket_img'],
                'count'=>\Controllers\WC\WCController::get_countItemInTheBasket(),
                'cart_url'=>wc_get_cart_url(),
                'total_price'=>WCController::get_totalBasketPrice()
            ];
    }


    public function render()
    {

        \Timber::render(static::$options['templateHead']);
        \Timber::render(static::$options['templateHeader'],$this->data);
//        \Timber::render(static::$options['templateNavigation'],$this->data);
    }
}