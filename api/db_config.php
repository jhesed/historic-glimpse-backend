<?php

	// localhost
	// define ("DB_USER", "jsos_wp");
	// define ("DB_PASSWORD", "12345jhesed");
	// define ("DB_DATABASE", "jsos");
	// define ("DB_HOST", "localhost");

	// live
	define ("DB_USER", "b7_19068544");
	define ("DB_PASSWORD", "MDSc.45p");
	define ("DB_DATABASE", "b7_19068544_jsoscc");
	define ("DB_HOST", "sql204.byethost7.com");

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
?>