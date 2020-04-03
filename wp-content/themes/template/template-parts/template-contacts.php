<?php
/*
Template Name: Контакты
*/
get_header();
renderBlock('/blocks/Pages/Contacts/content',
    [
        'title',
        'phone',
        'address',
        'working_hours',
        'map',
        'contacts'
        ]);
get_footer();