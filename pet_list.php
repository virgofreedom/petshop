<?php
//Customers.php - showa list of customer data
?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
                    <!--header ends here -->
<h1><?=$pageID?></h1>

<?php
#reference images for pager
$prev = '<img src="' . VIRTUAL_PATH . 'images/arrow_prev.gif" border="0" />';
$next = '<img src="' . VIRTUAL_PATH . 'images/arrow_next.gif" border="0" />';

$sql = "select * from petshop";

//We connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

# Create instance of new 'pager' class
$myPager = new Pager(10,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

//We extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records, #records exist - process
    echo '<ul>';
    if($myPager->showTotal()==1){$itemz = "pet";}else{$itemz = "pets";}  //deal with plural
    while ($row = mysqli_fetch_assoc($result))
        {# process each row

            echo '<li>';
            echo '<a href="pet_view.php?id='. $row['id'] . '">';
            echo '<img class="my-thumnail" src="img/'. $row['img_path'] . '"/>';
            echo '<h2>'.$row['name'].'</h2>';
            echo '</a></li>';
          /* echo '<p align="center">
            <a href="' . VIRTUAL_PATH . 'pet_view.php?id=' . (int)$row['CustomerID'] . '">' . dbOut($row['FirstName']) . '</a>
            </p>';*/
        }
  echo '</ul></div>';
     echo $myPager->showNAV('<p align="center">','</p>');
}else{#no records
    echo "<p align=center>What! No Pets?  There must be a mistake!!</p>";
    

}

//release web serrver resource
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);
?>

<?php include 'includes/footer.php'?>