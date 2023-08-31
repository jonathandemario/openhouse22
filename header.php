<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1.0">
    <link rel="icon" type="image/x-icon" href="asset\faviconOH.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
     <script src="https://www.google.com/recaptcha/api.js?render=6LfyPOQgAAAAAFmUbJlE2GuiQcxgbjVPgVgA2LdJ"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<!-- LOADPAGE -->
<style>
    *{
        margin: 0;
        padding: 0;
    }
    
    #loader {
        display: block;
        position:fixed;
        z-index: 5;
        width: 100%;
        height: 100%;
        background-color: rgba(216,184,143,255);
    }

    #loader2 {
        display: block;
        position: fixed;
        z-index: 5;
        width: 100%;
        height: 100%;
        
        background-color: transparent;
    }

    #loader3 {
        display: block;
        position:fixed;
        z-index: 5;
        width: 100%;
        height: 100%;
        background-color: transparent;
    }

    #loader3 img {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        margin: auto;
        width: 20%;
        bottom: 50%;
        animation: zoom-in-out 1s infinite;
    }

    #loader img {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        margin: auto;
        width: 20%;
        bottom: 50%;
        animation: zoom-in-out 1s infinite;
    }

    #loader3 img#btfly-left {
        animation: fly-right 5s;
        animation-delay: 3s;
        visibility: hidden;
    }

    #loader3 img#btfly-right {
        animation: fly-left 5s;
        animation-delay: 3s;
        visibility: hidden;
    }

    #loader2 #r-left{
        position:absolute;
        z-index: 5;
        left: 0;
        bottom: -50%;
        background-color: rgba(73,16,70,255);
        border-top-right-radius: 50px;
        animation: overlay 7.1s forwards;
        animation-delay: 2.69s;
    }

    #loader2 #r-right{
        position:absolute;
        z-index: 5;
        right: 0;
        bottom: -50%;
        background-color: rgba(73,16,70,255);
        border-top-left-radius: 50px;
        animation: overlay 7.1s forwards;
        animation-delay: 2.69s;
    }

    #loader2 #logo {
        position: absolute;
        z-index: 5;
        top: 50%;
        left: 0;
        right: 0;
        margin: auto;
        width: 0;
        bottom: 50%;
        animation: show 0.5s forwards, zoom-in-out 1s infinite;
        animation-delay:4.7s;
    }

    @media screen and (max-width: 1200px) {
        #loader img {
            width: 40%;
        }

        #loader3 img#btfly-left {
            width: 20%;
            top: 80%;
            bottom: 0;
        }

        #loader3 img#btfly-right {
            width: 20%;
            top: 80%;
            bottom: 0;
        }

        #loader2 #logo {
            width: 0;
        }

        #loader2 #r-left {
            animation: overlay 7.8s forwards;
            animation-delay: 2.56s;
        }

        #loader2 #r-right {
            animation: overlay 7.8s forwards;
            animation-delay: 2.56s;
        }

        @keyframes overlay {
            from {
                width: 0%;
                height: 0%;
            }
            to {
                width: 100%;
                height: 320%;
            }
        }

        @keyframes fly-left {
            from {
                transition-duration: 0.3s;
                top: 90%;
                bottom: 0; 
                right: -80%;
            }
            to {
                right: 50%;
                top: -150%;
                visibility: hidden;
            }
        }

        @keyframes fly-right {
            from {
                transition: 0.3s;
                top: 90%;
                bottom: 0;
                right: 100%;
            }
            to {
                left: 60%;
                top: -150%;
                visibility: hidden;
            }
        }

        @keyframes show {
            from {
                width: 0%;
            }
            to {
                width: 40%;
            }
        }
    }

    @media screen and (max-width: 600px) {
        #loader img {
            width: 50%;
        }

        #loader3 img#btfly-left {
            width: 20.3%;
        }

        #loader3 img#btfly-right {
            width: 20.3%;
        }

        #loader2 #logo {
            width: 0;
        }

        #loader2 #r-left {
            animation: overlay 7.89s forwards;
            animation-delay: 2.5s;
        }

        #loader2 #r-right {
            animation: overlay 7.89s forwards;
            animation-delay: 2.5s;
        }

        @keyframes overlay {
            from {
                width: 0%;
                height: 0%;
            }
            to {
                width: 100%;
                height: 310%;
            }
        }

        @keyframes show {
            from {
                width: 0%;
            }
            to {
                width: 50%;
            }
        }
    }

    @keyframes zoom-in-out {
        0% {
            transform: scale(0.9);
        }
        50% {
            transform: scale(1);
        }
        100% {
            transform: scale(0.9);
        }
    }

    @keyframes fly-left {
        from {
            top: 150%;
            bottom: 0;
            right: -80%;
            visibility: visible;
        }
        to {
            right: 50%;
            top: -250%;
            visibility: hidden;
        }
    }

    @keyframes fly-right {
        from {
            top: 150%;
            bottom: 0;
            right: 100%;
            visibility: visible;
        }
        to {
            left: 60%;
            top: -250%;
            visibility: hidden;
        }
    }

    
    @media screen and (min-width: 1201px) {
        @keyframes show {
            from {
                width: 0%;
            }
            to {
                width: 20%;
            }
        }   

        @keyframes overlay {
            from {
                width: 0%;
                height: 0%;
            }
            to {
                width: 100%;
                height: 335%;
            }
        }
    }

    body {
        display: block;
        overflow: hidden;
    }

    @keyframes fadeout {
        100% {
            opacity: 0;
            visibility: hidden;
        }
    }

    .loadpage {
        animation: fadeout 0.5s forwards;
        animation-delay: 6s;
    }
