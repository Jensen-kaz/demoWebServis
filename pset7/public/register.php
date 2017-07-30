<?php

// configuration
require("../includes/config.php");

if ($_SERVER ["REQUEST_METHOD"] == "GET")
{
	render("register_form.php", ["title" => "Register"]);
}

	else if ($_SERVER ["REQUEST_METHOD"]=="POST")
	{
		if(empty($_POST["username"]))
		{
			apologize("You must provide your username.");
		}

		if(empty($_POST["password"]))
		{
			apologize("You must provide your password.");
		}
		
		if($_POST["password"] != $_POST["confirmation"])
		{
			apologize("Passwords are not correct. Please try it again.");
		}
		

		// CS50::query("SELECT * FROM users WHERE username = ?",$_POST["username"])
		
		


		if(CS50::query("SELECT *FROM users WHERE username = ?", $_POST["username"]) == true)
		{
			apologize("Username already exists. Please try it again.");
		}
		else
			{
			/*	$Rows = CS50::query("SELECT LAST_INSERT_ID () AS id");
				$Id = $rows[0]["id"];
				$_SESSION = $Id;
			*/	
				CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?,?, 12000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
				redirect("/index.php");
			}
		
		
	
	}

?>
