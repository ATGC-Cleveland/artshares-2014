<?php
/**
 * Quick way to create a WordPress Post.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * @var string
 * @name $mode
 */
$mode = 'sidebar_right2';
?>
<!-- begin right sidebar -->
<div id="rightcolumn">
<ul><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>

<li>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</li>

<li><a class="greenLink" href="">Español</a></li>

<li><h2>Pages:</h2>

<ul>
<?php wp_list_pages('title_li='); ?> 
</ul>
</li>

<li><h2>Categories:</h2>
<ul>
<?php wp_list_categories('title_li='); ?>
</ul>
</li>

<li><h2>Archives:</h2>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</li>

<li>
<?php
   if (function_exists('generateRandomImgTag'))
   {
      generateRandomImgTag();
   }
?>
</li>

<li>
<h2>W3C Validators:</h2>
<a href="http://validator.w3.org/check?uri=referer">
<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" />
</a>
<a href="http://jigsaw.w3.org/css-validator/check/referer">
<img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" />
</a>
</li>


 
<?php endif; ?>
</ul>
</div>
<!-- end  right sidebar -->