</style>
<body>
    <div class="loadpage">
        <div id="loader">
            <img src="asset\LOGO OH 1.png" alt>
        </div>
        <div id="loader2">
            <div id="r-left"></div>
            <div id="r-right"></div>
            <img id="logo" src="asset\LOGO OH 2.png" alt>
        </div>
        <div id="loader3">
            <img id="btfly-left" src="asset\butterfly left.png" alt>
            <img id="btfly-right" src="asset\butterfly right.png" alt>
        </div>
    </div>
</body>

<!-- NAVBAR -->
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
        /* -webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}input,textarea{-webkit-user-select:text;-khtml-user-select:text;-moz-user-select:text;-ms-user-select:text;user-select:text}img{-webkit-user-drag:none;-khtml-user-drag:none;-moz-user-drag:none;-o-user-drag:none} */
    }

    /* html {
      scroll-behavior: smooth;
    } */
    

    .content {
        max-width: 2000px;
        margin: auto;
        padding: 0px 30px;
    }

    .navbar {
        position: fixed !important;
        z-index: 6000;
        width: 100%;
        padding: -20px 0;

        transition: 0.3s;
        display: none;
        opacity: 0;
        /* background: red; */
    }

    .logo {
        display: inline-flexbox;
        float: left;
    }

    .logo img {
        width: 65px;
    }

    .nav-menu li a {
        color: white;
        font-size: 18px;
        font-weight: 500;
        margin-left: 56px;
        text-decoration: none;
        transition: 0.3s;
    }

    .nav-menu li a:hover {
        color: rgba(73,16,70,255);
    }

    .navbar .content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .nav-menu {
        margin-top: 10px;
        margin-right: 25px;
        padding-top: 15px;
        padding-right: 50px;
        float: right;
        background-color: rgba(106,115,62,255);
        border-radius: 25px;
        /* width: 500px; */
        height: 50px;
    }

    .navbar .nav-menu {
        display: inline-flex;
    }

    .nav-menu li {
        margin-top: 5px;
        list-style: none;
    }

    .icon {
        color: white;
        font-size: 22px;
        cursor: pointer;
        display: none;
    }

    .icon:hover {
        color: rgba(73,16,70,255);
    }

    .icons {
        margin-top: 10px;
        margin-right: 35px;
        padding-top: 18px;
        padding-right: 48px;
        float: right;
        background-color: rgba(106,115,62,255);
        border-radius: 10px;
        width: 0px;
        height: 50px;
        display: none;
    }

    .icon.menu-btn {
        margin-top: -5px;
        margin-left: 15px;
    }

    .icon.cancel-btn {
        position: absolute;
        right: 30px;
        top: 20px;

    }

     /* POPUP LOGIN */

    .popup {
            position: fixed;
            top: -150%;
            left: 50%;
            z-index: 5;
            opacity: 0;
            transform: translate(-50%, -50%) scale(1.25);
            width: 300px;
            padding: 20px 30px;
            background: #fff;
            box-shadow: 2px 2px 5px 5px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            transition: top 0ms ease-in-out 0ms,
                        opacity 200ms ease-in-out 0ms,
                        tranform 200ms ease-in-out 0ms;
        }

        .popup.active {
            top: 50%;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);   
            transition: top 0ms ease-in-out 0ms,
                        opacity 200ms ease-in-out 0ms,
                        tranform 200ms ease-in-out 0ms;  
        }

        .popup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 15px;
            height: 15px;
            background: #888;
            color: #eee;
            text-align: center;
            line-height: 15px;
            border-radius: 15px;
            cursor: pointer;
        }
        
        .popup .form h2 {
            text-align: center;
            color: #222;
            margin: 10px 0px 20px;
            font-size: 25px;
        }

        .popup .form .form-element {
            margin: 15px 0px;
        }

        .popup .form.form-element label {
            font-size: 14px;
            color: #222; 
        }

        .popup .form .form-element input[type="text"],
        .popup .form .form-element input[type="password"] {
            margin-top: 5px;
            display: block;
            width: 100%;
            padding: 10px;
            outline: none;
            border: 1px solid #aaa;
            border-radius:  5px;
        }

        .popup .form .form-element input[type="checkbox"] {
            margin-right: 5px;

        }

        .popup .form .form-element button {
            width: 100%; 
            height: 40px;
            border: none;
            outline: none;
            font-size: 15px;
            background: #222;
            color: #f5f5f5;
            border-radius: 10px;
            cursor: pointer;
        }

        /* END POPUP */

    @media (max-width: 868px) {
        body.disabledScroll {
            overflow: hidden;
        }

        .icons {
            display: block;
        }

        .icon {
            display: block;
        }

        .icon.hide {
            display: none;
        }

        .icons.hide {
            display: none;
            transition: 0.3s;
        }

        .navbar .nav-menu {
            position: fixed;
            top: 0;
            left: -200%;
            height: 100vh;
            width: 100%;
            background: rgba(106,115,62,255);
            max-width: 400px;
            display: block;
            padding: 40px 0;
            text-align: center;
            transition: 0.3s;
        }

        .navbar .nav-menu.active {
            left: 0;

        }

        .navbar .nav-menu li {
            margin-top: 45px;
        }

        .nav-menu li a {
            font-size: 20px;
            font-weight: 600;
        }
        .nav-menu li a:hover {
            font-size: 24px;
            font-weight: 700;
        }

        .nav-menu {
            margin-top: 0;
            margin-right: 25px;
            padding-top: 15px;
            padding-right: 50px;
            float: right;
            background-color: rgba(106,115,62,255);
            border-radius: 0;
            width: 500px;
            height: 50px;
            opacity: 0.75;
        }
    }

