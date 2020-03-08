<?php
/*
Template Name: Каталог "Выполненые работы"
*/

get_header();
renderBlock('Titles\H3Block',['title'=>'title','class'=>'textCenter paddingTop110 paddingBottom30']);
renderBlock('CasesPage');
get_footer();

