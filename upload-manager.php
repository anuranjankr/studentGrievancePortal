<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Check if the form was submitted
session_start();
$name=$_GET['uName'];
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
$sql2 = "select curdate(); ";
$result2 = $con->query($sql2);
$par_c_num_date='';
while($row=mysqli_fetch_array($result2)){
  $par_c_num_date= $row[0];
  $sql_date = "select prev_date from no_of_complains; ";
  $result_date = $con->query($sql_date);
  $prev_date='';
  while($row=mysqli_fetch_array($result_date))
    $prev_date= $row['prev_date'];
  if($par_c_num_date!=$prev_date){
    $sql_up_date1 = "delete from no_of_complains;";
    $result_up_date1 = $con->query($sql_up_date1);
    $sql_up_date2 = "insert into no_of_complains values(1001,'$par_c_num_date');";
    $result_up_date2 = $con->query($sql_up_date2);
    $par_c_num=1001;
  }
}
$par_c_num_date= str_replace("-","",$par_c_num_date);
$complain_num=(int)($par_c_num_date.$par_c_num);



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
}

$subject=$_POST['subject'];
$category=$_POST['category'];
$description=$_POST['description'];

require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 1;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->isHTML(true);
$mail->Username = "pritampal99@gmail.com";
$mail->Password = "99914090";
$mail->setFrom('pritampal99@gmail.com', 'Pritam Pal');
$mail->addAddress($name);
//$mail->AddCC();
$mail->Subject = $subject;
$mail->Body = $complain_num."<br>".$description;
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}


$sql3="INSERT INTO complaint_box (complain_number, user_id, category, subject, description, uploaded_filename)VALUES ('$complain_num', '$name', '$category','$subject', '$description', '$filename')";

if ($con->query($sql3) === TRUE){
  $sql4="UPDATE no_of_complains SET value=$par_c_num;";
  if ($con->query($sql4) === TRUE){
    $_SESSION['user']=$name;
    header('location:studentStartUpPage.php');
  }
}

?>
