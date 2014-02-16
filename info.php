<?php

// Image Server application for Virtualisation subject
// Home page - Show thumbnail views of random photo selection 
// Have multiple uploads enabled
// @author Charisse Gebhart
// @date 2014-02-16
?>

<html>
<head>
  <title>Now You See Me! - Your Photos in the Cloud</title>
  <style>
    body {color:white;background-color:#1A0000;} 
    h1 {font-size:2em;}
    p {font:13px sans-serif;}
    .thumb {position:absolute;left:10px;right:10px;top:35px;overflow:hidden;}
    .upload {position:absolute;left:20px;top:500px;overflow:hidden;} 
  </style>
</head>
<body>
  
  <h1>Now You See Me</h1>
  
  <div class="thumb">
    <p>Please click on a photo to view it</p>
    <img src="images/photo1.jpg" alt="photo1.jpg">
  </div>
 
  <div class="upload">
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
      <label for="file">Upload a New Photo:</label>
      <input type="file" name="file" id="file"><br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </div>
</body>
</html>

