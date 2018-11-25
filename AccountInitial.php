<?php
session_start();
// $_SESSION["id"]=7;
// var_dump($_SESSION);

$name="Empty";
$account_number= "Empty";
$account_type= "Empty";

// if($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'init.php';

    $client = $_SESSION["id"];

    $sqlCommand = "SELECT * FROM Account Join Client ON Client.client_id=Account.client_id WHERE Account.client_id ='{$client}'";

    $result = mysqli_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));

    if (!$result) {
        echo "CLient doesn't exist";
        die;
    }
    $Accounts = [];
    while($row = mysqli_fetch_assoc($result) ){
        $Accounts[] = $row;
    }

    $name=$Accounts[0]["name"];

    
// }

?>
<!DOCTYPE html>
<html>
    <head>    
        <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
        <meta charset="utf-8">
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body>
        <center>
            <form class="form-horizontal" action="Accounts.php" method="post">
                <fieldset>
            	
                <!-- Form Name -->
                <legend>Account Info</legend>
		
		<!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="AccountName">Name:</label>  
                <div class="col-md-5">
                <textarea id="Name" name="Name" type="text" placeholder="" class="form-control input-md"><?php echo $name; ?></textarea>
                    
                </div>
                </div>

        
                <!-- Select Basic -->
                <div class="form-group">
                <label class="col-md-4 control-label" for="Account">Choose Account</label>
                <div class="col-md-5">
                    <select id="Account" name="Account" class="form-control">
                    <?php
                        foreach($Accounts as $account){
                            echo '<option value="'.$account["account_number"].'">'.$account["type"].' '.$account["account_number"].'</option>';
                        }
                    ?>
                    </select>
                </div>
                </div>
                
		
		<div class="form-group">
                    <input type="submit">
                </div>
		
                
                </fieldset>
                </form>
        </center>
            
    </body>
</html>
