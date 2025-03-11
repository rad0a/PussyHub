<?php 
if(isset($_POST['login'])) {
    $login = $_POST['login'];
    $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");
            $sql = "SELECT l.name FROM login l";
            $flag = false;
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if($row['name'] == $login) {
                        $flag = true;
                        break;
                    }
                }
                echo $flag;
            }
              mysqli_close($conn);
    }

    if(isset($_POST['mail'])) {
        $mail = $_POST['mail'];
        $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");
                $sql = "SELECT l.email FROM login l";
                $flag2 = false;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if($row['email'] == $mail) {
                            $flag2 = true;
                            break;
                        }
                    }
                    echo $flag2;
                }
                  mysqli_close($conn);
        }

        if(isset($_POST['lim'])) {
            $lim = intval($_POST['lim']);
            $conn = mysqli_connect("localhost", "root", "", "pussyhubdb");
            $sql = "UPDATE post SET likes = likes+1 WHERE id = $lim";
            mysqli_query($conn, $sql);
         
            
        }
?>

