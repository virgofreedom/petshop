<?php
//Customers.php - showa list of customer data
?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
                    <!--header ends here -->
<h1><?=$pageID?></h1>
<ul>
<?php
$sql = "select * from petshop";

//We connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//We extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records
    
    while ($row = mysqli_fetch_assoc($result))
        {
            /*
            <li>
						<img class="my-thumnail" src="img/rottweiler.jpg"/>
						<h2>rottweiler</h2>	
					</li>
            */
            echo '<li>';
            echo '<a href="pet_view.php?id='. $row['id'] . '">';
            echo '<img class="my-thumnail" src="img/'. $row['img_path'] . '"/>';
            echo '<h2>'.$row['name'].'</h2>';
            echo '</a></li>';
        }
    
    
    
}else{//ifrom there are no records
    echo '<p>There are currently no customers</p>';
}

//release web serrver resource
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);
?>
</ul>
<?php include 'includes/footer.php'?>