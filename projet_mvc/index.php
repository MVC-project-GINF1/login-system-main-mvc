<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css" rel='stylesheet'>
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>

<body>
 
 
    <div class="main">
    
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                <div class="signin-image">
                        <figure>
                            <img src="img/signin-image.jpg" alt="sing up image" ezimgfmt="rs rscb2 src ng ngcb2">
                        </figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                        <a href="forget.php" class="signup-image-link">Forget Password</a>
                    </div>
                    <div class="signin-form">
                        <h1 class="form-title">WELCOME</h1>
                        <form action="./controle/verification.php" method="POST" class="register-form" id="login-form">

                            <div class="form_group">
                                <label><b>user name :</b>
                                </label>
                                <input type="text" placeholder="enter the user name" name='user_name' autocomplete="on" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user'] ?>" required>
                            </div>
                            <div class="form_group">
                                <label><b>password :</b>
                                </label>
                                <input type="password" placeholder="enter the password" name='password' value="<?php if(isset($_SESSION['pass'])) echo $_SESSION['pass'] ?>" required>
                            </div>
                                <input type="submit" id="signin" name='enter' class="form-submit" value="LOGIN">
                                
                                <div class="text-center">Don't have an account?<a href="vue/signup.html" id="signin" class="form-submit1">SIGN-UP</a></div>
                        </form>
                    </div>
                </div>

                
</body>
<?php include_once('controle/footer.php'); ?>
</html>