<?php

namespace Controllers\DisableAdminMenu;

class DisableAdminMenuController{

    private $settings;
    public function __construct($settings=null)
    {
        if(!is_admin())
        {
            return;
        }

        $this->settings = !$settings?require_once('settings.php'):$settings;
        add_action('admin_menu', [$this,'handler']);
    }

    public function handler()
    {
        foreach ($this->settings as $item)
        {
            remove_menu_page($item);
        }
    }
}