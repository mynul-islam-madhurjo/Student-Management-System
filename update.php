<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{

  require_once('DBconnect.php');
   // get values form input text and number

   $id = $_POST['id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];

   $query = "UPDATE student SET address='$address',name='$name',email='$email',phone= '$phone' WHERE id = '$id'";
   $result = mysqli_query($conn, $query);

   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($conn);
}

?>

<!DOCTYPE html>

<html>

    <head>

        <title> PHP UPDATE DATA </title>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>

        <form action="update.php" method="post">

            id To Update: <input type="text" name="id" required><br><br>

            name:<input type="text" name="name" required><br><br>

            email:<input type="text" name="email" required><br><br>

            phone:<input type="text" name="phone" required><br><br>

			address:<input type="text" name="address" required><br><br>

            <input type="submit" name="update" value="Update Data">

        </form>

    </body>


</html>
