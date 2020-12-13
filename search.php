<?php

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

?>

<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8"/>
		<meta name= "viewport" content= "width=device-width,initial-scale=1.0"/>
		<meta name= "description" content="About the site"/>
		<meta name= "author" content="Author name"/>
		<meta charset="utf-8"/>
		<meta name= "viewport" content= "width=device-width,initial-scale=1.0"/>
		<meta name= "description" content="About the site"/>
		<meta name= "author" content="Author name"/>
		<title> SEARCH STUDENTS </title>

		<!--core CSS-->
		<link href="css/bootstrap.min.css" rel= "stylesheet"/>
		<link href="css/font-aewsome.min.css" rel= "stylesheet"/>
		<link href="css/animate.min.css" rel= "stylesheet"/>
		<link href="css/style.css" rel= "stylesheet"/>

        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>

        <form action="search.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>

            <table>
                <tr>
                    <th></th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
					          <th>address</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php
				while($row= mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['phone'];?></td>
					          <td><?php echo $row['address'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>

    </body>
</html>
