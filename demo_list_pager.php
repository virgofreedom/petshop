<?php
/**
 * demo_list_pager.php demonstrates a list page that paginates data across 
 * multiple pages
 * 
 * This page uses a Pager class which processes a mysqli SQL statement 
 * and spans records across multiple pages. 
 * 
 * @package nmPager
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 3.2 2015/11/24
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0 v. 3.0
 * @see MyAutoLoader.php
 * @see Pager.php 
 * @todo none
 */

require 'includes/config.php'; #provides configuration, pathing, error handling, db credentials 
 
# SQL statement
$sql = "select * from petshop";

#Fills <title> tag  
$title = 'Customer List/View/Pager';

# END CONFIG AREA ---------------------------------------------------------- 

include 'includes/header.php'; #header must appear before any HTML is printed by PHP
?>
<h3 align="center"><?=THIS_PAGE;?></h3>

<?php
#reference images for pager
$prev = '<img src="' . VIRTUAL_PATH . 'images/arrow_prev.gif" border="0" />';
$next = '<img src="' . VIRTUAL_PATH . 'images/arrow_next.gif" border="0" />';

#Create a connection
# connection comes first in mysqli (improved) function
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));


# Create instance of new 'pager' class
$myPager = new Pager(2,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0)
{#records exist - process
	if($myPager->showTotal()==1){$itemz = "customer";}else{$itemz = "customers";}  //deal with plural
    //echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';
	while($row = mysqli_fetch_assoc($result))
	{# process each row
        echo '<li>';
            echo '<a href="pet_view.php?id='. $row['id'] . '">';
            echo '<img class="my-thumnail" src="img/'. $row['img_path'] . '"/>';
            echo '<h2>'.$row['name'].'</h2>';
            echo '</a></li>';
            
         echo '<p align="center">
            <a href="' . VIRTUAL_PATH . 'customer_view.php?id=' . (int)$row['CustomerID'] . '">' . dbOut($row['FirstName']) . '</a>
            </p>';
	}
	//the showNAV() method defaults to a div, which blows up in our design
    //echo $myPager->showNAV();//show pager if enough records 
    
    //the version below adds the optional bookends to remove the div design problem
    echo $myPager->showNAV('<p align="center">','</p>');
}else{#no records
    echo "<p align=center>What! No Customers?  There must be a mistake!!</p>";	
}
@mysqli_free_result($result);
@mysqli_close($iConn);

include 'includes/footer.php';
?>
