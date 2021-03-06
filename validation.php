<?php require_once 'utils.php';
session_start();
if (isset($_POST['validation'])){
    $auth_code = addslashes($_POST['authcode']);
    if($auth_code == $_SESSION['auth_code'])
    {
        $conn = connect_db();
        $s_email = $_SESSION['email'];
        $sql = " select * from user where email = '$s_email' ";
        $query = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($query);

        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['facebook_id'] = $user['facebook_id'];
        $_SESSION['level'] = $user['level'];

        if($_SESSION['level'] == 1){            
            header("location: admin.php");
        }
        else if($_SESSION['level'] == 0){
            header("location: user.php");
        }
    }
    else {
        header("location: validation.php");
    }
}

?>
<html>
    <head>
        <title>Authentication</title>
        <style>
body{
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    font-family: sans-serif;
}
header img{
    left: 50%;
    transform: translate(-50%);
    top: 25;
    position: absolute;
}
h1{
    text-align: center;
    display: block;
    margin: 4em 0 1em;
    font-weight: 100;
    font-size: 24px;
}
#loginbox{
    position: absolute;
    left: 50%;
    transform: translate(-50%);
    width: 300px;
    height: 230px;
    border: 1px solid #d8dee2;
    border-radius: 3%;
    padding: 20px;
    font-size: 15px;
    background-color: #fff;
    font-weight: 600;
}
input[type="text"], input[type="password"]{
    width: 100%;
    height: 34px;
    border-radius: 0.25em;
    border: 1px solid #d1d5da;
}
input[type="text"]:focus{
    box-shadow: 0 0 3pt 2pt #B0E0E6;
    box-shadow: 0 0 0 2pt #B0E0E6;
}
input[type="password"]:focus{
    box-shadow: 0 0 3pt 2pt #B0E0E6;
    box-shadow: 0 0 0 2pt #B0E0E6;
}
label p a{
    float: right;
    font-weight: 200;
    text-decoration: none;
}
#login{
    margin-top: 5px;
    margin-bottom: 15px;
    display: block;
}
#password{
    margin-top: 5px;
    margin-bottom: 15px;
    display: block;  
}
input[type="submit"]{
    width: 100%;
    border: none;
    background-color: 28a745;
    background-image: linear-gradient(-180deg, #009879 0%, #1abc9c 90%);;
    color: #fff;
    display: block;
    margin-top: 20px;
    font-size: 14px;
    font-weight: 600;
    height: 34px;
    border-radius: 0.25em;
}
#new{
    width: 308px;
    height: 53px;
    position: absolute;
    border: 1px solid #d8dee2;
    background-color: transparent;
    left: 50%;
    top: 120%;
    transform: translate(-50%, -50%);
    margin-top: 16px;
    margin-bottom: 10px;
    padding: 5px 20px;
    text-align: center;
    border-radius: 3%;
    font-weight: 100;
}
#new a{
    text-decoration: none;
}
#new a:hover{
    text-decoration: underline;
}
ul li{
    display: inline;
    list-style: none;
}
#list{
    width: 308px;
    height: 53px;
    position: absolute;
    top: 135%;
    width: 100%;
    left: 50%;
    transform: translate(-50%);
    margin-top: 16px;
    margin-bottom: 10px;
    padding: 5px 20px;
    text-align: left;
}
li a{
    text-decoration: none;
}
li a:hover{
    text-decoration: underline;
}
.m3{
    margin-right: 10px;
}
#contact{
    text-decoration: none;
    color: #586069;
}
#contact:hover{
    text-decoration: underline;
    color: #0000EE;
}
        </style>
    </head>
    <body>
        <header>
            <h1>Authentication</h1>
        </header>
        <form method="post" action="validation.php">
		<div id="loginbox">
            <label id="authcode">
                <p>Enter your code</p>
                <input required="true" type="text" id="authcode" name="authcode">
            </label>
            <input type="submit" name="validation" value="Submit"><br/>
            <p>Can't receive a code? <a href="authentication.php">Try again</a></p>
        </div>  
		</form>
    </body>
</html>
