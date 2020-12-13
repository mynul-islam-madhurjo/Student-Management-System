<?php

class Users{

  function search(){

    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `student` WHERE CONCAT(`id`, `name`) LIKE '%".$valueToSearch."%'";
        $search_result = filterTable($query);

    }
     else {
        $query = "SELECT * FROM `student`";
        $search_result = filterTable($query);
    }

    // function to connect and execute the query
    function filterTable($query)
    {
        require_once('DBconnect.php');
        $f_result = mysqli_query($conn, $query);
        return $f_result;
    }
    // Ascending Order
    if(isset($_POST['ASC']))
    {
        $asc_query = "SELECT * FROM student ORDER BY ID ASC";
        $result = executeQuery($asc_query);
    }

    // Descending Order
    elseif (isset ($_POST['DESC']))
        {
              $desc_query = "SELECT * FROM student ORDER BY id DESC";
              $result = executeQuery($desc_query);
        }

        // Default Order
     else {
            $default_query = "SELECT * FROM student";
            $result = executeQuery($default_query);
    }


    function executeQuery($query)
    {
        require_once('DBconnect.php');
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function Update(){
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
  }

}