</style>
<body>
    <nav class="navbar" id="content">
        <div class="content">
            <div class="logo">
                <a href="https://www.instagram.com/ohpetra2022/" target="_blank">
                    <img src="asset\LOGO OH COLORED.png" alt="">
                    <!-- OH PETRA 2022 -->
                </a>
            </div>
            <ul class="nav-menu">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li class="nav-item"><a class="nav-link" href="home.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="ukmlk/lk.php">LK</a></li>
                <li class="nav-item"><a class="nav-link" href="ukmlk/ukm.php">UKM</a></li>

            <?php if(isset($_SESSION["login"])) :?>
                <li class="nav-item"><a class="nav-link" href="#" id="pretest-btn">PRETEST</a></li>
                <li class="nav-item"><a class="nav-link" href="#" id="postest-btn">POSTEST</a></li>
            <?php endif; ?> 

            <?php if(isset($_SESSION["login"])) :?>
                <li class="nav-item" ><a class="nav-link" href="phps/logout.php">LOGOUT</a></li>
            <?php else :?>
                <li class="nav-item" id="login-btn"><a class="nav-link" href="#">LOGIN</a></li>
            <?php endif;?>
            </ul>
            <ul class="icons">
                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </ul>
        </div>
    </nav>

    <!-- popup login -->
    <div class="popup">
        <div class="close-btn">
            &times;
        </div>
        <form action="phps/login.php" method="POST">
        <div class="form">
            <h2>Login</h2>
            <div class="form-element">
                <label for="nrp">NRP</label>
                <input type="text" name="nrp" id="nrp" placeholder="Enter NRP" value="<?php if(isset($_SESSION['nrp'])) { echo $_SESSION['nrp']; } ?>">
            </div>
            <div class="form-element">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" value="<?php if(isset($_SESSION['pass'])) { echo $_SESSION['pass']; } ?>">
            </div>
		
            <!-- <div class="form-element">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>

            </div> -->
            <div class="form-element">
		<input type="hidden" name="token" id="token">
               <button type="submit" name="submit">Login</button>
		
            </div>
        </div>
        </form>
    </div>

    <!-- end popup login -->

    <?php 
