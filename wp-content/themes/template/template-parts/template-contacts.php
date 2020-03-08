<?php
/*
Template Name: Контакты
*/
get_header();
renderBlock('ContactsPage',['title','phone','email','address','working_hours','requisites','map']);
get_footer();