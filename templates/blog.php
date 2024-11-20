<?php 
/*
Template Name: Blog
*/
get_header(); 

// Correctly include template parts if needed
get_template_part('template-parts/hero'); 
get_template_part('template-parts/blog'); 

get_template_part('template-parts/started'); 

get_footer();
?>