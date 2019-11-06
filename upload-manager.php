<?php
// Check if the form was submitted
session_start();
$name=$_SESSION['user'];
//echo $_SESSION['user'];
$servername = "localhost";
$username = "root";//username
$password = ""; //password

$con = mysqli_connect($servername, $username, $password);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
else{
}
mysqli_select_db($con, 'sgp');

$sql1 = "select value from no_of_complains; ";
$result1 = $con->query($sql1);
$par_c_num ='';
while($row=mysqli_fetch_array($result1))
  $par_c_num= $row['value'];
$par_c_num+=1;
$sql2 = "select YEAR(curdate()); ";
$result2 = $con->query($sql2);
$par_c_num_year='';
while($row=mysqli_fetch_array($result2))
  $par_c_num_year= $row[0];

$complain_num=(int)($par_c_num_year.$par_c_num.$_SESSION['roll']);



if($_SERVER["REQUEST_METHOD"] == "POST"){
    //function uploading_file(){
      // Check if file was uploaded without errors
    if(isset($_POST['agree1'])){
    if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");

        $filename = $_FILES["fileToUpload"]["name"];
        $filetype = $_FILES["fileToUpload"]["type"];
        $filesize = $_FILES["fileToUpload"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
              $filename = $complain_num.".".$ext;
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
            }
        } else{
            echo "Error: There was a problem uploading your file. Please try again.";
            $filename="none";
        }
    } else{
        echo "Error: " . $_FILES["fileToUpload"]["error"];
    }

  }else{
    $filename="none";
  }
//  }
///////////////
  $subject=$_POST['subject'];
  $category=$_POST['category'];
  $description=$_POST['description'];

  $sql3="INSERT INTO complaint_box (complain_number, user_id, category, subject, description, uploaded_filename)VALUES ('$complain_num', '$name', '$category','$subject', '$description', '$filename')";

  if ($con->query($sql3) === TRUE){
    $sql4="UPDATE no_of_complains SET value=$par_c_num;";
    if ($con->query($sql4) === TRUE){
      //$_SESSION['user']=$name;
      header('location:studentStartUpPage.php');
    }
  }

}
?>
