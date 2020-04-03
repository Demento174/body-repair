<?php
namespace Controllers\WC;

class WCController{
    /**
     * Количество товаров в корзине
     */
    static function get_countItemInTheBasket()
    {
        return WC()->cart->get_cart_contents_count();
    }

    /**
     * Общая цена товаров в корзине
     */
    static function  get_totalBasketPrice()
    {
        return WC()->cart->cart_contents_total;
    }

    /**
     * Возвращает аттрибуты товара
     */
    static function get_attributes($id)
    {
      $product  = new \Controllers\PostsAndTax\PostProduct($id);
      $attributes = $product->attributes;

        $attributes[]=
            [
                'title'=>'Артикул',
                'value'=>$product->number
            ];
       $attributes[]=
           [
               'title'=>'На складе',
               'value'=>$product->stock
           ];

       return $attributes;
    }


    static function removeFromBasket($key)
    {
        $result = 'key not defined';
        if($key)
        {
            if(WC()->cart->remove_cart_item( $key ))
            {
                $result = "{$key} deleted";
            }
                else
                    {
                        $result = "{$key} Error";
                    }
        }

        wp_die($result);
    }
    
    static function changeQuantityInCart($key,$quantity)
    {
        $cart_item_key = $key;

        // Get the array of values owned by the product we're updating
        $threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );

        // Get the quantity of the item in the cart
        $threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($quantity, FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

        // Update cart validation
        $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );

        // Update the quantity of the item in the cart
        if ( $passed_validation ) {
            WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
        }
        wp_die();
    }


    static function createOrder($data)
    {
        // Получить корзину
        $cart = WC()->cart;

        $phone = esc_attr( trim( json_decode(stripslashes($data['phone']),true)['title'].': '.json_decode(stripslashes($data['phone']),true)['value'] ) );
        $name = esc_attr( trim( json_decode(stripslashes($data['name']),true)['title'].': '.json_decode(stripslashes($data['name']),true)['value']  ) );
        $email = esc_attr( trim( '' ) );
        $nonce = esc_attr( trim( isset($data['address'])?json_decode(stripslashes($data['address']),true)['title'].': '.json_decode(stripslashes($data['address']),true)['value']  :'' ) );

        $address = [
            'first_name' => $name,
            'email'      => $email,
            'phone'      => $phone,
            'address_1'  => $nonce,
            'country'    => 'RU',
        ];

        $order = wc_create_order();

        // Информация о покупателе
        $order->set_address( $address, 'billing' );
        $order->set_address( $address, 'shipping' );

        // Товары из корзины
        foreach( $cart->get_cart() as $cart_item_key => $cart_item ) {

            $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

            $order->add_product( $_product, $cart_item['quantity'], [
                'variation' => $cart_item['variation'],
                'totals'    => [
                    'subtotal'     => $cart_item['line_subtotal'],
                    'subtotal_tax' => $cart_item['line_subtotal_tax'],
                    'total'        => $cart_item['line_total'],
                    'tax'          => $cart_item['line_tax'],
                    'tax_data'     => $cart_item['line_tax_data']
                ]
            ]);
        }


        $order->calculate_totals();

        $mailer = WC()->mailer();

        
        // Отправить письмо админу
        $email = $mailer->emails['WC_Email_New_Order'];
        $email->trigger( $order->id );

        // Очистить корзину
        $cart->empty_cart();

        wp_send_json_success( $order->id );
    }
}