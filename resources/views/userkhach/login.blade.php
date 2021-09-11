<?php


if(isset($_GET["id"]))
    $id = $_GET["id"];
else
    $id = "";
if(isset($_POST["email"]))
    $email = $_POST["email"];
else
    $email="";
if(isset($_POST["password"]))
    $password = $_POST["password"];
else
    $password="";
if(isset($_GET["action"]))
    $action = $_GET["action"];
else
    $action="";


if($action == "logout")

{
    setcookie("logged",$username,time()-60*60);
    header("Location:./edit.blade.php");
    setcookie("loggedd",'admin',time()-60*60);
}

if($email == $email && $email ==  $email)
{
    setcookie("logged",$email,time()+60*60);
};


if(isset($_COOKIE['logged']) && $_COOKIE['logged']==$email)
{
    return view('welcome');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUAN LY DANG NHAP</title>
    <style> 
    .newUser{
    background-color: rgb(239, 239, 239);
    color: #000;
    text-decoration: none;
    padding: 2px;
    min-height: 21px;
    border: 1px solid rgb;
    border-radius: 4px;
    border: 1px solid #767676;
    }
    </style>
</head>
<body>
    <?php
        switch($action){
            case"new":
                ?>
                <h3>Dang Ki</h3>
                <form action="baitapbuoi7.php?action=insert" method="POST">
            <table>
                <tr><td>Tên Đăng Nhâp</td><td><input type="text" name="username"></td></tr>
                <tr><td>Mật Khẩu</td><td><input type="password" name="password"></td></tr>
                <tr><td><input type="submit" value="Dang ki"></td><td><input type="reset" value="Nhập Lại"></td></tr>
            </table>
            </form>
            <?php
            break;



  }
    ?>
    <h3>Đăng Nhập</h3>
    <form action="" method="POST">
        <table>
            <tr><td>Tên Đăng Nhâp</td><td><input type="email" name="email"></td></tr>
            <tr><td>Mật Khẩu</td><td><input type="password" name="password"></td></tr>
            <tr><td><input type="submit" value="Đăng Nhập"></td><td><input type="reset" value="Nhập Lại"></td><td><a class="newUser" href="baitapbuoi7.php?action=new" >Thêm mớii</a></td></tr>
        </table>
      
    </form>
</body>
</html>