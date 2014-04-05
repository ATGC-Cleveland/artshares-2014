<?php
/**
 * Template Name: Registration Screen
 *
 * @package WordPress
 * @subpackage ArtShares 2014
 * @since ArtShares 2014 0.0.5
 */

//var_dump( $_POST );

$regs = new ATGC_Registration();

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
						
							<p>No guests were found matching the desired information.</p>
						
						<?php else: ?>
						
							<ul>
								
								<?php foreach ( $guests as $guest ): ?>
								
									<?php // need to develop a way to alphabetize this list ?>
								
									<li><a href="<?php echo add_query_arg( array( 'action' => 'view' , 'registration_id' => $guest->id ) , get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/guest' ) ) ); ?>"><?php echo $guest->data->{'24795094'}->value->first . " " . $guest->data->{'24795094'}->value->last ?></a></li>
								
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
				
				<?php elseif ( $_GET['type'] == 'sponsor' ): ?>
				
					<h3>Search by Sponsor</h3>
					
					<?php if ( !empty( $_POST ) ): ?>
					
						<h2>Sponsors List</h2>
						
						<?php //var_dump( $_POST ); ?>
						
						<?php $sponsors = $regs->get_sponsors( $_POST ); ?>
						
						<?php //var_dump( $sponsors ); ?>
						
						<?php if ( !empty( $sponsors ) ): ?>
						
							<ul>
									
								<?php foreach ( $sponsors as $sponsor_id => $sponsor ): ?>
								
									<?php // need to develop a way to alphabetize this list ?>
									
									<?php if ( $_POST['search_by'] == 'guest' ): ?>
								
										<li><a href="<?php echo add_query_arg( array( 'action' => 'view' , 'guest_id' => $sponsor['id'] , 'sponsor_type' => 1 , 'sponsor_id' => $sponsor_id ) , get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/sponsor' ) ) ); ?>"><?php echo $sponsor['first_name'] . " " . $sponsor['last_name'] . ' (' . $sponsor['guests'] . ')' ?></a></li>
									
									<?php elseif ( $_POST['search_by'] == 'affiliation' ): ?>
									
										<li><a href="<?php echo add_query_arg( array( 'action' => 'view' , 'guest_id' => $sponsor['id'] , 'sponsor_type' => 2 , 'sponsor_id' => $sponsor_id ) , get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/sponsor' ) ) ); ?>"><?php echo $sponsor['affiliate_name'] . ' (' . $sponsor['guests'] . ')' ?></a></li>
									
									<?php endif; ?>
								
								<?php endforeach; ?>
							
							</ul>
						
						<?php else: ?>
						
							<p>The selected sponsor has no available tickets or pre-registrations.</p>
							
						<?php endif; ?>
					
					<?php else: ?>
					
						<form action="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'sponsor' ), get_permalink() ); ?>" method="post">
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
								<button type="submit" name="search_by" value="guest">Search by Guest</button>
							</fieldset>
						</form>
						
						<form action="<?php echo add_query_arg( array( 'action' => 'view' , 'type' => 'sponsor' , 'sponsor_type' => 2 ), get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration/sponsor' ) ) ); ?>" method="post">
							<fieldset>
								<label for="affiliation">Affiliation</label>
								<?php $affiliates = $regs->get_affiliates(); ?>
								
								<select id="affiliation" name="sponsor_id" class="form-text">
								
									<option value=""></option>
									
									<?php foreach ( $affiliates as $affiliate ): ?>
									
										<option value="<?php echo $affiliate->data->{'24898126'}->value; ?>"><?php echo $affiliate->data->{'24898013'}->value; ?></option>
										
									<?php endforeach; ?>
								</select>
							</fieldset>
						
							<fieldset class="form-actions">
								<button type="submit" name="search_by" value="affiliation">Search by Affiliation</button>
							</fieldset>
						</form>
					
					<?php endif; ?>
				
				<?php endif; ?>
				
			<?php endif; ?>
			
				<ul>
					<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration' ) ); ?>">Return to Registration Menu</a></li>
					<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/dashboard' ) ); ?>">Return to Main Menu</a></li>
				</ul>
		
		<?php elseif ( $_GET['action'] == 'register' ): ?>
		
			<h2>Register New Guest</h2>
			
			<?php if ( empty( $_POST ) ): ?>
			
				<form action="<?php echo add_query_arg( array( 'action' => 'register' ), get_permalink() ); ?>" method="post">
					<fieldset>
						<legend>Guest Name</legend>
						<fieldset>
							<label for="first_name">First Name</label>
							<input type="text" id="first_name" name="field_<?php echo $regs->get_form_field_id( 'guest_name' ); ?>[first]" class="form-text" />
						</fieldset>
						
						<fieldset>
							<label for="last_name">Last Name</label>
							<input type="text" id="last_name" name="field_<?php echo $regs->get_form_field_id( 'guest_name' ); ?>[last]" class="form-text" />
						</fieldset>
					</fieldset>
					
					<fieldset>	
						<legend>Date of Birth</legend>
						
						<fieldset>
							<label for="month">Month</label>
							<select id="month" name="field_<?php echo $regs->get_form_field_id( 'dob' ); ?>[month]" class="form-text">
								<option value=""></option>
								<?php
									$months = range( 1 , 12 );
									
									foreach ( $months as $month ) {
										echo '<option value="' . $month . '">(' . str_pad( $month , 2 , '0' , STR_PAD_LEFT ) . ') ' . date( 'F' , mktime( 0 , 0 , 0 , $month ) ) . '</option>';
									}
								?>
							</select>
						</fieldset>
						
						<fieldset>
							<label for="day">Day</label>
							<select id="day" name="field_<?php echo $regs->get_form_field_id( 'dob' ); ?>[day]" class="form-text">
								<option value=""></option>
								<?php
									$days = range( 1 , 31 );
									
									foreach ( $days as $day ) {
										echo '<option value="' . $day . '">' . $day . '</option>';
									}
								?>
							</select>
						</fieldset>
						
						<fieldset>
							<label for="year">Year</label>
							<select id="year" name="field_<?php echo $regs->get_form_field_id( 'dob' ); ?>[year]" class="form-text">
								<option value=""></option>
								<?php
									$years = range( 2014-18 , 2014-90 );
									
									foreach ( $years as $year ) {
										echo '<option value="' . $year . '">' . $year . '</option>';
									}
								?>
							</select>
						</fieldset>
					</fieldset>
					
					<fieldset>	
						<label for="gender">Gender</label>
						<select id="gender" name="field_<?php echo $regs->get_form_field_id( 'gender' ); ?>" class="form-text">
							<option value=""></option>
							<option value="1">Male</option>
							<option value="2">Female</option>
							<option value="3">Transgender</option>
						</select>
					</fieldset>
					
					<fieldset>	
						<label for="guest_type">Guest Type</label>
						<select id="guest_type" name="field_<?php echo $regs->get_form_field_id( 'guest_type' ); ?>" class="form-text">
							<option value=""></option>
							<option value="1">Pre-Registered</option>
							<option value="2">Walk-In</option>
							<option value="3">Young Professional</option>
							<option value="4">Complimentary</option>
						</select>
					</fieldset>
					
					<fieldset>
						<label for="email">Email</label>
						<input type="email" id="email" name="field_<?php echo $regs->get_form_field_id( 'email' ); ?>" class="form-text" value="" />
					</fieldset>
					
					<fieldset>
						<legend>Sponsorship</legend>
						
						<label for="sponsor_type">Sponsor Type</label>
						
						<?php $sponsor_type = ( isset( $_GET['sponsor_type'] ) || array_key_exists( 'sponsor_type' , $_GET ) ) ? $_GET['sponsor_type'] : ''; ?>
						
						<input type="hidden" name="field_<?php echo $regs->get_form_field_id( 'sponsor_type' ); ?>" value="<?php echo $sponsor_type ?>" /> 

						<select id="sponsor_type" name="field_<?php echo $regs->get_form_field_id( 'sponsor_type' ); ?>" class="form-text" <?php if ( $sponsor_type ) { echo 'disabled'; } ?>>
							<option value="" <?php selected( $sponsor_type , '' ); ?>></option>
							<option value="1" <?php selected( $sponsor_type , 1 ); ?>>Guest</option>
							<option value="2" <?php selected( $sponsor_type , 2 ); ?>>Affiliation</option>
						</select>
						
						<label for="sponsor">Sponsor</label>
						
						<?php $sponsor_id = ( isset( $_GET['sponsor_id'] ) || array_key_exists( 'sponsor_id' , $_GET ) ) ? $_GET['sponsor_id'] : ''; ?>
						
						<input type="hidden" name="field_<?php echo $regs->get_form_field_id( 'sponsor' ); ?>" value="<?php echo $sponsor_id; ?>" />
						
						<input type="text" id="sponsor" name="field_<?php echo $regs->get_form_field_id( 'sponsor' ); ?>" class="form-text" value="<?php echo $sponsor_id; ?>" <?php if ( $sponsor_id ) { echo 'disabled'; } ?> />
					</fieldset>
					
					<fieldset>
						<label for="status">Status</label>
						<select id="status" name="field_<?php echo $regs->get_form_field_id( 'status' ); ?>" class="form-text">
							<option value=""></option>
							<option value="0">Unclaimed</option>
							<option value="1">Claimed</option>
						</select>
					</fieldset>
				
					<fieldset class="form-actions">
						<button type="submit" name="form_action" value="register">Register Guest</button>
						<button type="submit" name="form_action" value="checkin">Checkin Guest</button>
						<button type="submit" name="form_action" value="cancel">Cancel</button>
					</fieldset>
				</form>
			
			<?php else: ?>
			
				<?php //var_dump( $_POST ); ?>
				
				<?php if ( isset( $_POST['form_action'] ) || array_key_exists( 'form_action' , $_POST ) ): ?>
				
					<?php if ( $_POST['form_action'] == 'register' || $_POST['form_action'] == 'checkin' ): ?>
					
						<?php $register_response = $regs->register_guest( stripslashes_deep( $_POST ) ); ?>
						
						<?php if ( array_key_exists( 'status' , $register_response ) ): ?>
						
							<?php if ( $register_response['status'] ): ?>
							
								<p><?php echo $register_response['message']; ?></p>
							
							<?php endif; ?>
							
							<?php if ( $register_response['action'] == 'checkin' ): ?>
							
								<p>The guest's bidder number is:</p>
								
								<p><?php echo $register_response['guest_id']; ?></p>
							
							<?php endif; ?>
						
						<?php endif; ?>
				
					<?php elseif ( $_POST['form_action'] == 'cancel' ): ?>
				
						<p>New guest registration was canceled. No data was saved.</p>
				
					<?php endif; ?>
			
				<?php endif; ?>
			
			<?php endif; ?>
			
			<ul>
				<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration' ) ); ?>">Return to Registration Menu</a></li>
				<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/dashboard' ) ); ?>">Return to Main Menu</a></li>
			</ul>
		
		<?php else: ?>
		
			<div>
				<ul>
					<li><a href="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'guest' ), get_permalink() ); ?>">Search by Guest Name</a></li>
					<li><a href="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'sponsor' ), get_permalink() ); ?>">Search by Sponsor</a></li>
					<li><a href="<?php echo add_query_arg( array( 'action' => 'register' ), get_permalink() ); ?>">Register New Guest</a></li>
				</ul>
			</div>
			
		<?php endif; ?>

	<?php endif; ?>

	<?php if ( empty( $_GET ) ): ?>

		<div>
			<ul>
				<li><a href="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'guest' ), get_permalink() ); ?>">Search by Guest Name</a></li>
				<li><a href="<?php echo add_query_arg( array( 'action' => 'search' , 'type' => 'sponsor' ), get_permalink() ); ?>">Search by Sponsor</a></li>
				<li><a href="<?php echo add_query_arg( array( 'action' => 'register' ), get_permalink() ); ?>">Register New Guest</a></li>
			</ul>
		</div>

	<?php endif; ?>
	
</div>