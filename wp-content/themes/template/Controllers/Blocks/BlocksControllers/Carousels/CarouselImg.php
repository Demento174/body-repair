<?php
namespace Controllers\Blocks\BlocksControllers\Carousels;


use Controllers\Blocks\BlocksControllers\Titles\TitleDataOutput;

class CarouselImg extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/carousels/carousel-img',
            'id' => null,
            'fields' => ['title','items'],
        ];

    public function __construct($input,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }



    protected function set_data()
    {
        parent::set_data();

        $this->data['title'] = TitleDataOutput::get_titleData($this->acf['title'],'','textCenter');

    }

}