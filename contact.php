<?php
//daily.php
?>
<?php include 'includes/config.php';?>

<?php include 'includes/header.php';?>
                    <!--header ends here -->
    
            <h1><?=$pageID?></h1>
	<?php
    if(isset($_POST['Submit']))
        {//if data, process it!
            /*
            echo '<pre>';
            var_dump($_POST);
            echo '</pre>';*/
            $to = 'rneak001@seattlecentral.edu';    
            $message = process_post();
            $subject = 'Contact Form from retro site';
            safeEmail($to, $subject, $message);
            echo '
            Thank you for contact us!
            ';
        }else{//no data, show form
            echo '
            <form method="POST" action="">
            Name: <input type="text" name="Name" required="required" /><br/>
            Email: <input type="email" name="Email" required="required" /><br/>
            Comments: <br/><textarea name="Comments"></textarea><br/>
            <input type="submit" value="Send" name="Submit" />
            </form>
            
            
            ';
        }
    ?>
    
<?php include 'includes/footer.php'?>
