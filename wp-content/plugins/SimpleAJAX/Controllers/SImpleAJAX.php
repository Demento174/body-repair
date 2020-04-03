<?php
/**
 * Loads and registers dependencies.
 *
 * @since    1.0.0
 *
 * @package   WPA
 * @author    Tom McFarlin
 * @license   http://www.gnu.org/licenses/gpl-2.0.txt
 * @link      https://tommcfarlin.com/
 */

/**
 * Loads and enqueues dependencies for the plugin.
 *
 * @package    WPA
 * @subpackage WPA/includes
 * @since      1.0.0
 * @author     Tom McFarlin
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://tommcfarlin.com/
 */
class SimpleAJAX {
	public $action=[];

	public $functionWC;

	public $wpdb;

	public function __construct($action) {
		global $wpdb;

		$this->wpdb=$wpdb;

		$this->action=$action;

		foreach ($this->action as $item){

			add_action(
				'wp_ajax_'.$item,
				array( $this, $item)
			);

			add_action(
				'wp_ajax_nopriv_'.$item,
				array( $this, $item )
			);
		}
	}
	
	function cart_items_count()
    {
        if($_POST)
        {

            echo WC()->cart->get_cart_contents_count();
        }

        wp_die();
    }

    function cart_amount()
    {
        if($_POST)
        {

            echo floatval(preg_replace('#[^\d.]#', '', str_replace('&#8381;', '', WC()->cart->get_cart_subtotal())));
        }
        wp_die();
    }

    function send_form()
    {

        if($_POST){
            if(!isset($_POST['type']))
            {
                unset($_POST['action']);
                new \Controllers\Form\FormController($_POST);
            }else if($_POST['type'] === 'createOrder')
                {
                   \Controllers\WC\WCController::createOrder($_POST);
                }

        }
    }

    function removeFromBasket()
    {
        if($_POST['key'])
        {
            \Controllers\WC\WCController::removeFromBasket($_POST['key']);
        }
    }

    function changeQuantityInCart()
    {
        if($_POST['key'] && $_POST['quantity'])
        {
            \Controllers\WC\WCController::changeQuantityInCart($_POST['key'] ,$_POST['quantity']);
        }
    }
}