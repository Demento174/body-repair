<?php
namespace Controllers\Blocks\BlocksControllers\Titles;


class TitleCarouselsBlock extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/title/title-carousel',
            'id' => null,
            'fields' =>
                ['title','gallery','price','deadline','characters'],
        ];

    private $title = '';
    private $img=[];
    public function __construct($input = null,$id=null)
    {
        if(isset($input['title']))
        {
            $this->title = $input['title'];
            unset($input['title']);
        }

        if(isset($input['img']))
        {
            $this->img = $input['img'];
            unset($input['img']);
        }

        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id,$input);
    }



    protected function set_data()
    {
        parent::set_data();
        $this->data[ 'title' ] = TitleDataOutput::get_titleData($this->title);
        $this->data['img'] = $this->img;

    }

}