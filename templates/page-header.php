<div class="page-header" >
  <h1>
  	<?php 
  		if ( is_tax( 'job-type' ) ) {
  			echo roots_title() . " Positions";
  		} elseif ( is_category( 'news' ) ) {
  			echo '<span class="umph">BOSS</span> News Stories';
  		} elseif ( is_category( 'events' ) ) {
  			echo '<span class="umph">BOSS</span> Events';
  		} else {
    		echo roots_title();
    	}
   	?>
    <h2><?php if (get_field('subheader')) { the_field('subheader');} ?></h2>
     <h3><?php if (get_field('author')) { the_field('author');} ?></h3>
  </h1>

</div>

<?php if( is_tax() && ($desc = term_description()) ) { ?>
	<div class="tax-description">
		<?php echo $desc; ?>
    </div>
<?php } ?>
