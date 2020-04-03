<?php
namespace Controllers\Blocks\BlocksControllers\Details;


class SocialNetworks extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
             'template'  => './blocks/details/social',
             'id' => 'options',
             'field' => 'social_networks',
        ];


    public function __construct()
    {
        parent::__construct(static::$options['template']);
        $this->set_data();
    }

    protected function set_data()
    {

        $this->data = $this->acf;
    }

    public static function get_data()
    {       

        return get_field(self::$options['field'],self::$options['id']);
    }

}