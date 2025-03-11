<!DOCTYPE html>
<html>
    <?php
    $host = "localhost"; 
    $user = "root"; 
    $password = ""; 
    $dbname = "pussyhubdb"; 
    $conn = mysqli_connect($host, $user, $password, $dbname);

        
    ?>
    <head lang="eng">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="rejestracja.js"></script>
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
                        <h1>Zarejestruj się!</h1>
                    </div>
                    <?php
                            if(isset($_POST['submitRej'])) {
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $pas = $_POST['pas'];
                                $pasSec = $_POST['pasSec'];

                                $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");
                                $sql = "SELECT l.name, l.email FROM login l";
                                $result = mysqli_query($conn, $sql);
                                $flag = true;

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if($row['name'] == $name||$row['email'] == $email||strlen($pas) < 8 || $pas!=$pasSec) {
                                            echo "<h2 class='frontMessageDecline'>Błędne dane - nie utworzono konta</h2>";
                                            $flag = false;
                                            break;
                                        }
                                    }
                                    if($flag) {
                                        $hashpas = password_hash($pas, PASSWORD_DEFAULT);
                                        $sql = "INSERT INTO login (name, email, pass) VALUES ('$name', '$email', '$hashpas')";
                                        mysqli_query($conn, $sql);
                                        echo "<h2 class='frontMessageAprove'>Dodano konto!</h2>";
                                    }
                                }
                                  mysqli_close($conn);
                            }
                        ?>
                    <div class="line-container">
                        <div class="line"></div>
                    </div>

                </div>
            <div class="logFormRej">
                <form method="post" class="medLogForm">
                        <div class="konForm">
                        <label id="l1">Wpisz e-mail:</label>
                        <input type="email" class="login" name="email" tabindex="1" oninput="checkMail()" id="mail">
                        </div>
                        <div class="konForm">
                        <label id="l2">Wpisz nazwę:</label>
                        <input type="text" id="login" class="login" name="name" tabindex="2" oninput="checkLogin()">
                        </div>
                        <div class="konForm">
                        <label id="l3">Twoje hasło:</label>
                        <input type="password" class="login" name="pas" tabindex="3" oninput="checkPas()" id="pas">
                        </div>
                        <div class="konForm">
                        <label id="l4">Powtórz hasło:</label>
                        <input type="password" class="login" name="pasSec" tabindex="4" oninput="checkPasSec()" id="pasSec">
                        </div>

                        <div class="konForm">
                        <input type="submit" value="Zarejestruj się" id="tem" name="submitRej" tabindex="5" class="butRej">
                        </div>
                        <div class="konForm">
                            <input type="checkbox" name="policy" tabindex="6" id="checkRej">
                            <label for="checkRej" class="checkRejLabel">Zaakceptuj zasady użytkowania oraz politykę prywatności</label>
                        </div>
                        <div class="konForm">

                            <span class="subLink"><a  tabindex="7" href="index.php">< Powróć do logowania</a></span>
                        </div>
                    

                </form>
                
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
        <?php
        if(isset($_POST['confLog'])) {
            $em = $_POST['em'];
            $pas = $_POST['pas'];
       //     $pas = password_hash($pas, PASSWORD_DEFAULT);
       //     $sql = "INSERT INTO login (email, pass) VALUES ('$em', '$pas')";
        //    $conn->query($sql);
       //     echo "<script>alert('Uzytkownik dodany!');</script>";
        }
        
        ?>
    </body>
</html>