if(isset($_GET['status'])) {
    if($_GET['status'] == 1) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'NRP/Password salah',
          })</script>";
    } else if($_GET['status'] == 2) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
          })</script>";
    } else if($_GET['status'] == 3) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
          })</script>";
    }

}
?>

    <script>
        const body = document.querySelector("body");
        const navbar = document.querySelector(".navbar");
        const menu = document.querySelector(".nav-menu");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");
        const btnBorder = document.querySelector(".icons");

        menuBtn.onclick = ()=>{
            menu.classList.add("active");
            menuBtn.classList.add("hide");
            btnBorder.classList.add("hide");
            body.classList.add("disabledScroll");
            body.style.overflow = "hidden";
        }
        cancelBtn.onclick = ()=>{
            menu.classList.remove("active");
            menuBtn.classList.remove("hide");
            btnBorder.classList.remove("hide");
            body.classList.remove("disabledScroll");
            body.style.overflow = "visible";
        }

        window.onscroll = ()=>{
            this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }

        document.getElementById("login-btn").addEventListener("click", function() {
            document.querySelector(".popup").classList.add("active");
            menu.classList.remove("active");
            body.style.overflow = "hidden";
        });

        document.querySelector(".popup .close-btn").addEventListener("click", function() {
            document.querySelector(".popup").classList.remove("active");
            menuBtn.classList.remove("hide");
            btnBorder.classList.remove("hide");
            menu.classList.remove("active");
            body.style.overflow = "visible";
        });


   grecaptcha.ready(function() {
      grecaptcha.execute('6LfyPOQgAAAAAFmUbJlE2GuiQcxgbjVPgVgA2LdJ', {action: 'homepage'}).then(function(token) {
         document.getElementById("token").value = token;
      });
  });

 
        
    </script>
    <script>
        let status1 = false;
        let status2 = true;
        var pretestStart = new Date("Jul 29, 2022 06:58:00").getTime();
        var pretestEnd = new Date("Jul 29, 2022 09:00:00").getTime();
        var postestStart = new Date("Jul 29, 2022 11:48:00").getTime();
        var postestEnd = new Date("Jul 29, 2022 18:00:00").getTime();
         var x = setInterval(function() {
                var now = new Date().getTime();
                var distance1 = pretestStart - now;
                var distance2 = pretestEnd - now;
                // console.log("start = " + distance1);
                // console.log("end = " + distance2);
            if (distance1 < 0) {
                status1 = true;
                } 

            if (distance2 < 0) {
                clearInterval(x);
                status1 = false;
            }
            }, 1000);

            var y = setInterval(function() {
                var now = new Date().getTime();
                var distance1 = postestStart - now;
                var distance2 = postestEnd - now;
                // console.log("start = " + distance1);
                // console.log("end = " + distance2);
            if (distance1 < 0) {
                status2 = true;
                } 

            if (distance2 < 0) {
                clearInterval(y);
                status2 = false;
            }
            }, 1000);


            document.getElementById("pretest-btn").addEventListener("click", function() {
                if (status1) {
                    location.href = "https://docs.google.com/forms/d/e/1FAIpQLSciYbDE2I-4mRYmWpvS2bF8GR5IGB6DFj1mc7AQAMDN9snBSA/viewform";
                } else {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Pretest belum dibuka',
                    });  
                }
            });

            document.getElementById("postest-btn").addEventListener("click", function() {
                if (status2) {
                    location.href = "https://docs.google.com/forms/d/e/1FAIpQLSerY-Gb5zehrkqJEc7-c0xZFXpfPR9kAC9cCAb_P4Anb8BIHA/viewform";
                } else {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Postest belum dibuka',
                    });  
                }
            });
    </script>
</body>
<script>
    const loader = document.querySelector(".loadpage");
    const navigation = document.querySelector("#content")
    // const overlay = document.querySelector("body");

    function init() {
        setTimeout(() => {
            loader.style.opacity = 0;
            loader.style.display = "none";
            
            navigation.style.display = "block";
            setTimeout(() => (navigation.style.opacity = 1), 50);
            
            // overlay.style.overflow = "visible";
        }, 6500);
    }
    init();
    

</script>
</html>