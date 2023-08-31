<?php
    session_start();

if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $nrp = $_POST['nrp'];
        $password = $_POST['password'];
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $recaptcha_secret = '6LfyPOQgAAAAACWQxGr6pwYC6CyQwl-0kjKuAqmc';
        $recaptcha_response = $_POST['token'];

        $recaptcha = file_get_contents($url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha, true);
		

        if($recaptcha['success'] != 1 AND $recaptcha['score'] < 0.5) {
            echo $recaptcha;
            header("Location: ../home.php?status=3");
            exit();
        } 
		

        $imap = false;
        $user=$_POST['nrp'];
        $pass=$_POST['password'];
        $user = strtolower($user);
        $imap=false;
        $timeout=30;
        $fp = fsockopen ($host='john.petra.ac.id',$port=110,$errno,$errstr,$timeout);
	// if($fp) {
	// 	echo 'Connected!<br>';
	// }
        $errstr = fgets ($fp);

        

        if (substr ($errstr,0,1) == '+'){
            fputs ($fp,"USER ".$user."\n");
            $errstr = fgets ($fp);
            if (substr ($errstr,0,1) == '+'){
                fputs ($fp,"PASS ".$pass."\n");
                $errstr = fgets ($fp);
                if (substr ($errstr,0,1) == '+'){
                    $imap=true;
                }
            }
        }

        if ($imap) {
            require "../utility/db_connect.php";
            $sql = "SELECT * FROM peserta WHERE nrp = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([strtolower($nrp)]);
            
            if($stmt->rowCount() <= 0)
                {
                    // echo 'eror';
                    // echo $user;
                    
                $error1 = 1;
            }else{
            	$_SESSION["login"]= true;

                // if(isset($_POST["remember"])) {
                    
                //     setcookie("id", $nrp, time() + 300);
                //     setcookie("key", hash("sha256", $password), time() + 300);
                // }
                header("Location: ../home.php");
                exit();
            }   
        } else {$error = 1;
        }

        header("Location: ../home.php?status=1");
        exit();
        

    }
    header("Location: ../home.php?status=2");
    
?>