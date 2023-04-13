<?php
    session_start();
    require 'connectdb.php';
    $id=$_POST['id'];
    $password=$_POST['password'];
    $query="SELECT id, password from customer";
    $result=mysqli_query($conn, $query);
    while ($r=mysqli_fetch_assoc($result))
    {
        if ($id==$r['id'] && $password==$r['password'])
        {
            $_SESSION['id']=$id;
            $_SESSION['password']=$password;
            print_r($_SESSION);
            header('location: index.php?category=all&item=');
        } 
    }
        echo '<script>
        alert("Sai tài khoản/mật khẩu!");
        window.location.replace("login.php");
        </script>';
?>
