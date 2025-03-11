<!DOCTYPE html>
<html>

    <head lang="eng">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="los.js"></script>
        <link rel="stylesheet" href="mainPageStyle.css">
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
    <div class="mainTemplate" style="box-sizing: border-box;">
            <div class="headerTemplate">
                <div class="logoContainer">
                    <img src="finpush.png">
                </div>
                <div class="selectContainer">
                    <div class="selector" onclick="location='main.php'"><img src="houseMiniFinal.png" class="logoMini"><span> Główna</span></div>
                    <div class="selector"  onclick="location='search.php'"><img src="glassMiniFinal.png"class="logoMini"><span>Przeglądaj</span></div>
                    <div class="selector" id="selected" onclick="location='highlight.php'"><img src="starMiniFinal.png" class="logoMini"><span>Wyróżnione</span></div>
                    <div class="selector"  onclick="location='user.php'"><span>Twoje Konto</span><img src="finpush.png" id="log"></div>
                </div>
            </div>
            <div class="mainContainer">
                <div class="roll">
                    <?php 
                    $sql = "SELECT *, LEFT(description, 60) AS 'des' FROM post p INNER JOIN login l ON p.id_user = l.id ORDER BY likes DESC LIMIT 3";
                    $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");
                   $result = mysqli_query($conn, $sql);
                                            
                                            
                      if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                       echo " <div class='high'>
                        <div class='highImage'><img src='".$row['image_path']."'></div>
                        <div class='highText'><h1>".$row['pet_name']."</h1><h2>".$row['name']."</h2><p>".$row['des']."</p></div>
                        <div class='highStat'>Otrzymano ".$row['views']." polubień!!!</div>
                    </div>";                                         
                         }
                       }
                    
                    ?>

                    
                </div>



            </div>
          </div>
    </body>
</html>