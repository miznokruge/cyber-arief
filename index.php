<?php
session_Start();
include"koneksi.php";
if ($_SESSION['status_login'] == 'sudah_login') {
    header("location:admin/index.php");
}
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Sign-Up/Login Form</title>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="ajax/normalize.min.css">  
        <link rel="stylesheet" href="css/style.css">  
    </head>
    <body>
        <div class="form">      
            <ul class="tab-group">
                <li class="tab"><a href="#login">Log In</a></li>
            </ul>
            <div class="tab-content">
                <div id="login">   
                    <h1>Please Log in!</h1>
                    <form action="" method="post" name="login" id="form-login">
                        <div class="field-wrap">
                            <label>
                                Username<span class="req">*</span>
                            </label>
                            <input class="form-control" name="username" type="text" required="" autocomplete="off"/>
                        </div>          
                        <div class="field-wrap">
                            <label>
                                Password<span class="req">*</span>
                            </label>
                            <input name="password" type="password" required="" autocomplete="off"/>
                        </div>              
                        <button type="submit" value="login" name="login" class="button button-block"/>Log In</button>          
                    </form>
                </div>
                <?php
                // membuat login

                $username = @$_POST['username'];
                $password = @$_POST['password'];
                $login = @$_POST['login'];
                if ($login) {
                    if ($username == "" || $password == "") {
                        ?>  <script type="text/javascript">alert("Username / Password tidak boleh kosong ");
                        </script> <?php
                    }else {
                        $sql = $koneksi->query("select * from admin where username = '$username' and password ='$password'");

                        $cek = $sql->fetch_assoc();
                        if ($cek > 0) {
                            // membuat session
                            $_SESSION ['status_login'] = "sudah_login";
                            if ($cek['level'] == "admin") {
                                $_SESSION ['admin'] == $cek ['id_admin'];
                                header("location:admin/index.php");
                            } elseif ($cek ['level'] == "user") {
                                $_SESSION ['user'] == $cek['id_admin'];
                                header("location:User/index.php");
                            }
                        } else {
                            ?><script type="text/javascript">alert("data Tidak Ada");</script><?php
                        }
                    }
                }
                ?>


            </div><!-- tab-content --> 
        </div> <!-- /form -->
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>

    </body>
</html>
