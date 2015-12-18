<?php

define( "FORMS_ROOT", dirname( __FILE__ ) . "/" );

function loader( $_class ) {
	$class = explode( '\\', $_class );
	
	$file = array_pop( $class );
	$dir = array_pop( $class );
	$class = FORMS_ROOT . $dir . "/" . $file . ".php";
	
	if( file_exists( $class ) ) {
		require_once $class;
		return true;
	}
	
	return false;
}

spl_autoload_register( 'loader' );
