<?php
namespace Controllers\Blocks\BlocksControllers\Titles;


class TitleDataOutput {


    static function get_titleData($title='',$subTitle='',$class='')
    {
        $data = [];

        if($title)
        {
            $data['title'] = $title;
        }

        if($subTitle)
        {
            $data['subtitle'] = $subTitle;
        }

        if($class)
        {
            $data['class'] = $class;
        }

        return $data;
    }

}