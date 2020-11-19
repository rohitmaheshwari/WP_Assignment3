<?php

if ( isset( $_POST['submit'] ) ) 
{
$masPwd = $_POST['pass'];
if( $masPwd == "123" )
{
header( 'Location: ../password-list.php' );
}
else
header( 'Location: ../index.php' );
}

?>