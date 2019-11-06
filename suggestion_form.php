<?php
session_start();
$_SESSION['user']='anuranjan.cse.1713@iiitbh.ac.in';//$_POST['uName3'];
$_SESSION['roll']=substr($_SESSION['user'],-17,-13);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>IIIT Bhagalpur</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="google-site-verification" content="mYwq4kbzhLz2dI8Vg4EGJodW6puVKaFdzln7U-5aH-A" />

  <link rel="stylesheet" href="css/complain.css">

  <link rel="shortcut icon" href="img/150dpi.png" type="image/x-icon" />
  <script src="js/3.4.1-jquery.min.js"></script>

</head>

<body>

  <form action="upload_suggestion.php" method="post" enctype="multipart/form-data" id = "suggestion-form">
    <label for="sub">Subject</label>
    <input type="text" id="subject" name="subject" placeholder="Text Here" required>


    <label for="category">Category</label>

    <select id="category" name="category">
      <option value="hostel">Hostel</option>
      <option value="mess">Mess</option>
      <option value="academic">Academic</option>
      <option value="sports">Sports</option>
      <option value="others">Others</option>
    </select>

    <label for="description">Suggestion</label>

    <textarea id="description" name="description" placeholder="Write something.." rows="6" required></textarea>
    <br><br>
       <br>
  <input type="submit" value="Submit" style="margin-bottom:10px;" id="suggestion-button">
</form>


</body>

</html>
