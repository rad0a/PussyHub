<!DOCTYPE html>
<html>
    <head lang="eng">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
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
        <div class="mainTemplate">
            <div class="headerTemplate">
                <div class="logoContainer">
                    <img src="finpush.png">
                </div>
                <div class="selectContainer">
                    <div class="selector" onclick="location='main.php'"><img src="houseMiniFinal.png" class="logoMini"><span> Główna</span></div>
                    <div class="selector" onclick="location='search.php'"><img src="glassMiniFinal.png"class="logoMini"><span>Przeglądaj</span></div>
                    <div class="selector" onclick="location='highlight.php'"><img src="starMiniFinal.png" class="logoMini"><span>Wyróżnione</span></div>
                    <div class="selector" id="selected" onclick="location='user.php'"><span>Twoje Konto</span><img src="finpush.png" id="log"></div>
                </div>
            </div>
            <div class="mainContainer">
                <div class="articleContainer">
                    <div class="userPanel">
                        <div class="userPanelLeft">
                            <div class="userImage" id="userLogoDrop"><img src="finpush.png" id="userLogo"></div>
                            <div class="userDescription"><h2><?php 


                                echo "Twoja nazwa to: ".$_COOKIE['userName']."#".$_COOKIE['userId'];
                            ?></h2></div>
                            <div class="userDescription"><h3><?php 

                                
                                echo "Twój email to: ".$_COOKIE['userEmail'];
                            ?></h3></div>
                            <div class="userStats"><?php 
                                $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");
                                $id = $_COOKIE['userId'];
                                $sql = "SELECT SUM(views) AS 'sumaW', SUM(likes) AS 'sumaL' FROM post WHERE id_user = $id";
                                $result = mysqli_query($conn, $sql);
                                $views;
                                $likes;
                                if(mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                       $views = $row['sumaW'];
                                        $likes = $row['sumaL'];
                                    }
                                   } 

                                mysqli_close($conn);
                                
                                echo "Twoje wyświetlenia to: $views</br> 
                                Twoje polubienia to: $likes
                                ";
                            ?></div>
                        </div>
                        <div class="userPanelRight">
                            <div class="userLogout"><img src="Logout.png" onclick="logout()"></div>
                            <div class="userControl">.</div>
                            <div class="userControl">.</div>
                            <div class="userPost">
                                <div class="userDescription"><h2>Wszystkie twoje posty:</h2></div>
                                <div class="userPostContainer">

                                    <?php
                                         $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");
                                         $usID = $_COOKIE['userId'];
                                         $sql = "SELECT *, LEFT(description, 100) AS 'desc' FROM post p INNER JOIN login l ON l.id = p.id_user WHERE p.id_user = $usID";
                                         $result = mysqli_query($conn, $sql);
                             
                             
                                         if (mysqli_num_rows($result) > 0) {
                                             while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<div class='petPost'><div class='petPostImage'><img src='".$row['image_path']."'></div><div class='petPostContent'>
                                        <div class='petPostHeader'>".$row['pet_name']."</div><div class='petPostDescription'>".$row['desc']."</div>
                                    </div><div class='petStats'>Polubienia: ".$row['likes']." - Wyswietlenia: ".$row['views']."<img src='Logout.png'></div></div>";
                             
                                             }
                                            } else {
                                                echo "<div class='userPostNone'><h3>Niestety nie masz żadnych postów :c</h3></div>";
                                            }

                                    mysqli_close($conn);
                                    ?>
                                    
                                </div>
                                <div class="userDescription"><input type="button" value="Utwórz nowy post!" class="createPost"onclick="toggleNewPost()"></div>
                                <div class="newPost" id="newPost">
                                    <form method="post">
                                        <div class="addInput">
                                            <textarea type="text" class="shortText" placeholder="Wpisz tu tytuł/nazwę" name="shortText"></textarea>
                                        </div>
                                        <div class="addInput">
                                            <textarea type="text" class="longText" placeholder="Wpisz tu opis" name="longText"></textarea>
                                        </div>
                                        <div class="addInput">
                                            <div id="addImage"><img src="" id="preview2" name="addImage" value=""></div>
                                            
                                        </div>
                                        <input type="hidden" id="sub2" name="sub2">;
                                        <a id="sub" download></a>
                                        <div class="addInput">
                                            <input type="submit" class="createPost" name="createPost">
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php 
                            if(isset($_POST['createPost'])) {
                                $img = $_POST['sub2'];
                                $id = $_COOKIE['userId'];
                                $header = $_POST['shortText'];
                                $description = $_POST['longText'];

                                $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");

                                $sql = "INSERT INTO post (id_user, pet_name, description, image_path) VALUES ('$id', '$header', '$description', '$img')";
                                $result = mysqli_query($conn, $sql);
                                $mysqli_close($conn);
                            }
                        ?>
            <script src="pictures.js"></script>
    </body>
</html>