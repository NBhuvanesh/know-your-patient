<?php
    include 'register/phpFiles/config.php';
    $email = $_REQUEST['email'];
    $hash = $_REQUEST['hash'];
   $check = "SELECT activate FROM doctordetails where email='$email'";
   $checkresult = mysqli_query($conn, $check);
   if (mysqli_num_rows($checkresult) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($checkresult)) {
        if($row["activate"]=="F"){
          $sql = "SELECT hash FROM doctordetails where email='$email'";
          $result = mysqli_query($conn, $sql);
      
          $update = "UPDATE doctordetails
          SET activate = 'T'
          WHERE email = '$email';";
      
      
         
      
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if($row["hash"]==$hash){
          echo "hii ".$email."!!!"." <br>Email Verfied Successfully!!!";
           $result1 = mysqli_query($conn, $update);
          break;
        }
        else{
            echo "Invalid User";
            break;
        }
      }
      } else {
        echo "Invalid User";
      }



      break;
    }
    else{
        echo "Email Aready verified...";
        break;
    }
  }
  } else {
    echo "Invalid User...";
  }




   

mysqli_close($conn);





?>