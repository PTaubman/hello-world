<?php
/**
 * @package Hello_Paulie
 * @version 1.0
 */
/*
Plugin Name: Hello Paulie
Plugin URI: https://DigitalMaestro.com
Description: You have to start with a Hello Something program. So why not Hello Paulie for a WordPress test case. Based entirely on Matt W's Hello Dolly plugin.
Author: Paulie Taubman
Version: 1.0
Author URI: https://DigitalMaestro.com
*/

function hello_paulie_get_lyric() {
	/** These are somethings that Paulie says */
	$lyrics = "Hello, Paulie
Well, hello, Paulie.
Come On!
Seriously?
If you erase, you must replace.
I'm Possible.";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );
	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}
// This just echoes the chosen line, we'll position it later
function hello_paulie() {
	$chosen = hello_paulie_get_lyric();
	echo "<p id='paulie'>$chosen</p>";
}
// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_paulie' );
// We need some CSS to position the paragraph
function paulie_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	#paulie {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}
add_action( 'admin_head', 'paulie_css' );
?>
