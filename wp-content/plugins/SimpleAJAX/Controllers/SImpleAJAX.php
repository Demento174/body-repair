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

    function send_form()
    {
        if($_POST){

            $headers = 'From: Furniture <mail@usedcars.demento174.ru>' . "\r\n";
            $str = '';

            if($_POST['form'])
            {
                $str.= 'Заявка с формы: '.$_POST['form']. "\r\n";
            }

            if($_POST['name']){
                $str.='Имя: '.$_POST['name']."\r\n";
            }

            if($_POST['phone']){
                $str.='Телефон: '.$_POST['phone']. "\r\n";
            }


            if($_POST['email']){
                $str.='Email: '.$_POST['email']."\r\n";
            }


            $to = $_POST['emailTo']?$_POST['emailTo']:get_field('email','options');

            wp_mail( $to,'sale.planeta-avto.ru',  $str, $headers);
            wp_die('end');
        }
    }
}