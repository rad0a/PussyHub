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
                </div>
            <div id="logForm">
                <form method="post" class="medLogForm">
                    <div class="konForm">
                        <h2>Zaloguj się lub utwórz konto, aby kontynuować!</h2>
                    </div>
                    <div class="konForm">
                    <label>E-mail</label>
                    <input type="text" class="login" name="em">
                    </div>
                    <div class="konForm">
                    <label>Hasło</label>
                    <input type="password" class="login" name="pas">
                    </div>
                    <div class="konForm">
                    <input type="submit" value="Zaloguj się" id="tem" name="confLog">
                    </div>
                    <span>Zapomniałem/am Hasła</span>
                    <span>Zarejestruj Się</span>
                </form>
                
                </div>
                
                <div id="logFoot">
                    <span class="polic">Zasady użytkowania</span>
                    <span class="polic">Pliki cookies</span>
                    <span class="polic">Polityka prywatności</span>
                    <span class="polic">Pomoc</span>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST['confLog'])) {
            $em = $_POST['em'];
            $pas = $_POST['pas'];
            $pas = password_hash($pas, PASSWORD_DEFAULT);
            $sql = "INSERT INTO login (email, pass) VALUES ('$em', '$pas')";
            $conn->query($sql);
            echo "<script>alert('Uzytkownik dodany!');</script>";
        }
        
        ?>
    </body>
</html>