<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de paciente

    <a class="btn btn-primary btn-social pull-right" href="?module=form_paciente&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Nuevos datos de paciente ha sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del paciente modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del paciente
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Codigo</th>
                <th class="center">Nombres</th>
                <th class="center">Apellidos</th>
                <th class="center">Fecha de Nacimiento</th>
                <th class="center">Telefono</th>
                <th class="center">Direccion</th>
                 <th class="center">Correo</th>
                <th class="center">Genero</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT id,nombres,apellidos,fecha_nacimiento,telefono,direccion,email,genero FROM pacientes ORDER BY id DESC")
                                            or die('error: '.mysqli_error($mysqli));

            
            
            while ($data = mysqli_fetch_assoc($query)) { 
              $fecha_nacimiento = $data['fecha_nacimiento'] ; //format_rupiah($data['fecha_nacimiento']);
              $telefono = $data['telefono']; //format_rupiah($data['telefono']);
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='30' class='center'>$data[id]</td>
                      <td width='100' align='right'>$data[nombres]</td>
                      <td width='100' align='right'>$data[apellidos]</td>
                      <td width='130' align='right'> $fecha_nacimiento</td>
                      <td width='50' align='right'> $telefono</td>
                      <td width='150' align='right'>$data[direccion]</td>
                      <td width='130' class='center'>$data[email]</td>
                      <td width='30' class='center'>$data[genero]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_paciente&form=edit&id=$data[id]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/paciente/proses.php?act=delete&id=<?php echo $data['id'];?>" onclick="return confirm('estas seguro de eliminar<?php echo $data['nombres']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content