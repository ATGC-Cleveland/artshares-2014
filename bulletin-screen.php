<?php
/**
 * Template Name: Bulletin Board
 *
 * @package WordPress
 * @subpackage ArtCares2014
 * @since ArtCares2014 0.0.1
 */

$list = new ATGC_BulletinBoard();

$bid_list = $list->get_winners_list(10);

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
