<?php
$file_type = $_FILES["file"]["type"]; // Returns MIME type
$allowedTypes = array("image/jpg","image/jpeg", "image/png", "image/gif");   // jpg, jpeg, png and gif files only

if(!in_array($file_type, $allowedTypes)) // check if file type is one of the allowed formats
{
echo "Only jpg files allowed";
}
elseif (file_exists("images/" . $_FILES["file"]["name"])) // check if file already exists
{
echo $_FILES["file"]["name"] . " already exists. ";
}
elseif ($_FILES["file"]["error"] > 0)  // check for other errors
{
echo "Error: " . $_FILES["file"]["error"] . "<br>";
}
else
{
set_time_limit(300);

move_uploaded_file($_FILES["file"]["tmp_name"],"images/" . $_FILES["file"]["name"];
echo "Upload: " . $_FILES["file"]["name"] . "<br>";
echo "Type: " . $_FILES["file"]["type"] . "<br>";
echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
}
?>
