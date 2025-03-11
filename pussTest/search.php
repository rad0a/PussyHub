<!DOCTYPE html>
<html>
    <?php
    
    

         $sql = "SELECT id FROM post p";
         $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");

         $ar = array();
        $result = mysqli_query($conn, $sql);
                                 
                                 
           if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($ar, $row['id']);
                                 
                                 
              }
            }
            $los = array_rand($ar, 1);
    
            
            $sql = "SELECT * FROM post p INNER JOIN login l ON p.id_user = l.id WHERE p.id = $ar[$los]";
            $result = mysqli_query($conn, $sql);
            $nazwa;
            $opis;
            $autor;
            $img;
            $like;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    $nazwa = $row['pet_name'];
                    $opis = $row['description'];
                    $autor = $row['name'];
                    $img = $row['image_path'];
                    $like = $row['likes'];         
                                     
                  }
                }
                $sql = "UPDATE post SET views = views+1 WHERE id = $ar[$los]";
                  mysqli_query($conn, $sql);

            mysqli_close($conn);
    ?>
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
                    <div class="selector" id="selected" onclick="location='search.php'"><img src="glassMiniFinal.png"class="logoMini"><span>Przeglądaj</span></div>
                    <div class="selector" onclick="location='highlight.php'"><img src="starMiniFinal.png" class="logoMini"><span>Wyróżnione</span></div>
                    <div class="selector"  onclick="location='user.php'"><span>Twoje Konto</span><img src="finpush.png" id="log"></div>
                </div>
            </div>
            <div class="mainContainer">
                <div class="roll">
                                           
                    <div class="rollText">
                            <h1><?php echo $nazwa?></h1>
                            <h3><?php echo $autor?></h3>
                            <p><?php echo $opis?></p>
                        </div>
                        <div class="rollImage"><img src="<?php echo $img?>"></div>
                        <div class="rollEmotes">
                            <div class="emoteContainer"><img src="ex.png"></div>
                            <div class="emoteContainer"><img src="arrow.png" onclick="location.reload()"></div>
                            <div class="emoteContainer"><img src="heart.png" onclick="like(<?php echo $ar[$los]?>)">
                            </div>
                            </div>
                    
                </div>



            </div>
          </div>
    </body>
</html>