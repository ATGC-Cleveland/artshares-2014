<?php
/**
 * Template Name: Dashboard Screen
 *
 * @package WordPress
 * @subpackage ArtShares 2014
 * @since ArtShares 2014 0.0.5
 */

?>

<h1>Dashboard</h1>

<div>
	<ul>
		<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration' ) ); ?>">Registration</a></li>
		<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/checkout' ) ); ?>">Checkout</a></li>
	</ul>
</div>