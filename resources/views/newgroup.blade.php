@extends('app.layout')
@section('title', 'Group Info')
@section('stylesheet_pages')
		@include('app.styles_pages')
@endsection
@section('main')

	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				New Group
				<small>Configure your new group</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">New Group</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-3">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Create Group</h3>
						</div>
						<div class="box-body">
							<form action="createGroup" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<!-- Event Title -->
								<div class="form-group">
									<label>Group Name</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-tasks"></i>
										</div>
										<input name="nombre_grupo" type="text" class="form-control" placeholder="Your group's name">
									</div>
								</div>


								<div class="form-group">
									<label>Description</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-align-justify"></i>
										</div>
										<textarea name="grupo_descripcion" class="form-control" rows="3" placeholder="Short description of your group ..."></textarea>
									</div>
								</div>



								<div class="form-group">
									<div class="input-group">
										<div class="input-group-btn">
											<!--<button type="submit" class="btn btn-primary">Create Group</button>-->
										</div><!-- /btn-group -->
									</div>
								</div>
							</form>

						</div><!-- /.box-body -->
					</div>
				</div><!-- /.col -->


				<div id="Misgrupos">
					<h3 align="center">Your groups are bellow:</h3><br/>

					<table align="center">
						@forelse ($grupos as $grupo)

							<tr>

								<td><a href="mygroup/{{ $grupo->id }}" style="...">"{{ $grupo->name }}"&nbsp;&nbsp;</a></td>


									<td>&nbsp;&nbsp;&nbsp;<button type="button" id="btnEdit" data-target="#modalAventon"
																   data-botonEdit="{{ $grupo->id }}"   class="btn btn-primary"><i class="fa fa-edit"></i> Edit </button></td>

								    <td>&nbsp;&nbsp;&nbsp;<button type="button" id="btnDelete" data-botonDel="{{ $grupo->id }}"
																  class="btn btn-danger"><i class="fa fa-remove"></i> Delete </button></td>
								</tr>
							<tr>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							</tr>

						@empty
							<h4 align="center">You do not have groups created yet :(</h4>
						@endforelse
					</table>

				</div>
			</div>
			<!--<div id="modal">
				<div class="centrado"></div>
			</div>-->

		</section>


		<div class='modal fade' id="modalEditGrupo" tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel'>
					<div class='modal-dialog modal-lg'>
						<div class='modal-content'>
							<div class='modal-header' style="background-color:dimgrey">
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<h4 class='modal-title' id='gridSystemModalLabel' style="font-family:'Kaushan Script', cursive;color:white;">Editar Grupo</h4>
							</div>
							<div class='modal-body'>

								<form action="createGroup" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<!-- Event Title -->
									<div class="form-group">
										<label>Group Name</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-tasks"></i>
											</div>
											<input name="nombre_grupo" type="text" class="form-control" placeholder="Your group's name">
										</div>
									</div>


									<div class="form-group">
										<label>Description</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-align-justify"></i>
											</div>
											<textarea name="grupo_descripcion" class="form-control" rows="3" placeholder="Short description of your group ..."></textarea>
										</div>
									</div>



									<div class="form-group">
										<div class="input-group">
											<div class="input-group-btn">
												<button type="submit" class="btn btn-primary">Create Group</button>
											</div><!-- /btn-group -->
										</div>
									</div>
								</form>
							</div>
							<div class='modal-footer'>
								<button id ="cancelarAventon" type='button' class='btn btn-primary'>Guardar</button>
								<button id='aceptarAventon' type='button' class='btn btn-danger'>Cancelar</button>
							</div>
						</div>
					</div>
		</div>

		<div class='modal fade' id="modalDeleteGrupo" tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel'>
			<div class='modal-dialog modal-lg'>
				<div class='modal-content'>
					<div class='modal-header' style="background-color:dimgrey">
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						<h4 class='modal-title' id='gridSystemModalLabel' style="font-family:'Kaushan Script', cursive;color:white;">Eliminar Grupo</h4>
					</div>
					<div class='modal-body'>
	                   <h3>Esta seguro de eliminar el grupo ??</h3>
					</div>
					<div class='modal-footer'>
						<button id ="cancelarAventon" type='button' class='btn btn-primary'>Eliminar</button>
						<button id='aceptarAventon' type='button' class='btn btn-danger'>Cancelar</button>
					</div>
				</div>
			</div>
		</div>

	</div>




@endsection
@section('scripts')
		@include('app.scripts_pages')
@endsection

