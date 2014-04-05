<?php
/**
 * Template Name: Sponsors Screen
 *
 * @package WordPress
 * @subpackage ArtShares 2014
 * @since ArtShares 2014 0.0.5
 */

//var_dump( $_POST );

$regs = new ATGC_Registration();

?>

<h1>Sponsor Profile</h1>

<?php if ( array_key_exists( 'action' , $_GET ) ): ?>

	<?php if ( $_GET['action'] == 'view' ): ?>
	
		<h2>Sponsored Guests and Available Registrations</h2>
		
		<?php $guests = $regs->get_sponsored_guests( $_GET['sponsor_id'] ); ?>
		
		<?php //var_dump($guests); ?>
		
		<?php if ( !empty( $guests ) ): ?>
			
			<ul>
								
			<?php foreach ( $guests as $guest ): ?>
			
				<?php if ( property_exists( $guest->data , '24795094' ) ): ?>
				
					<li><a href="<?php echo add_query_arg( array( 'action' => 'view' , 'guest_id' => $guest->id ) , get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/guest' ) ) ); ?>"><?php echo $guest->data->{'24795094'}->value->first . " " . $guest->data->{'24795094'}->value->last; ?></a></li>
				
				<?php else: ?>
				
					<li><a href="<?php echo add_query_arg( array( 'action' => 'edit' , 'guest_id' => $guest->id ) , get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/guest' ) ) ); ?>">Available Registration</a></li>
				
				<?php endif; ?>
			
				
			
			<?php endforeach; ?>
		
		</ul>
			
		<?php else: ?>
			
			<p>There are no available sponsored tickets for the guest you entered.</p>
			<p>Please do one of the following:</p>
		
		<?php endif; ?>
	
	<?php endif; ?>
	
<?php endif; ?>