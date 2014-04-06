<?php
/**
* Image Server application for Virtualisation subject
* Home page - Show thumbnail views of random photo selection 
* Have multiple uploads enabled
* @author Charisse Gebhart
* @date 2014-02-16
*/

header('Content-type: text/html; charset=utf-8');
$fileTotal = count(glob("images/*")); // counts total number of image files in the dir so a random selection can be chosen from all images
$imgArray = glob("images/*");
shuffle($imgArray);
$ShuffleIndex=0;
$ThisPhoto=0;

?>

<html lang="en">
     <head>
          <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
          <title>Now You See Me! - Your Photos in the Cloud</title>
          <link rel="stylesheet" type="text/css" href="nysm.css">
	  <script src="https://code.jquery.com/jquery-git1.min.js"></script>
	  <script>
	     $(function() {
		 // Every time a file input box gets a value (i.e. a file has been attached)
	  	 $('#uploads').on('change', 'input[type=file]', function() {
			$(this).after('<br/><input type="file" name="file[]"/>');
     		 });
	     });
     	  </script>
     </head>
     <body>
  
         <h1>Now You See Me</h1>
  
  <div class="grid">
	<table>
		<? for($row = 0; $row < 3; $row++) { ?>
    		<tr>
			<? for ($col = 0; $col < 4; $col++) { ?>
			<td>
				<? 	$ThisPhoto = $ShuffleIndex++; 
					echo "<a href='view.php?id=" . 
						substr($imgArray[$ThisPhoto],7,strlen($imgArray[$ThisPhoto])-11) . 
						"'><img src='" . 
						$imgArray[$ThisPhoto] . 
						"' style='width:150px;height:150px;' alt='" . 
						substr($imgArray[$ThisPhoto],7,strlen($imgArray[$ThisPhoto])-11) . 
						"'></a>"; ?>
			</td>
			<? } ?>
		</tr>
		<? } ?>
	</table>

  </div> <!--end grid-->

  <div class="upload">
    <form id="uploads" action="upload_file.php" method="post" enctype="multipart/form-data">
      <label for="file">Upload a New Photo:</label><br>
      <input type="file" name="file[]" id="file"><br>
      <input type="submit" name="submit" value="Upload">
    </form>
  </div>
</body>
</html>

