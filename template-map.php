<?php
/*
Template Name: Program Map
*/

  get_template_part('templates/page', 'header');
  while (have_posts()) : the_post();
    the_content();
  endwhile; ?>
<div id="mapp0_poi_list" class="mapp-poi-list" style="width:100%"></div>