<!DOCTYPE html>
<html>
<title>Welcome</title>
<head>
<script>
function RedirectLogout() {
    location.replace("https://hec353.encs.concordia.ca/LogoutSuccess.php")
}
function RedirectAccounts() {
    location.replace("https://hec353.encs.concordia.ca/Accounts.php")
}
function RedirectTransfer() {
    location.replace("https://hec353.encs.concordia.ca/Transfer.php")
}
function RedirectBills() {
    location.replace("https://hec353.encs.concordia.ca/Bills.php")
}
function RedirectInterac() {
    location.replace("https://hec353.encs.concordia.ca/Interac.php")
}
</script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <center>
    <h1>Welcome to Bank of Comp353</h1>
        
    <div id="main">
        <div id="Row1">
            <button class="button" onclick="RedirectAccounts()"> Accounts </button>    
            <button class="button" onclick="RedirectTransfer()"> Transfer Money </button>    
        </div>
        <div name="Row2">
            <button class="button" onclick="RedirectBills()"> Pay Bills </button>
            <button class="button" onclick="RedirectInterac()"> Interac </button>    
        </div>
    </div>    
        
    <div name="Footer">
    
        <button class="button" onclick="RedirectLogout()"> Logout </button>    
    
    </div>
    </center>
</body>
</html>