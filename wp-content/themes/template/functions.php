<?php
/**
 * Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Template
 * @since 1.0
 */


require_once (get_template_directory().'/autoload.php');

new Controllers\TemplateSetup\TemplateSetup();

//new Controllers\TwigSettings\TwigSettings();

new Controllers\ACF\ACFController();

new Controllers\ScriptsAndStyles\RegisterScriptsAndStyle();

new Controllers\DisableContentEditor\DisableContentEditorController();

new Controllers\CPT\CustomPostTypeController();

new Controllers\CPT\CustomTaxonomyController();

new Controllers\DisableAdminMenu\DisableAdminMenuController();

function renderBlock($blockClass,$options=[],$id=null)
{
    $blockClass = '\Controllers\Blocks\BlocksControllers\\'.$blockClass;
    $class = new $blockClass($options,$id);
    return $class->render();
}

function get_postFurniture($id=null)
{
    return new Controllers\PostsAndTax\PostFurniture($id);
}

function get_postPortfolio($id=null)
{
    return new Controllers\PostsAndTax\PostPortfolio($id);
}
