<?php

class UserView extends Users{

    function showStudents(){

        require_once("DBconnect.php");
        $sql = "Select * FROM student";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) != 0){
          //here we will print every row that is returned by our query $sql
        while($row= mysqli_fetch_array($result)){
            //here we whave to write some html code,so we we will close php tag
                  echo $row[0];
                  echo $row[1];
                  echo $row[2];
                  echo $row[3];
                  echo $row[4];

          }
    }

}
