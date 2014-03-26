<div id="mainContent">
	<?php 
	if (have_posts()) : 
	while (have_posts()) : the_post(); 
	?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

	<div class="entry">
	<?php the_content('Read the rest of this page &raquo;'); ?>
    </div>

	<div class="postmetadata">
	<span class="postTime">Last edited: <?php the_time('F jS, Y'); ?></span>
	<span class="editLink"><?php edit_post_link('Edit', '', ''); ?></span>
	</div><!--  close postMetaData -->
</div><!--  close post -->
<?php 
	endwhile; 
endif; 
?>
</div><!--maincontent-->

