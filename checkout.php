<?php
/**
 * Template Name: Checkout Screen
 *
 * @package WordPress
 * @subpackage ArtShares 2014
 * @since ArtShares 2014 0.0.5
 */

?>

<h1>Checkout</h1>

<?php if ( isset( $_GET['action'] ) || array_key_exists( 'action' , $_GET ) ): ?>

	<?php if ( $_GET['action'] == 'search' ): ?>
	
		<?php if ( empty( $_POST ) ):    // search form ?>
		
			<form action="<?php echo add_query_arg( array( 'action' => 'view' , 'type' => 'guest_id' ), get_permalink( get_page_by_path( 'artcares/twentyfourteen/checkout/guest' ) ) ); ?>" method="post">
				<fieldset>
					<label for="guest_id">Guest ID</label>
					<input type="text" id="guest_id" name="guest_id" class="form-text" />
				</fieldset>
			
				<fieldset class="form-actions">
					<button type="submit" name="search_by" value="guest_id">Search by Guest ID</button>
				</fieldset>
			</form>
			
			<form action="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'profile' ), get_permalink() ); ?>" method="post">
				<fieldset>
					<label for="first_name">First Name</label>
					<input type="text" id="first_name" name="guest_name[first]" class="form-text" />
				</fieldset>
				
				<fieldset>
					<label for="last_name">Last Name</label>
					<input type="text" id="last_name" name="guest_name[last]" class="form-text" />
				</fieldset>
				
				<fieldset>
					<label for="email">Email</label>
					<input type="email" id="email" name="email" class="form-text" />
				</fieldset>
				
				<fieldset class="form-actions">
					<button type="submit" name="search_by" value="profile">Search by Guest Profile</button>
				</fieldset>
			</form>
		
		<?php else:    // search results ?>
		
			<?php if ( isset( $_GET['type'] ) || array_key_exists( 'type' , $_GET ) ):    // checks that the search type is valid ?>
			
				<?php if ( $_GET['type'] == 'profile' ):    // display results from profile info search ?>
				
					<h2>Guest Profiles</h2>
				
				<?php endif; ?>
			
			<?php else: ?>
			
				<p>Invalid URL.</p>
			
			<?php endif; ?>
		
		<?php endif; ?>
	
	<?php endif; ?>

<?php endif; ?>

<div>
	<ul>
		<li><a href="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'guest' ), get_permalink() ); ?>">Search by Guest Information</a></li>
		<li><a href="<?php echo add_query_arg( array( 'action' => 'add' , 'type' => 'transaction' ), get_permalink() ); ?>">Add New Transaction</a></li>
	</ul>
</div>