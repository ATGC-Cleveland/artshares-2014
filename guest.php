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

<h1>View Guest Profile</h1>

<?php

	$params = array (
			'data' => '',
			'expand_data' => '',
		);
	
	$form_fields = array(
			'guest_id' => array( 'id' => '24795099' , 'label' => 'Guest ID' ),
			'guest_name' => array( 'id' => '24795094' , 'label' => 'Guest Name' ),
			'date_of_birth' => array( 'id' => '24795115' , 'label' => 'Date of Birth' ),
			'email' => array( 'id' => '24795600' , 'label' => 'Email Address' ),
			'gender' => array( 'id' => '24795116' , 'label' => 'Gender' ),
			'guest_type' => array( 'id' => '24795097' , 'label' => 'Guest Type' ),
			'ticket_holder' => array( 'id' => '24795108' , 'label' => 'Purchaser' ),
			'affiliation' => array( 'id' => '24840760' , 'label' => 'Affiliation' ),
			'status' => array( 'id' => '24795534' , 'label' => 'Status' ),
		);
	
	$profile = array();
		
	$guest = $regs->get_registration( $_GET['guest_id'] , $params );
	
	//var_dump( $guest );
	
	foreach ( $form_fields as $field_name => $field_meta ) {
	
		$profile[ $field_name ] = array( 'label' => $field_meta['label'] , 'value' => 'No information available.' );
		
		foreach ( $guest->data as $details ) {
			
			if ( $details->field == $field_meta['id'] ) {
				
				$profile[ $field_name ] = array( 'label' => $field_meta['label'] , 'value' => $details->flat_value );
				
			}
		}
	}
	
	if ( $profile['ticket_holder']['value'] == 'No information available.' ) {
		
		unset( $profile['ticket_holder'] );
		
	} elseif ( $profile['affiliation']['value'] == 'No information available.' ) {
		
		unset( $profile['affiliation'] );
	}
	
	var_dump($profile);

?>

<h2><?php echo $profile['guest_name']['value']; ?></h2>

<dl>
<?php foreach ( $profile as $field => $data ): ?>

	<?php if ( $field != 'guest_name' && $field != 'guest_id' ): ?>
	
		<dt><?php echo $data['label']; ?></dt>
		
		<?php if ( $field == 'status' ): ?>
			
			<dd><?php echo $data['value'] == '0' ? 'Unclaimed' : 'Claimed'; ?></dd>
		
		<?php else: ?>
		
			<dd><?php echo $data['value']; ?></dd>
		
		<?php endif; ?>
		
	<?php endif; ?>

<?php endforeach; ?>
</dl>

<ul>
	<li><a href="#">Edit Guest</a></li>
	<li><a href="#">Check-in Guest</a></li>
</ul>

<ul>
	<li><a href="<?php echo get_permalink( get_page_by_path( 'artcares/twentyfourteen/registration' ) ); ?>">Return to Registration Menu</a></li>
	<li><a href="#">Return to Main Menu</a></li>