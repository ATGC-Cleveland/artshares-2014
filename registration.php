<?php
/**
 * Template Name: Registration Screen
 *
 * @package WordPress
 * @subpackage ArtShares 2014
 * @since ArtShares 2014 0.0.5
 */

//var_dump( $_POST );

?>

<div>

	<h1>Registrations</h1>

	<?php if ( isset( $_GET['action'] ) || array_key_exists( 'action' , $_GET ) ): ?>
	
		<?php if ( $_GET['action'] == 'search' ): ?>
			
			<?php if ( isset( $_GET['type'] ) || array_key_exists( 'type' , $_GET ) ): ?>
			
				<h2>Search Registrations</h2>
			
				<?php if ( $_GET['type'] == 'guest' ): ?>
				
					<h3>Search by Guest</h3>
					
					<?php if ( !empty( $_POST ) ): ?>
					
						<p>Show guests</p>
						
						<?php
							
							$regs = new ATGC_Registration();
							
							$search = array();
							
							// change this to use array_walk_recursive
							
							foreach ( $_POST as $field => $value ) {
								
								if ( is_array( $value ) ) {
									
									foreach ( $value as $sub_value ) {
									
										$sub_value = trim( $sub_value );
										
										if ( !empty( $sub_value ) ) {
										
											$search[] = array( 'field' => $field , 'value' => $sub_value );
										}
									}
									
								} else {
								
									$value = trim( $value );
									
									if ( !empty( $value ) ) {
										
										$search[] = array( 'field' => $field , 'value' => $value );
									}
								}
							}
							
							$search[] = array( 'field' => 'status' , 'value' => 0 );
							
							//var_dump($search);
							
							$params = array (
									'data' => '',
									'expand_data' => '',
									'search_params' => $search,
								);
							
							//var_dump($params);
							
							$guests = $regs->get_registrations( $params );
							
							//var_dump($guests);
						
						?>
						
						<?php if ( empty( $guests ) ): ?>
						
							<p>No guest was found matching the desired information.</p>
						
						<?php else: ?>
						
							<ul>
								
								<?php foreach ( $guests as $guest ): ?>
								
									<?php // need to develop a way to alphabetize this list ?>
								
									<li><a href="<?php echo add_query_arg( array( 'action' => 'view' , 'guest_id' => $guest->id ) , get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/guest' ) ) ); ?>"><?php echo $guest->data->{'24795094'}->value->first . " " . $guest->data->{'24795094'}->value->last ?></a></li>
								
								<?php endforeach; ?>
							
							</ul>
						
						<?php endif; ?>
					
					<?php else: ?>
					
						<form action="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'guest' ), get_permalink() ); ?>" method="post">
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
								<input type="submit" value="Search" />
							</fieldset>
						</form>
					
					<?php endif; ?>
				
				<?php elseif ( $_GET['type'] == 'purchaser' ): ?>
				
					<h3>Search by Purchaser</h3>
				
					<form action="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'purchaser' ), get_permalink() ); ?>" method="post">
						<fieldset>
							<label for="first_name">First Name</label>
							<input type="text" id="first_name" name="first_name" class="form-text" />
						</fieldset>
						
						<fieldset>
							<label for="last_name">Last Name</label>
							<input type="text" id="last_name" name="last_name" class="form-text" />
						</fieldset>
						
						<fieldset>
							<label for="email">Email</label>
							<input type="email" id="email" name="email" class="form-text" />
						</fieldset>
						
						<fieldset>
							<label for="affiliation">Affiliation</label>
							<input type="affiliation" id="affiliation" name="affiliation" class="form-text" />
						</fieldset>
					
						<fieldset class="form-actions">
							<input type="submit" value="Search" />
						</fieldset>
					</form>
				
				<?php endif; ?>
				
			<?php endif; ?>
			
				<p><a href="<?php echo get_permalink(); ?>">Back to Main</a></p>
		
		<?php elseif ( $_GET['action'] == 'register' ): ?>
		
			<h2>Register New Guest</h2>
			
			<p><a href="<?php echo get_permalink(); ?>">Back to Main</a></p>
		
		<?php else: ?>
		
			<div>
				<ul>
					<li><a href="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'guest' ), get_permalink() ); ?>">Search by Guest Name</a></li>
					<li><a href="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'purchaser' ), get_permalink() ); ?>">Search by Purchaser</a></li>
					<li><a href="<?php echo add_query_arg( array( 'action' => 'register' ), get_permalink() ); ?>">Register New Guest</a></li>
				</ul>
			</div>
			
		<?php endif; ?>

	<?php endif; ?>

	<?php if ( empty( $_GET ) ): ?>

		<div>
			<ul>
				<li><a href="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'guest' ), get_permalink() ); ?>">Search by Guest Name</a></li>
				<li><a href="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'purchaser' ), get_permalink() ); ?>">Search by Purchaser</a></li>
				<li><a href="<?php echo add_query_arg( array( 'action' => 'register' ), get_permalink() ); ?>">Register New Guest</a></li>
			</ul>
		</div>

	<?php endif; ?>
	
</div>