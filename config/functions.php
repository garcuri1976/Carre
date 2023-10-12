<?php 

function is_user_logged_in() 
{	
    session_start();

    $user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

	return $user;
}