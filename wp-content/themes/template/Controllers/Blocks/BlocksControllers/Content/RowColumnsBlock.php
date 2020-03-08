<?php
namespace Controllers\Blocks\BlocksControllers\Content;


use Controllers\Blocks\BlocksControllers\Titles\TitleDataOutput;

class RowColumnsBlock extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/content/row-columns',
            'id' => null,
            'fields' => ['title','items','prices'],

        ];
    private $prices;

    public function __construct($input,$id=null)
    {
        if(isset($input['prices']))
        {
            $this->prices = $input['prices'];
            unset($input['prices']);
        }else
            {
                $this->prices = false;
            }

        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);

        $this->set_data();
    }


    protected function set_data()
    {

        parent::set_data();
        $this->data['title'] = TitleDataOutput::get_titleData($this->acf['title'],'','textCenter');
        $this->data['class'] = !$this->prices?'':'row-columns-prices';

    }

}