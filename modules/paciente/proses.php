
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $nombres  = mysqli_real_escape_string($mysqli, trim($_POST['nombres']));
            $apellidos  = mysqli_real_escape_string($mysqli, trim($_POST['apellidos']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $telefono  = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $direccion  = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $genero  = mysqli_real_escape_string($mysqli, trim($_POST['genero']));

            $created_user = $_SESSION['id_user'];

            $query = mysqli_query($mysqli, "INSERT INTO pacientes(nombres,apellidos,fecha_nacimiento,telefono,direccion,email,genero) 
                                            VALUES('$nombres','$apellidos','$fecha','$telefono','$direccion','$email','$genero')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=paciente&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $nombres  = mysqli_real_escape_string($mysqli, trim($_POST['nombres']));
            $apellidos  = mysqli_real_escape_string($mysqli, trim($_POST['apellidos']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $telefono  = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $direccion  = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $genero  = mysqli_real_escape_string($mysqli, trim($_POST['genero']));

            printf($genero);
            
            
    
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE pacientes SET  nombres       = '$nombres',
                                                                    apellidos      = '$apellidos',
                                                                    fecha_nacimiento      = '$fecha',
                                                                    telefono             = '$telefono',
                                                                    direccion          = '$direccion',
                                                                    email    = '$email',
                                                                    genero      = '$genero'
                                                              WHERE id       = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=paciente&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM pacientes WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=paciente&alert=3");
            }
        }
    }       
}       
?>