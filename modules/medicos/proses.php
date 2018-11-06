
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
            $telefono  = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $direccion  = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $codigo_especialidad  = mysqli_real_escape_string($mysqli, trim($_POST['codigo_especialidad']));
    
            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO medicos(nombres,apellidos,telefono,direccion,email,codigo_especialidad) 
                                            VALUES('$nombres','$apellidos','$telefono','$direccion','$email','$codigo_especialidad')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=medicos&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $nombres  = mysqli_real_escape_string($mysqli, trim($_POST['nombres']));
            $apellidos  = mysqli_real_escape_string($mysqli, trim($_POST['apellidos']));
            $telefono  = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $direccion  = mysqli_real_escape_string($mysqli, trim($_POST['direccion']));
            $email  = mysqli_real_escape_string($mysqli, trim($_POST['email']));
            $codigo_especialidad = mysqli_real_escape_string($mysqli, trim($_POST['codigo_especialidad']));
    
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE medicos SET  nombres       = '$nombres',
                                                                    apellidos      = '$apellidos',
                                                                    telefono             = '$telefono',
                                                                    direccion          = '$direccion',
                                                                    email    = '$email',
                                                                    codigo_especialidad      = '$codigo_especialidad'
                                                              WHERE codigo       = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=medicos&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM medicos WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=medicos&alert=3");
            }
        }
    }       
}       
?>