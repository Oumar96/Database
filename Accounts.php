<?php
session_start();
// $_SESSION["id"]=7;
// var_dump($_SESSION);

$name="Empty";
$account_number= "Empty";
$account_type= "Empty";
$balance = "Empty";
$planOption = "Empty";

include 'init.php';

    $client = $_SESSION["id"];

    
    //===================================================================//
    $sqlCommand = "SELECT * FROM Account Join Client ON Client.client_id=Account.client_id WHERE Account.client_id ='{$client}'";

    $result = mysqli_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));

    if (!$result) {
        echo "CLient doesn't exist";
        die;
    }

    $Accounts = [];
    while($row = mysqli_fetch_assoc($result) ){
        $Accounts[$row["account_number"]] = $row;
    }


if(isset($_POST["Account"]) ){

    $account_selected= $Accounts[$_POST["Account"]]  ;
    $name= $account_selected["name"];
    $account_number= $account_selected["account_number"];
    $account_type= $account_selected["type"];
    $balance = $account_selected["balance"];
    $planOption = $account_selected["planOption"];

    //===================================================================//
    $sqlCommand = "SELECT * FROM chargeplans Join Account ON Account.account_number=chargeplans.account_number WHERE chargeplans.account_number =$account_number";

    $result = mysqli_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));

    if (!$result) {
        echo "CLient doesn't exist";
        die;
    }
    $row = mysqli_fetch_assoc($result);
    $charge = $row["charge"];

    //===================================================================//

    $sqlCommand = "SELECT * FROM interestrate Join Account ON Account.account_number=interestrate.account_number WHERE interestrate.account_number =$account_number";

    $result = mysqli_query($myConnection, $sqlCommand) or die(mysqli_error($myConnection));

    if (!$result) {
        echo "CLient doesn't exist";
        die;
    }
    $row = mysqli_fetch_assoc($result);
    $interest = $row["Percentage"];


}

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
        
        
                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="AccountNumber">Account Number:</label>  
                <div class="col-md-5">
                <textarea id="AccountNumber" name="AccountNumber" type="text" placeholder="" class="form-control input-md"><?php echo $account_number; ?></textarea>
                    
                </div>
                </div>
        
                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="AccountType">Account Type:</label>  
                <div class="col-md-5">
                <textarea id="AccountType" name="Account Type" type="text" placeholder="" class="form-control input-md"><?php echo $account_type; ?></textarea>
                    
                </div>
                </div>
        
                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="Balance">Balance:</label>  
                <div class="col-md-5">
                <textarea id="Balance" name="Balance" type="text" placeholder="" class="form-control input-md"><?php echo $balance; ?></textarea>
                    
                </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="planOption">planOption:</label>  
                    <div class="col-md-5">
                        <textarea id="planOption" name="planOption" type="text" placeholder="" class="form-control input-md"><?php echo $planOption; ?></textarea>          
                    </div>
                </div>
        
                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="AccountFee">Charge:</label>  
                <div class="col-md-5">
                <textarea id="AccountFee" name="AccountFee" type="text"  class="form-control input-md"><?php echo $charge; ?></textarea>
                    
                </div>
                </div>
        
                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="InterestRate">Interest Rate:</label>  
                <div class="col-md-5">
                <textarea id="InterestRate" name="InterestRate" type="text" placeholder="4.00%" class="form-control input-md"><?php echo $interest; ?></textarea>
                    
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
