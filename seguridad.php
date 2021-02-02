<?php
    
    if(isset($_POST['email']))
    {   session_start();
        $mysqli = new mysqli('localhost', 'root', '', 'moma');
        $mysqli->set_charset('utf8');

        if($mysqli->connect_errno){
            //echo "Conexión fallida";
            header('Location: index.php?error=3');
        }
        else{
            //echo "Conexión exitosa";
            $peticion = 'SELECT pass FROM usuario WHERE mail="'.$_POST['email'].'"';

        // echo $peticion;
            $resultados = $mysqli->query($peticion);
            if($resultados->num_rows == 0)
            {
                header("Location:".$_SESSION['url']."?error=4");
            }
            else{
                $pass = $resultados->fetch_object()->pass;
                // session_start();
                if($pass == $_POST['psw'])
                {
                    $_SESSION['nombre'] = $_POST['email'];
                    header("Location: ".$_SESSION['url']);
                }
                else{
                    header("Location:".$_SESSION['url']."?error=5");
                }
            }
        }
    }
    else{
        header("Location:".$_SESSION['url']."?error=2");
    }

?>