<?php
/**
* Image Server application for Virtualisation subject
* Home page - Show thumbnail views of random photo selection 
* Have multiple uploads enabled
* @author Charisse Gebhart
* @date 2014-02-16
*/

$fileTotal = count(glob("images/*")); // counts total number of image files in the dir so a random selection can be chosen from all images
$imgArray = glob("images/*");

?><!DOCTYPE html>

<html lang="en">
     <head>
          <meta charset="UTF-8">
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
  
  <div class="wrap">
    <div class="box">
      <div class="boxInner">
        <?php echo "<a href='view.php?id="; $random = rand(1,$fileTotal-1); echo substr($imgArray[$random],7,strlen($imgArray[$random])-11) .
                   "'><img src='" . $imgArray[$random] . "' alt='" . $imgArray[$random] . "'></a>"; ?>
        <div class="titleBox"><?php echo substr($imgArray[$random],7,strlen($imgArray[$random])-11); ?></div>
      </div>  
    </div>
      <div class="box">
      <div class="boxInner">
        <?php echo "<a href='view.php?id="; $random = rand(1,$fileTotal-1); echo substr($imgArray[$random],7,strlen($imgArray[$random])-11) .
                   "'><img src='" . $imgArray[$random] . "' alt='" . $imgArray[$random] . "'></a>"; ?>
        <div class="titleBox"><?php echo substr($imgArray[$random],7,strlen($imgArray[$random])-11); ?></div>
      </div>  
    </div>
    <div class="box">
      <div class="boxInner">
        <?php echo "<a href='view.php?id="; $random = rand(1,$fileTotal-1); echo substr($imgArray[$random],7,strlen($imgArray[$random])-11) .
                   "'><img src='" . $imgArray[$random] . "' alt='" . $imgArray[$random] . "'></a>"; ?>
        <div class="titleBox"><?php echo substr($imgArray[$random],7,strlen($imgArray[$random])-11); ?></div>
      </div>  
    </div>
    <div class="box">
      <div class="boxInner">
        <?php echo "<a href='view.php?id="; $random = rand(1,$fileTotal-1); echo substr($imgArray[$random],7,strlen($imgArray[$random])-11) .
                   "'><img src='" . $imgArray[$random] . "' alt='" . $imgArray[$random] . "'></a>"; ?>
        <div class="titleBox"><?php echo substr($imgArray[$random],7,strlen($imgArray[$random])-11); ?></div>
      </div>  
    </div>
    <div class="box">
      <div class="boxInner">
        <?php echo "<a href='view.php?id="; $random = rand(1,$fileTotal-1); echo substr($imgArray[$random],7,strlen($imgArray[$random])-11) .
                   "'><img src='" . $imgArray[$random] . "' alt='" . $imgArray[$random] . "'></a>"; ?>
        <div class="titleBox"><?php echo substr($imgArray[$random],7,strlen($imgArray[$random])-11); ?></div>
      </div>  
    </div>
    <div class="box">
      <div class="boxInner">
        <?php echo "<a href='view.php?id="; $random = rand(1,$fileTotal-1); echo substr($imgArray[$random],7,strlen($imgArray[$random])-11) .
                   "'><img src='" . $imgArray[$random] . "' alt='" . $imgArray[$random] . "'></a>"; ?>
        <div class="titleBox"><?php echo substr($imgArray[$random],7,strlen($imgArray[$random])-11); ?></div>
      </div>  
    </div>
    <div class="box">
      <div class="boxInner">
        <?php echo "<a href='view.php?id="; $random = rand(1,$fileTotal-1); echo substr($imgArray[$random],7,strlen($imgArray[$random])-11) .
                   "'><img src='" . $imgArray[$random] . "' alt='" . $imgArray[$random] . "'></a>"; ?>
        <div class="titleBox"><?php echo substr($imgArray[$random],7,strlen($imgArray[$random])-11); ?></div>
      </div>  
    </div>
    <div class="box">
      <div class="boxInner">
        <?php echo "<a href='view.php?id="; $random = rand(1,$fileTotal-1); echo substr($imgArray[$random],7,strlen($imgArray[$random])-11) .
                   "'><img src='" . $imgArray[$random] . "' alt='" . $imgArray[$random] . "'></a>"; ?>
        <div class="titleBox"><?php echo substr($imgArray[$random],7,strlen($imgArray[$random])-11); ?></div>
      </div>  
    </div>
  
  </div> <!--end wrap-->

  <div class="upload">
    <form id="uploads" action="upload_file.php" method="post" enctype="multipart/form-data">
      <label for="file">Upload a New Photo:</label>
      <input type="file" name="file[]" id="file"><br>
     <!-- <label>Enter a Caption<input type="text" name="title" id="title"></label><br>-->
      <input type="submit" name="submit" value="Upload">
    </form>
  </div>
</body>
</html>

