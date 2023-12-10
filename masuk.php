<!DOCTYPE html>
<html>
<head>
    <title>Baron</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    
</head>
<body class="masuk">
    <div class="container" id="main">
        <div class="sign-up">
            <form action="register.php" method="POST">
            <h1>Create Account</h1>
                <input type="text" name="nama" placeholder="Name" required="nama_user">
                <input type="text" name="email" placeholder="Email" required="email">
                <input type="password" name="password" placeholder="Password" required="password">
                <button type="submit"  name="register">Sign Up</button>
            </form>
        </div>
        <div class="sign-in" id="main">
            <form action="login.php" method="POST">
                <h1>Sign in</h1>
                        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan']=="gagal"){
                    echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
                }
            }
            ?>
                <input type="text" name="nama" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <a href="#">Forget Password</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-left">
                    <h1>Welcome!!!</h1>
                    <p>If you already have an account, please log in to be able to view the barbershop</p>
                    <button id="signIn">Sign In</button>
                </div>
                <div class="overlay-right">
                    <h1>Welcome!!!</h1>
                    <p>If you don't have an account yet, please register to be able to view the barbershop</p>
                    <button id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const main = document.getElementById('main');

        signUpButton.addEventListener('click', () =>{
            main.classList.add("right-panel-active");
        });
        signInButton.addEventListener('click', () =>{
            main.classList.remove("right-panel-active");
        });
    </script>
    
</body>
</html>