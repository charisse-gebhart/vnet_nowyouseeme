<?php

/**
* This example requires a folder called 'images' to contain a few
* jpeg files (with the extension .jpg) in order to work.
*
* @author Matt Carter <matt_carter@bond.edu.au>
* @date 2014-01-21
*/

if (!isset($_GET['id']))
       die("You didn't specify an ID");

$id = basename($_GET['id']); // Strip any nasty pathing stuff (e.g. '../' out of the filename to make it safe

if (file_exists(end(glob("images/$id.*")))) {
       header('Content-type: image/jpeg');
       readfile(end(glob("images/$id.*")));
       exit;

}  else {
         die("File not found");
}
