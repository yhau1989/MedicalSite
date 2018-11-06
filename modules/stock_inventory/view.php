
<script language="javascript">
      function printSam()
      {
        window.print();
      }
</script>



<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Stock de Medicamentos

    <!--<a class="btn btn-primary btn-social pull-right" href="modules/stock_inventory/print.php" target="_blank">-->
    <a class="btn btn-primary btn-social pull-right" href="#" target="_blank" onClick="printSam()">
      <i class="fa fa-print"></i> Imprimir
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
        
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
          
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Codigo</th>
                <th class="center">Nombre de Medicamento</th>
                <th class="center">Precio de compra</th>
                <th class="center">Precio de venta</th>
                <th class="center">Stock</th>
                <th class="center">Usario creador</th>
                <th class="center">Fecha creación</th>
                <th class="center">Usuario modificador</th>
                <th class="center">Fecha modificación</th>
                <th class="center">Unidad</th>
              </tr>
            </thead>
          
            <tbody>
            <?php  
            $no = 1;
          
            $query = mysqli_query($mysqli, "SELECT a.codigo,a.nombre,a.precio_compra,a.precio_venta,a.unidad,a.stock, 
                                            uc.username as usuario_creo, a.created_date , uu.username as usuario_modifica, a.updated_date
                                            FROM medicamentos a
                                            inner join usuarios uu on a.updated_user = uu.id_user
                                            inner join usuarios uc on a.created_user = uc.id_user
                                            ORDER BY a.nombre ASC")
                                            or die('Error: '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 
              $precio_compra = format_rupiah($data['precio_compra']);
              $precio_venta = format_rupiah($data['precio_venta']);
             
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[codigo]</td>
                      <td width='180'>$data[nombre]</td>
                      <td width='30' align='right'>$. $precio_compra</td>
                      <td width='30' align='right'>$. $precio_venta</td>
                      <td width='30' align='right'>$data[stock]</td>
                      <td width='80' class='center'>$data[usuario_creo]</td>
                      <td width='80' class='center'>$data[created_date]</td>
                      <td width='80' class='center'>$data[usuario_modifica]</td>
                      <td width='80' class='center'>$data[updated_date]</td>
                      <td width='80' class='center'>$data[unidad]</td>

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