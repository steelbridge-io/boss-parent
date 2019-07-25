<?php
/*
Template Name: Donation Page
*/
?>

<?php get_template_part('templates/page', 'header'); ?>

<?php echo do_shortcode('[gravityform id="4" title="false" description="false"]');?>

<?php get_template_part('templates/content', 'page'); ?>


