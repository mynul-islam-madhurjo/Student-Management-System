<?php


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

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
		<meta name= "viewport" content= "width=device-width,initial-scale=1.0"/>
		<meta name= "description" content="About the site"/>
		<meta name= "author" content="Author name"/>
		<title> THE TITLE </title>

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

        <form action="sorting.php" method="post">

            <input type="submit" name="ASC" value="Ascending"><br><br>
            <input type="submit" name="DESC" value="Descending"><br><br>

            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
					<th>address</th>
                </tr>
                <!-- populate table from mysql database -->
                <?php
				while($row= mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row[0];?></td>
                    <td><?php echo $row[1];?></td>
                    <td><?php echo $row[2];?></td>
                    <td><?php echo $row[3];?></td>
					<td><?php echo $row[4];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>

    </body>
</html>
