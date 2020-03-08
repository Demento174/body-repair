<?php
namespace Controllers\Blocks\BlocksControllers\Content;


class YoutubeBlock extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/content/block-dark',
            'id' => null,
            'fields' => ['background','icon','task','wishes','youtube','review','video'],
        ];


    public function __construct($input,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }

    private function set_slug($link)
    {
        $array = explode('/',$link);

        return end($array);
    }

    protected function set_data()
    {
        parent::set_data();
        $this->data['background'] = get_field('youtubeBlock_background', 'options_post-portfolio');
        $this->data['icon'] =  get_field('youtubeBlock_icon', 'options_post-portfolio');
        $this->data['taskTitle'] =  get_field('youtubeBlock_task-title', 'options_post-portfolio');
        $this->data['wishesTitle'] =  get_field('youtubeBlock_wishs-title', 'options_post-portfolio');
        $this->data['video'] = !isset($this->data['review']['youtube']) ? $this->data['video'] : $this->data['review']['youtube'];


        if(isset($this->data['video']))
        {
            $this->data['videoSlug'] = $this->set_slug($this->data['video']);
        }
    }
}