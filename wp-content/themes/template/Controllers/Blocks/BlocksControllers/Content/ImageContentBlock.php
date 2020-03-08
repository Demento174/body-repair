<?php
namespace Controllers\Blocks\BlocksControllers\Content;


class ImageContentBlock extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/content/column-imgContent',
            'id' => null,
            'fields' => ['imgContentBlock_img','imgContentBlock_content'],
        ];

    public function __construct($input,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }


}