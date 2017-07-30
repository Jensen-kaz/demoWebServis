<?php

// configuration
require("../includes/config.php");

if ($_SERVER ["REQUEST_METHOD"] == "GET")
{
	render("quote_form.php", ["title" => "Send symbol"]);
}



?>
