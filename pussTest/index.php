<!DOCTYPE html>
<html>

    <head lang="eng">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src=""></script>
        <link rel="stylesheet" href="temporary.css">
        <link rel="icon" type="image/x-icon" href="finpush.png">
        <title>PussyHub</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quantico:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
       
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gantari:ital,wght@0,100..900;1,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quantico:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gantari:ital,wght@0,100..900;1,100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quantico:ital,wght@0,400;0,700;1,400;1,700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="bacg">
            <div id="logPanel">
                <div id="logHeader">
                    <div class="logHeaderCon">
                        <img src="finpush.png" style="width: 140px; height: 140px;">
                    </div>
                    <div class="logHeaderCon">
                        <h1>Witaj na PussyHUB!</h1>
                    </div>
                    <div class="line-container">
                        <div class="line"></div>
                    </div>
                    <h2>Zaloguj się lub utwórz konto, aby kontynuować!</h2>
                </div>
            <div id="logForm">
                <form method="post" class="medLogForm">
                    <div class="konForm">
                    <label>E-mail:</label>
                    <input type="text" class="login" name="email" tabindex="1">
                    </div>
                    <div class="konForm">
                    <label>Hasło:</label>
                    <input type="password" class="login" name="pas" tabindex="2">
                    </div>
                    <div class="konForm">
                    <input type="submit" value="Zaloguj się" id="tem" name="Log" tabindex="3" class="butLog">
                    </div>
                    <div class="konForm"><span tabindex="4" class="subLink">Zapomniałem/am Hasła</span>
                    <span class="subLink"><a tabindex="5" href="rejestracja.php">Zarejestruj Się</a></span></div>
                    
                </form>
                <div class="line-container">
                        <div class="line"></div>
                </div>
                <?php
           if(isset($_POST['Log'])) {
            $email = $_POST['email'];
            $pas = $_POST['pas'];
            $pasHash = password_hash($pas, PASSWORD_DEFAULT);
            $name;
            $id;
            $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");
            $sql = "SELECT * FROM login l";
            $result = mysqli_query($conn, $sql);
            $userFlag = false;


            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            //        echo "<script>alert('".password_hash($pas, PASSWORD_DEFAULT)."');</script>";
                    if($row['email'] == $email && password_verify($pas,$row['pass'])) {
                        $userFlag = true;
                        $name = $row['name'];
                        $id = $row['id'];
                        break;
                    } 

                }

                if($userFlag) {
                    echo "<script>alert('Zalogowano!')</script>";
                    setcookie("userName", $name);
                    setcookie("userEmail", $email, (time() + 43200));
                    setcookie("userName", $name);
                    setcookie("userId", $id);
                    header("Location: main.php");
                    exit();
                } else {
                    echo "<script>
                    document.querySelector('h2').classList.add('frontMessageDecline');
                    document.querySelector('h2').innerHTML = 'Nie udało ci się zalogować!';
                    </script>";
                }
            }
              mysqli_close($conn);

       //     $pas = password_hash($pas, PASSWORD_DEFAULT);
       //     $sql = "INSERT INTO login (email, pass) VALUES ('$em', '$pas')";
        //    $conn->query($sql);
       //     echo "<script>alert('Uzytkownik dodany!');</script>";
        }
        
        ?>
                </div>
                

                <div id="logFoot">
                    <div class="konForm">
                    <span class="polic">Zasady użytkowania</span></div>
                    <div class="konForm"><span class="polic">Pliki cookies</span></div>
                    <div class="konForm"><span class="polic">Polityka prywatności</span></div>
                    <div class="konForm"><span class="polic">Pomoc</span></div>
                </div>
            </div>
        </div>

    </body>
</html>