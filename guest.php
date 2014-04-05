<?php
/**
 * Template Name: Guest Profile
 *
 * @package WordPress
 * @subpackage ArtShares 2014
 * @since ArtShares 2014 0.0.5
 */
 
 $regs = new ATGC_Registration();
 
?>

<?php if ( array_key_exists( 'action' , $_GET ) ): ?>

	<?php if ( $_GET['action'] == 'view' ): ?>

		<h1>View Guest Profile</h1>
		
		<?php $profile = $regs->get_guest( $_GET['guest_id'] ); ?>
		
		<h2><?php echo $profile['guest_name']['value']; ?></h2>
		<h3>Guest ID: #<?php echo $profile['guest_id']['value']; ?></h3>
		
		<dl>
		<?php foreach ( $profile as $field => $data ): ?>
		
			<?php if ( $field != 'guest_name' && $field != 'guest_id' ): ?>
			
				<dt><?php echo $data['label']; ?></dt>
				
				<?php if ( $field == 'status' ): ?>
					
					<dd><?php echo $data['value'] == '0' ? 'Unclaimed' : 'Claimed'; ?></dd>
				
				<?php elseif ( $field == 'guest_type' ): ?>
				
					<dd><?php echo $regs->convert_guest_type( $data['value'] ) ?></dd>
				
				<?php elseif ( $field == 'sponsor_type' ): ?>
				
					<dd><?php echo $regs->convert_sponsor_type( $data['value'] ) ?></dd>
				
				<?php elseif ( $field == 'gender' ): ?>
				
					<dd><?php echo $regs->convert_gender( $data['value'] ) ?></dd>
				
				<?php elseif ( $field == 'dob' ): ?>
				
					<dd><?php echo $regs->convert_dob( $data['value'] ) ?></dd>
				
				<?php else: ?>
				
					<dd><?php echo $data['value']; ?></dd>
				
				<?php endif; ?>
				
			<?php endif; ?>
		
		<?php endforeach; ?>
		</dl>
	
	<?php elseif ( $_GET['action'] == 'edit' ): ?>
	
		<?php
			// allocate form values
			
			//var_dump( $_POST );
			
			if ( empty( $_POST ) ) {
				
				$profile = $regs->get_guest( $_GET['guest_id'] );
			
				/**
				 * Name Parser
				 *
				 * @todo Move to theme function
				 * @todo realizing some ways where this would fail if first or last name not provided, explore further
				 */
				
				//var_dump($profile['guest_name']['value']);
				
				if ( $profile['guest_name']['value'] != 'No information available.' ) {
					
					list( $first_name , $last_name ) = explode( ' ' , $profile['guest_name']['value'] );
					
				} else {
					
					$first_name = '';
					$last_name = '';
				}
				
				/**
				 * Profile Array if no updates have been posted
				 *
				 * @todo Move to theme function
				 */
				
				$guest_profile = array (
					'name' => array (
						'first' => $first_name,
						'last' => $last_name,
					),
					'dob' => array (
						'year' => $regs->convert_dob( $profile['dob']['value'] , 'iso' , 'year' ),
						'month' => $regs->convert_dob( $profile['dob']['value'] , 'iso' , 'month' ),
						'day' => $regs->convert_dob( $profile['dob']['value'] , 'iso' , 'day' ),
					),
					'gender' => $regs->convert_gender( $profile['gender']['value'] , 'integer' ),
					'guest_type' => $regs->convert_guest_type( $profile['guest_type']['value'] , 'integer' ),
					'email' => $profile['email']['value'],
					'sponsor_type' => $regs->convert_sponsor_type( $profile['sponsor_type']['value'] , 'integer' ),
					'sponsor' => $profile['sponsor']['value'],
					'status' => $profile['status']['value'],
				);
				
				//var_dump($guest_profile);
			}
		?>
	
		<h1>Edit Guest Profile</h1>
		
		<form action="<?php echo add_query_arg( array( 'action' => 'update' , 'guest_id' => $_GET['guest_id'] ), get_permalink() ); ?>" method="post">
			<fieldset>
				<legend>Guest Name</legend>
				<fieldset>
					<label for="first_name">First Name</label>
					<input type="text" id="first_name" name="field_<?php echo $profile['guest_name']['id']; ?>[first]" class="form-text" value="<?php echo $guest_profile['name']['first'] ?>" />
				</fieldset>
				
				<fieldset>
					<label for="last_name">Last Name</label>
					<input type="text" id="last_name" name="field_<?php echo $profile['guest_name']['id']; ?>[last]" class="form-text" value="<?php echo $guest_profile['name']['last'] ?>" />
				</fieldset>
			</fieldset>
			
			<fieldset>	
				<legend>Date of Birth</legend>
				
				<fieldset>
					<label for="month">Month</label>
					<select id="month" name="field_<?php echo $profile['dob']['id']; ?>[month]" class="form-text">
						<option value="" <?php selected( $guest_profile['dob']['month'] == '' ); ?>></option>
						<?php
							$months = range( 1 , 12 );
							
							foreach ( $months as $month ) {
								echo '<option value="' . $month . '"' . selected( $guest_profile['dob']['month'] == $month ) . '>(' . str_pad( $month , 2 , '0' , STR_PAD_LEFT ) . ') ' . date( 'F' , mktime( 0 , 0 , 0 , $month ) ) . '</option>';
							}
						?>
					</select>
				</fieldset>
				
				<fieldset>
					<label for="day">Day</label>
					<select id="day" name="field_<?php echo $profile['dob']['id']; ?>[day]" class="form-text">
						<option value="" <?php selected( $guest_profile['dob']['day'] == '' ); ?>></option>
						<?php
							$days = range( 1 , 31 );
							
							foreach ( $days as $day ) {
								echo '<option value="' . $day . '"' . selected( $guest_profile['dob']['day'] == $day ) . '>' . $day . '</option>';
							}
						?>
					</select>
				</fieldset>
				
				<fieldset>
					<label for="year">Year</label>
					<select id="year" name="field_<?php echo $profile['dob']['id']; ?>[year]" class="form-text">
						<option value="" <?php selected( $guest_profile['dob']['year'] == '' ); ?>></option>
						<?php
							$years = range( 2014-18 , 2014-90 );
							
							foreach ( $years as $year ) {
								echo '<option value="' . $year . '"' . selected( $guest_profile['dob']['year'] == $year ) . '>' . $year . '</option>';
							}
						?>
					</select>
				</fieldset>
			</fieldset>
			
			<fieldset>	
				<label for="gender">Gender</label>
				<select id="gender" name="field_<?php echo $profile['gender']['id']; ?>" class="form-text">
					<option value="" <?php selected( $guest_profile['gender'] == '' ); ?>></option>
					<option value="1" <?php selected( $guest_profile['gender'] == '1' ); ?>>Male</option>
					<option value="2" <?php selected( $guest_profile['gender'] == '2' ); ?>>Female</option>
					<option value="3" <?php selected( $guest_profile['gender'] == '3' ); ?>>Transgender</option>
				</select>
			</fieldset>
			
			<fieldset>	
				<label for="guest_type">Guest Type</label>
				<select id="guest_type" name="field_<?php echo $profile['guest_type']['id']; ?>" class="form-text">
					<option value="" <?php selected( $guest_profile['guest_type'] == '' ); ?>></option>
					<option value="1" <?php selected( $guest_profile['guest_type'] == '1' ); ?>>Pre-Registered</option>
					<option value="2" <?php selected( $guest_profile['guest_type'] == '2' ); ?>>Walk-In</option>
					<option value="3" <?php selected( $guest_profile['guest_type'] == '3' ); ?>>Young Professional</option>
					<option value="4" <?php selected( $guest_profile['guest_type'] == '4' ); ?>>Complimentary</option>
				</select>
			</fieldset>
			
			<fieldset>
				<label for="email">Email</label>
				<input type="email" id="email" name="field_<?php echo $profile['email']['id']; ?>" class="form-text" value="<?php echo $guest_profile['email'] == 'No information available.' ? '' : $guest_profile['email'] ?>" />
			</fieldset>
			
			<fieldset>
				<legend>Sponsorship</legend>
				
				<label for="sponsor_type">Sponsor Type</label>
				<select id="sponsor_type" name="field_<?php echo $profile['sponsor_type']['id']; ?>" class="form-text">
					<option value="" <?php selected( $guest_profile['sponsor_type'] == '' ); ?>></option>
					<option value="1" <?php selected( $guest_profile['sponsor_type'] == '1' ); ?>>Guest</option>
					<option value="2" <?php selected( $guest_profile['sponsor_type'] == '2' ); ?>>Affiliation</option>
				</select>
				
				<label for="sponsor">Sponsor</label>
				<input type="text" id="sponsor" name="field_<?php echo $profile['sponsor']['id']; ?>" class="form-text" value="<?php echo $guest_profile['sponsor'] == 'No information available.' ? '' : $guest_profile['sponsor'] ?>" />
			</fieldset>
			
			<fieldset>
				<label for="status">Status</label>
				<select id="status" name="field_<?php echo $profile['status']['id']; ?>" class="form-text">
					<option value="" <?php selected( $guest_profile['status'] == '' ); ?>></option>
					<option value="0" <?php selected( $guest_profile['status'] == '0' ); ?>>Unclaimed</option>
					<option value="1" <?php selected( $guest_profile['status'] == '1' ); ?>>Claimed</option>
				</select>
			</fieldset>
		
			<fieldset class="form-actions">
				<button type="submit" name="form_action" value="update">Update Guest Profile</button>
				<button type="submit" name="form_action" value="checkin">Update Profile & Checkin Guest</button>
				<button type="submit" name="form_action" value="cancel">Cancel</button>
			</fieldset>
		</form>
		
	<?php elseif ( $_GET['action'] == 'update' ): ?>
	
		<?php
			
			// update guest profile
				
			//var_dump($_POST);
			
			/*$guest_profile = array (
				'name' => array (
					'first' => $_POST[ 'field_' . $profile['guest_name']['id'] ]['first'],
					'last' => $_POST[ 'field_' . $profile['guest_name']['id'] ]['last'],
				),
				'dob' => array (
					'year' => $_POST[ 'field_' . $profile['dob']['id'] ]['year'],
					'month' => $_POST[ 'field_' . $profile['dob']['id'] ]['month'],
					'day' => $_POST[ 'field_' . $profile['dob']['id'] ]['day'],
				),
				'gender' => $_POST[ 'field_' . $profile['gender']['id'] ],
				'guest_type' => $_POST[ 'field_' . $profile['guest_type']['id'] ],
				'email' => $_POST[ 'field_' . $profile['email']['id'] ],
				'sponsor_type' => $_POST[ 'field_' . $profile['sponsor_type']['id'] ],
				'sponsor' => stripslashes( $_POST[ 'field_' . $profile['sponsor']['id'] ] ),
				'status' => $_POST[ 'field_' . $profile['status']['id'] ],
			);*/
			
			
			
			//var_dump($updated_profile);
				
			//var_dump( $guest_profile );
		?>
		
		<h1>Updated Guest Profile</h1>
		
		<?php if ( $_POST['form_action'] == 'update' ):  ?>
		
			<p>Update and process profile</p>
			
			<?php $updated_profile = $regs->update_registration( $_GET['guest_id'] , stripslashes_deep( $_POST ) ); ?>
			
			<?php var_dump( $updated_profile ); ?>
			
			<?php if ( property_exists( $updated_profile , 'success' ) ): ?>
			
				<p>The guest profile has been successfully updated.</p>
			
			<?php endif; ?>
		
		<?php elseif ( $_POST['form_action'] == 'checkin' ):  ?>
		
			<p>Update and process profile</p>
		
		<?php elseif ( $_POST['form_action'] == 'cancel' ):  ?>
		
			<p>Update canceled. No data was saved.</p>
		
		<?php endif; ?>
	
	<?php elseif ( $_GET['action'] == 'checkin' ): ?>
	
		<h1>Guest Check-in</h1>
		
		<?php $response = $regs->checkin_guest( $_GET['guest_id'] ); ?>
		
		<?php if ( property_exists( $response , 'success' ) ): ?>
			
			<p>This guest has been successfully checked-in as an attendee at ArtCares 2014.</p>
			<p>Their bidder number is:</p>
			<p>Please instruct guest to proceed to end of the registration area to receive their event program which includes their bidder ID.</p>
			
		<?php endif; ?>
	
	<?php else: ?>
		
		<h1>Error</h1>
		<p>Invalid Action</p>
	
	<?php endif; ?>
	
	<ul>
		<?php if ( $_GET['action'] == 'view' ): ?>
		
			<li><a href="<?php echo add_query_arg( array( 'action' => 'edit' , 'guest_id' => $_GET['guest_id'] ) , get_permalink() ); ?>">Edit Guest</a></li>
		
		<?php elseif ( $_GET['action'] == 'edit' || $_GET['action'] == 'update' ): ?>
		
			<li><a href="<?php echo add_query_arg( array( 'action' => 'view' , 'guest_id' => $_GET['guest_id'] ) , get_permalink() ); ?>">View Guest</a></li>

		<?php endif; ?>
		
		<?php if ( $_GET['action'] != 'checkin' ): ?>
			
			<li><a href="<?php echo add_query_arg( array( 'action' => 'checkin' , 'guest_id' => $_GET['guest_id'] ) , get_permalink() ); ?>">Check-in Guest</a></li>
		<?php endif; ?>
		
	</ul>
	
	<ul>
		<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration' ) ); ?>">Return to Registration Menu</a></li>
		<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/dashboard' ) ); ?>">Return to Main Menu</a></li>
	</ul>
	
<?php endif; ?>