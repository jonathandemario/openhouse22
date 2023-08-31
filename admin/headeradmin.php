<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
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
	margin-top:-85px;
        padding: 0px 30px;
    
    }

    .navbar {
        position: fixed !important;
        z-index: 5;
        width: 100%;
        padding: -20px 0;

        display: flex;
        /* background: red; */
    }

    .logo {
        display: inline-flexbox;
        float: left;
    }

    .logo img {
        width: 50px;
	margin-top:-24px;
    }

    .nav-menu li a {
        color: white;
        font-size: 14px;
        font-weight: 500;
        margin-left: 23px;
        text-decoration: none;
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
        margin-top: -10px;
        margin-right: 25px;
        padding-top: -1px;
        padding-right: 50px;
        float: right;
        background-color: rgba(106,115,62,255);
        border-radius: 25px;
        width: 850px;
        height: 37px;
    }

    .navbar .nav-menu {
        display: inline-flex;
    }

    .nav-menu li {
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
        padding-top: 15px;
        padding-right: 50px;
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
            left: -100%;
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
                    <img src="..\asset\LOGO OH COLORED.png" alt="">
                    <!-- OH PETRA 2022 -->
                </a>
            </div>
            <ul class="nav-menu">
                <div class="icon cancel-btn">
                    <i class="fas fa-times"></i>
                </div>
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="ukm.php">UKM</a></li>
                <li class="nav-item"><a class="nav-link" href="lk.php">LK</a></li>
                <li class="nav-item"><a class="nav-link" href="add_ukm.php">Registrasi UKM</a></li>
                <li class="nav-item"><a class="nav-link" href="add_lk.php">Registrasi LK</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">LOGOUT</a></li>

            </ul>
            <ul class="icons">
                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
            </ul>
        </div>
    </nav>

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
        }
        cancelBtn.onclick = ()=>{
            menu.classList.remove("active");
            menuBtn.classList.remove("hide");
            btnBorder.classList.remove("hide");
            body.classList.remove("disabledScroll");
        }

        window.onscroll = ()=>{
            this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }
    </script>
</body>
</html>