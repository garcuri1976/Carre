<?php 

function is_user_logged_in() 
{	
    $user = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

	return $user;
}