<?php
/**
 * Template Name: Checkout Guest Screen
 *
 * @package WordPress
 * @subpackage ArtShares 2014
 * @since ArtShares 2014 0.0.5
 */

$r = new ATGC_Registration();
$co = new ATGC_Checkout();

$registration_form_fields = array(
	'guest_id' => array( 'id' => '24795099' , 'label' => 'Guest ID' ),
	'guest_name' => array( 'id' => '24795094' , 'label' => 'Guest Name' ),
	'dob' => array( 'id' => '24795115' , 'label' => 'Date of Birth' ),
	'email' => array( 'id' => '24795600' , 'label' => 'Email Address' ),
	'gender' => array( 'id' => '24795116' , 'label' => 'Gender' ),
	'guest_type' => array( 'id' => '24795097' , 'label' => 'Guest Type' ),
	'sponsor_type' => array( 'id' => '24874758' , 'label' => 'Sponsor Type' ),
	'sponsor' => array( 'id' => '24795108' , 'label' => 'Sponsor' ),
	'tickets' => array( 'id' => '24898701' , 'label' => 'Tickets' ),
	'status' => array( 'id' => '24795534' , 'label' => 'Status' ),
);

?>

<h1>Checkout Guest</h1>

<?php //var_dump($_POST); ?>

<?php if ( !empty( $_POST ) ):    // ensure POST has data ?>

	<?php if ( isset( $_POST['guest_id'] ) ):    // guest_id is not set ?>
	
		<?php
		
			$params = array(
				'data' => '',
				'expand_data' => '',
				'search_params' => array(
					array( 'field' => 'guest_id' , 'value' => $_POST['guest_id'] ),
					array( 'field' => 'status' , 'value' => 1 ),
				),
			);
			
			$registration = array_shift( $r->get_registrations( $params ) );
			
			//var_dump($registration);
			
			if ( $registration ) {
				
				foreach ( $registration_form_fields as $field_name => $field_meta ) {
				
					foreach ( $registration->data as $details ) {
						
						//var_dump($details);
						
						if ( $details->field == $field_meta['id'] && $details->flat_value != '' ) {
						
							if ( $details->field == $registration_form_fields['guest_name']['id'] ) {
								
								$profile[ $field_name ] = array( 'id' => $field_meta['id'] , 'label' => $field_meta['label'] , 'value' => $details->value->first . ' ' . $details->value->last );
								
							} else {
								
								$profile[ $field_name ] = array( 'id' => $field_meta['id'] , 'label' => $field_meta['label'] , 'value' => $details->flat_value );
							}
						}
					}
				}
			} else {
				
				$profile = array();
			}

			//var_dump($profile);
		?>
		
		<?php if ( !empty( $profile ) ):    // ensure a guest profile was returned ?>
		
			<h2>Guest Profile</h2>
			
			<h2><?php echo $profile['guest_name']['value']; ?></h2>
			<h3>Guest ID: #<?php echo $profile['guest_id']['value']; ?></h3>
			
			<dl>
			<?php foreach ( $profile as $field => $data ): ?>
			
				<?php if ( $field != 'guest_name' && $field != 'guest_id' ): ?>
				
					<dt><?php echo $data['label']; ?></dt>
					
					<?php if ( $field == 'status' ): ?>
						
						<dd><?php echo $data['value'] == '0' ? 'Unclaimed' : 'Claimed'; ?></dd>
					
					<?php elseif ( $field == 'guest_type' ): ?>
					
						<dd><?php echo $r->convert_guest_type( $data['value'] ) ?></dd>
					
					<?php elseif ( $field == 'sponsor_type' ): ?>
					
						<dd><?php echo $r->convert_sponsor_type( $data['value'] ) ?></dd>
					
					<?php elseif ( $field == 'sponsor' ): ?>
					
						<dd><?php echo $r->get_sponsor( $data['value'] , $r->convert_sponsor_type( $profile['sponsor_type']['value'] , 'integer' ) ) ?></dd>
					
					<?php elseif ( $field == 'gender' ): ?>
					
						<dd><?php echo $r->convert_gender( $data['value'] ) ?></dd>
					
					<?php elseif ( $field == 'dob' ): ?>
					
						<dd><?php echo $r->convert_dob( $data['value'] ) ?></dd>
					
					<?php else: ?>
					
						<dd><?php echo $data['value']; ?></dd>
					
					<?php endif; ?>
					
				<?php endif; ?>
			
			<?php endforeach; ?>
			</dl>
			
			<?php $transactions = $co->get_transactions( $profile['guest_id']['value'] ); ?>
			
			<h2>Guest Transactions</h2>
			
			<?php if ( !empty( $transactions ) ):    // make sure transactions were found ?>
				
				<?php var_dump( $transactions ); ?>
			
			<?php else: ?>
			
				<p>No transactions found for this guest.</p>
				
			<?php endif; ?>
		
		<?php else:    // no guest profile found ?>
		
			<p>No profile could be found for the submitted guest ID. Please try again.</p>
		
		<?php endif; ?>
	
	<?php endif; ?>

<?php endif; ?>

