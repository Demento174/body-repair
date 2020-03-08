<?php
namespace Controllers\Blocks\BlocksControllers\Titles;
use \Controllers\Blocks\BlocksControllers\Titles\TitleDataOutput;

class H3Block extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/title/h3',
            'id' => null,
            'fields' =>['title','subTitle','class'],
        ];
    private $class='';

    public function __construct($input,$id=null)
    {

        if(isset($input['class']))
        {
            $this->class = $input['class'];
            unset($input['class']);
        }
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);

    }




    protected function set_data()
    {

        $this->data['title'] = TitleDataOutput::get_titleData(
            !isset($this->acf['title'])?'':$this->acf['title'],
            !isset($this->acf['subTitle'])?'':$this->acf['subTitle'],
                        $this->class
            );

    }

}