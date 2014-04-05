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
		
		<?php if ( empty( $_POST ) ): ?>
					
			<?php $sponsor_id = $_GET['sponsor_id']; ?>
			
		<?php else: ?>
		
			<?php $sponsor_id = $_POST['sponsor_id']; ?>
		
		<?php endif; ?>
		
		<?php $guests = $regs->get_sponsored_guests( $sponsor_id ); ?>
		
		<?php //var_dump($guests); ?>
		
		<?php if ( !empty( $guests ) ): ?>
		
			<?php 
				
				$available_registrations = 0;
				
				foreach ( $guests as $guest ) {
					
					if ( property_exists( $guest->data , '24912337' ) ) {
						
						if ( $guest->data->{'24912337'}->value == 1 ) {
						
							++$available_registrations;
							
						}
					}
				}
			
			?>
			
			<ul>
								
			<?php foreach ( $guests as $guest ): ?>
			
				<?php if ( property_exists( $guest->data , '24912337' ) ): ?>
				
					<?php if ( $guest->data->{'24912337'}->value == 0 ): ?>
					
						<li><a href="<?php echo add_query_arg( array( 'action' => 'view' , 'registration_id' => $guest->id ) , get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/guest' ) ) ); ?>"><?php echo $guest->data->{'24795094'}->value->first . " " . $guest->data->{'24795094'}->value->last; ?></a></li>
					
					<?php elseif ( $guest->data->{'24912337'}->value == 1 ): ?>
					
						<li><a href="<?php echo add_query_arg( array( 'action' => 'edit' , 'registration_id' => $guest->id ) , get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/guest' ) ) ); ?>">Available Registration</a></li>
					
					<?php endif; ?>
					
				<?php else: ?>
				
					<li><a href="<?php echo add_query_arg( array( 'action' => 'view' , 'registration_id' => $guest->id ) , get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/guest' ) ) ); ?>"><?php echo $guest->data->{'24795094'}->value->first . " " . $guest->data->{'24795094'}->value->last; ?></a></li>
				
				<?php endif; ?>

			<?php endforeach; ?>
		
		</ul>
			
		<?php else: ?>
			
			<p>The selected sponsor has no available tickets or pre-registrations.</p>
		
		<?php endif; ?>
		
		<?php if ( !isset( $available_registrations ) || !$available_registrations ): ?>
		
			<ul>
				<li><a href="<?php echo add_query_arg( array( 'action' => 'register' , 'sponsor_type' => $_GET['sponsor_type'] , 'sponsor_id' => $sponsor_id ), get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration' ) ) ); ?>">Sponsor New Guest</a></li>
			</ul>
		
		<?php endif; ?>
		
		<ul>
			<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration' ) ); ?>">Return to Registration Menu</a></li>
			<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/dashboard' ) ); ?>">Return to Main Menu</a></li>
		</ul>
	
	<?php endif; ?>
	
<?php endif; ?>