<?php

/**
* Based on Matt Carter's example multiple upload file
* @author Matt Carter <m@ttcarter.com>
* @date 2014-02-11
*/

if ($_FILES && isset($_FILES['file'])) { // when upload occurs
     foreach ($_FILES['file']['tmp_name'] as $no => $tmp) { // for each file, $no makes the key variable a counter
	if (!$tmp) 
	    continue; // must have filename to continue
	$id = basename($tmp);// extract basic filename without path
	$id = substr($id,3); // remove php prefix

	if ($_FILES['file']['type'][$no] == 'image/jpeg') {
	    $ext = 'jpg';    // add the correct file extension 
	} elseif ($_FILES['file']['type'][$no] == 'image/png') {
	    $ext = 'png';
	} else {
	    echo "Unknown file type<br/>";
	    continue;
	}

	//if (file_exists("images/" . $_FILES['file']['name'][$no])) { // check if file already exists
	//    echo $_FILES['file']['name'] . "already exists. <br/>";
	//} elseif ($_FILES['file']['error'][$no] > 0) { // check for other errors 
	//    echo "Error: " . $_FILES['file']['error'] . "<br/>"
	//} else continue;

  	echo "Saving $id.$ext...<br/>";
	set_time_limit(300); //extend time limit by 5 minutes to allow larger file uploads
	move_uploaded_file($tmp,"images/$id.$ext");
    }
}?><!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title> Uploaded Files - Now You See Me</title>
	</head>
	<body>
	<p>Thank You</p>	
	</body>
</html>
