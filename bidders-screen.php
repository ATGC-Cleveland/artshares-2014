<?php
/**
 * Template Name: Event Cover
 *
 * @package WordPress
 * @subpackage ArtCares2014
 * @since ArtCares2014 0.0.1
 */

// setup variables

define('CLIENT_ID', '11880');
define('CLIENT_SECRET', '98e576a1c6');
define('REDIRECT_URL', get_permalink());

define('SERVICE_URL', 'https://www.formstack.com/api/v2');
define('AUTHORIZE_EP', '/oauth2/authorize');
define('AUTHORIZE_URL', SERVICE_URL.AUTHORIZE_EP);
define('TOKEN_EP', '/oauth2/token');
define('TOKEN_URL', SERVICE_URL.TOKEN_EP);

if ( empty( $_GET['code'] ) ) {

	$auth_query = http_build_query( array(
		'client_id' => CLIENT_ID,
		'redirect_uri' => REDIRECT_URL,
		'response_type' => 'code'
	));
	
	//var_dump($auth_query);
	
	$auth_url = AUTHORIZE_URL . '?' . $auth_query;
	
	header( 'Location:' . $auth_url );
	
} else {

	$token_query = http_build_query( array(
        'grant_type' => 'authorization_code',
        'client_id' => CLIENT_ID,
        'redirect_uri' => REDIRECT_URL,
        'client_secret' => CLIENT_SECRET,
        'code' => $_GET['code']
    ));
	
	$request = curl_init( TOKEN_URL );
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($request, CURLOPT_POST, 1); 
    curl_setopt($request, CURLOPT_POSTFIELDS, $token_query);
    
    var_dump( curl_exec( $request ) );
}

$res_query = http_build_query( array(
	'folders' => '1'
));

$res = curl_init( SERVICE_URL . '/form/1715418/submission?data&expand_data&search_field_0=24795534&search_value_0=1&per_page=100' );
curl_setopt($res, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($res, CURLOPT_HTTPHEADER, array( 'Authorization: Bearer c7cdec36959425d8b4839947fbf6bb34' ) );
//curl_setopt($res, CURLOPT_POST, 1);
//curl_setopt($res, CURLOPT_POSTFIELDS, $res_query);

//var_dump( curl_getinfo( $res ) );

$registrations = json_decode( curl_exec( $res ) );

//var_dump($registrations);

$guests = array();

foreach ( $registrations->submissions as $registration ) {
	
	foreach ( $registration->data as $field ) {
		
		if( $field->label == 'Guest ID' ) {
			
			$guests[] = $field->value;
		}
	}
}

//var_dump( $guests );

sort ( $guests , SORT_NUMERIC );

//var_dump( $guests );

curl_close( $res );

$res2 = curl_init( SERVICE_URL . '/form/1715421/submission?data&expand_data&per_page=100' );
curl_setopt($res2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($res2, CURLOPT_HTTPHEADER, array( 'Authorization: Bearer c7cdec36959425d8b4839947fbf6bb34' ) );

$bids = json_decode( curl_exec( $res2 ) );

var_dump( $bids );

$bid_list = array();

foreach ( $guests as $bidder ) {

	foreach ( $bids->submissions as $bid ) {
	
		if ( $bid->data->{'24795064'}->value == $bidder ) {
		
			//$guest_id = '';
			//$items = '';
			//$total = '';
			
			if ( !array_key_exists( $bidder , $bid_list ) ) {
				
				$guest_id = $bidder;
				$items = 1;
				$total = floatval( $bid->data->{'24795074'}->value );
			} else {
				
				$items = ++$items;
				$total = $total + floatval( $bid->data->{'24795074'}->value );
			}
			
			$bid_list[ $bidder ] = array(
				'guest_id' => $guest_id,
				'items' => $items,
				'total' =>  $total
			);
			
			//var_dump( $bid->data );
		}
	}
}

//var_dump($bid_list);

$bid_list = array_chunk( $bid_list , 10 , true );

//var_dump($bid_list);

$row_data = array();

foreach ( $bid_list as $group ) {
	
	foreach( $group as $row ) {
		
		$row_data[] = '<tr><td>' . $row['guest_id'] . '</td><td>' . $row['items'] . ' item(s)</td><td>$' . $row['total'] . '</td></tr>';
	}
	
	//var_dump($row_data);
	
	$table_header = '<thead><tr><th>Bidder #</th><th>Items Won</th><th>Total</th></tr></thead>';
	
	$table = '<table>' . $table_header . implode( $row_data ) . '</table>';
	
	echo $table;
	
	$row_data = array();
}




?>
