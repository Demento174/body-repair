<?php
namespace Controllers\Blocks\BlocksControllers;
use \Controllers\Blocks\BlocksControllers\Titles\TitleDataOutput;

class ContactsPage extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './contacts',
            'id' => 'options',
            'fields' => ['title','phone','email','address','working_hours','requisites','map'],
        ];

    public function __construct($input,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }

    protected function set_data()
    {
        $this->data['title']= TitleDataOutput::get_titleData($this->acf['title']);
        $this->data =
            [
                'contacts'=>
                    [
                        [
                            'icon'=>'<i class="fas fa-home"></i>',
                            'title'=>'Наш адрес:',
                            'value'=>$this->acf['address']
                        ],
                        [
                            'icon'=>'<i class="fas fa-mobile-alt"></i>',
                            'title'=>'Наш телефон:',
                            'value'=>$this->acf['phone']
                        ],
                        [
                            'icon'=>'<i class="far fa-clock"></i>',
                            'title'=>'График работы',
                            'value'=>$this->acf['working_hours']
                        ],
                    ],
                'requisites'=>
                    [
                        'icon'=>'<i class="far fa-file-alt"></i>',
                        'title'=>'реквезиты:',
                        'value'=>$this->acf['requisites']
                    ],
                'map'=>$this->acf['map']

            ];
    }

}