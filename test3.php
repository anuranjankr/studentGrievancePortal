<html>
  <head>
    <title>Home</title>
    <script src="js/3.4.1-jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        var fup= $('#fileToUpload');
        $(fup).attr('disabled','disabled');
        $('#agree1').click(function(){
            if($(fup).attr('disabled')) $(fup).removeAttr('disabled');
            else $(fup).attr('disabled','disabled');
        });
      });

    </script>
  </head>

  <body>
    <form method ="post" action="<?=$_SERVER['PHP_SELF']; ?>">
    <h5><input type="checkbox" id="agree1">&nbsp;Do You want to upload file in your support </h5>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="upload">
    </form>
    <?php
    $localhost = "localhost"; #localhost
    $dbusername = "root"; #username of phpmyadmin
    $dbpassword = "";  #password of phpmyadmin
    $dbname = "sgp";  #database name

    #connection string
    $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);

    if (isset($_POST["submit"]))
     {
         #retrieve file title
            $title = $_SESSION['user']+'.png';
            #file name with a random number so that similar dont get replaced
             $pname = rand(1000,10000)."-".$_FILES["file"]["name"];


        #temporary file name to store file
        $tname = $_FILES["file"]["tmp_name"];
       
         #upload directory path
    $uploads_dir = 'images_up';
        #TO move the uploaded file to specific location
        move_uploaded_file($tname, $uploads_dir.'/'.$pname);

        #sql query to insert into database
        $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";

        if(mysqli_query($conn,$sql)){

        echo "File Sucessfully uploaded";
        }
        else{
            echo "Error";
        }
    }


    ?>
  </body>
</html>
