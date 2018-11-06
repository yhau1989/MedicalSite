 
<form  method="post" id="new_register" name="new_register" data-toggle="validator" >
<!-- Modal -->
<div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nuevo Paciente</h4>
      </div>
      <div class="modal-body">
	  <div class="row ">
		  <div class="col-md-6 form-group">
			<label for="nombres">Nombres</label>
			  <input type="text" class="form-control"  id="nombres" name="nombres" placeholder="Ingresa  nombre" required minlength="4" maxlength="100">
		 </div>
		 <div class="col-md-6 form-group">
			<label for="apellidos">Apellidos</label>
			  <input type="text" class="form-control"  id="apellidos" name="apellidos" placeholder="Ingresa apellido" required minlength="4" maxlength="100">
		 </div>
	  </div>
	 
	  
	  <div class="row">
		  <div class="col-md-6  form-group">
			<label for="fecha_nacimiento">Fecha de nacimiento</label>
			  <input type="text" class="form-control datepicker" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" id="fecha_nacimiento" name="fecha_nacimiento"  required  maxlength="10">
		  </div>
		  <div class="col-md-6  form-group">
			<label for="telefono">Teléfono</label>
			  <input type="text" class="form-control"  id="telefono" name="telefono"    maxlength="20">
		  </div>
	  </div>
	  
	  <div class="row form-group">
		  <div class="col-md-12">
			<label for="direccion">Dirección</label>
			  <textarea class="form-control" name="direccion" id="direccion" maxlength="255"></textarea>
		  </div>
	  </div>
	  
	  <div class="row ">
		  <div class="col-md-6 form-group">
			<label for="email">E-mail</label>
			  <input type="email" class="form-control"  id="email" name="email"  maxlength="64">
		  </div>
		  <div class="col-md-6 form-group">
			<label for="genero">Genero</label>
			  <select name="genero" id="genero" class="form-control" required>
				<option value="">-- Seleccciona --</option>
				<option value="F">Femenino</option>
				<option value="M">Masculino</option>
			  </select>
		  </div>
	  </div>
	  
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="guardar_datos" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>