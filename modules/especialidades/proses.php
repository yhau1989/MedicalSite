
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
            $name  = mysqli_real_escape_string($mysqli, trim($_POST['name']));
            $status  = mysqli_real_escape_string($mysqli, trim($_POST['status']));
            $agregado = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['agregado'])));
            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO especialidades(name,status,agregado) 
                                            VALUES('$name','$status','$agregado')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=especialidades&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
              
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $name  = mysqli_real_escape_string($mysqli, trim($_POST['name']));
            $status  = mysqli_real_escape_string($mysqli, trim($_POST['status']));
            $agregado = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['agregado'])));
                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE especialidades SET  name       = '$name',
                                                                    status      =  '$status',
                                                                    agregado     = '$agregado'
                                                              WHERE codigo       = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=especialidades&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM especialidades WHERE codigo='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=especialidades&alert=3");
            }
        }
    }       
}       
?>