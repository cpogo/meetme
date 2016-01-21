@extends('app.layout')
@section('title', 'Group Info')
@section('stylesheet_pages')
		@include('app.styles_pages')
@endsection
@section('main')
	<style>
		td a:hover{
			color:#1ab7ea;
		}
		td a{
			color:black;
			font-weight: bold;
			font-family: "Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
		}
	</style>

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
											<input name="nombre_grupo" type="text" maxlength="50" required class="form-control" placeholder="Your group's name">
										</div>
									</div>
									<div class="form-group">
										<label>Description</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-align-justify"></i>
											</div>
											<textarea name="grupo_descripcion" class="form-control" rows="3" placeholder="Short description of your group ..." required></textarea>
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
						</div><!-- /.box-body -->
					</div>
				</div><!-- /.col -->
				
				<div class="col-md-9">
					<!--Groups created by myself-->
					@if ( count( $grupos[ 0 ] ) == 0 && count( $grupos[ 1 ] ) == 0 )
						<div class="box box-primary">
							<div class="box-header">
							     <h3 class="box-title"><em>You don't have joined or created any group :-(</em></h3>
							</div>
						</div>
					@endif
					@if ( count( $grupos[ 0 ] ) > 0 )
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title"><em>Groups created by myself</em></h3>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
									  	<tr>
										  	<th>ID</th>
										  	<th>Group Name</th>
											<th>Edit</th>
											<th>Remove</th>
									  	</tr>
									</thead>
									<tbody>										
										@forelse ($grupos[0] as $key => $grupo)
										<tr>
										    <td>{{ $key + 1 }}</td>
								        	<td><a href="mygroup/{{ $grupo->id }}"><p class="text-primary">{{ $grupo->name }}		</p ></a>
								        	</td>
									        <td><a href="#" id="btnEdit" data-target="#modalAventon"
												data-botonEdit="{{ $grupo->id }}"><i class="fa fa-edit">	
												</i></a>
											</td>
										    <td><a href="#" id="btnDelete" data-botonDel="{{ $grupo->id }}"	   ><i class="fa fa-remove"></i></a>
										    </td>
										@empty
											{{--  <br><h4 style="color:#9f191f" align="center"><i class="glyphicon glyphicon-warning-sign"></i>&nbsp; You do not have groups created yet  :(</h4>--}}
										</tr>
									    @endforelse									    
									</tbody>	  
								</table>
							</div>
					    </div>
					</div>
					@endif<br>
					<!--Groups I have been added as a member-->
					@if ( count( $grupos[ 1 ] ) > 0 )				
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title"><em>Groups I have been added as a member</em></h3>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
									  	<tr>
										  	<th>ID</th>
										  	<th>Group Name</th>

											<th>Leave</th>
									  	</tr>
									</thead>
									<tbody>
									    
										@forelse ($grupos[1] as $key => $grupo)
										<tr>
										    <td>{{ $key + 1 }}</td>
								        	<td><a href="mygroup/{{ $grupo->id }}"><p class="text-primary">{{ $grupo->name }}		</p ></a>
								        	</td>
									        <td><a href="#" id="btnLeaveGroup" data-botonLeave="{{ $grupo->id }}" ><i class="glyphicon glyphicon-log-out"></i></a>

										    </td>
										@empty
											{{--  <br><h4 style="color:#9f191f" align="center"><i class="glyphicon glyphicon-warning-sign"></i>&nbsp; You do not have groups created yet  :(</h4>--}}
										</tr>	
									    @endforelse									    
									</tbody>	  
								</table>
							</div>
					    </div>
					</div>
					@endif
			    </div>

				{{--<div id="Misgrupos">
					<h4 align="center"><strong>Your groups are bellow:</strong></h4><br/>

					<!--<h4 align="center"><em>Groups created by myself</em></h4>
					<br>-->			

					<table style="margin-left: 2%;float:left">						
						<tbody>
						@forelse ($grupos[0] as $grupo)

							<tr>

								<td><a style=
									   "text-decoration: none;
								       font-family: cursive;
								       "

											href="mygroup/{{ $grupo->id }}"><em>"{{ $grupo->name }}"</em>&nbsp;&nbsp;</a></td>


									<td>&nbsp;&nbsp;&nbsp;<button type="button" id="btnEdit" data-target="#modalAventon"
																   data-botonEdit="{{ $grupo->id }}"   class="btn btn-primary"><i class="fa fa-edit"></i> Edit </button></td>

								    <td>&nbsp;&nbsp;&nbsp;<button type="button" id="btnDelete" data-botonDel="{{ $grupo->id }}"
																  class="btn btn-danger"><i class="fa fa-remove"></i> Delete </button></td>

								</tr>
							<tr>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							</tr>

						@empty
							{{--  <br><h4 style="color:#9f191f" align="center"><i class="glyphicon glyphicon-warning-sign"></i>&nbsp; You do not have groups created yet  :(</h4>--}}
						{{-- @endforelse
						</tbody>
					</table >

					<!--<h4 align="center"><em>Groups I have been added as a member</em></h4>
					<br/>-->
					<table style="margin-right:7%;float:right ">						
						<tbody>
						@forelse ($grupos[1] as $grupo)

							<tr>

								<td><a style=
								       "text-decoration: none;
								       font-family: cursive;
								       "

									   href="mygroup/{{ $grupo->id }}" ><em>"{{ $grupo->name }}"</em>&nbsp;&nbsp;</a></td>


								<td>&nbsp;&nbsp;&nbsp;<button type="button" id="btnLeaveGroup" data-botonLeave="{{ $grupo->id }}"
															  class="btn btn-warning"><i class="glyphicon glyphicon-log-out"></i> Leave group </button></td>

							</tr>
							<tr>
								<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
							</tr>

						@empty
							{{--  <br><h4 style="color:#9f191f" align="center"><i class="glyphicon glyphicon-warning-sign"></i>&nbsp; You do not belong to any group yet &nbsp; :(</h4>--}}
						{{-- @endforelse
						</tbody>
					</table>

				</div>--}}
			</div>

		</section>


		<div class='modal fade' id="modalEditGrupo" tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel'>
					<div class='modal-dialog modal-lg'>
						<div class='modal-content'>
							<div class='modal-header' style="background-color:dimgrey">
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<h4 class='modal-title' id='gridSystemModalLabel' style="font-family:'Kaushan Script', cursive;color:white;">Editar Grupo</h4>
							</div>
							<div class='modal-body'>

								<form action="UpdateGroup" method="post">
									<input type="hidden" name="_token" value="{!! csrf_token() !!}">
									<input type="hidden" name="grupoid">
									<!-- Event Title -->
									<div class="form-group">
										<label>Group Name</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-tasks"></i>
											</div>
											<input name="nombre_grupo" type="text" class="form-control" placeholder="Your group's name" maxlength="50" required>
										</div>
									</div>


									<div class="form-group">
										<label>Description</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-align-justify"></i>
											</div>
											<textarea name="grupo_descripcion" class="form-control" rows="3" placeholder="Short description of your group ..." required></textarea>
										</div>

									</div>



									<div class="form-group">
										<div class="input-group">
											<div class="input-group-btn">
												<button type="submit" class="btn btn-primary">Update Group</button>
											</div><!-- /btn-group -->
										</div>
									</div>
								</form>
							</div>
							<div class='modal-footer'>
								<!--<button id ="cancelarAventon" type='button' class='btn btn-primary'>Guardar</button>
								<button id='aceptarAventon' type='button' class='btn btn-danger'>Cancelar</button>-->
							</div>
						</div>
					</div>
		</div>


		<div class='modal fade' id="modalDeleteGrupo" tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel'>
			<div class='modal-dialog modal-lg'>
				<div class='modal-content'>
					<div class='modal-header' style="background-color:dimgrey">
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						<h4 class='modal-title' id='gridSystemModalLabel' style="font-family:'Kaushan Script', cursive;color:white;">Delete Group</h4>
					</div>
					<div class='modal-body'>
	                   <h3>Are you sure to delete this group ??</h3>
						<form action="DeleteGroup" method="post">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<input type="hidden" name="grupoidd">

							<div class="form-group">
								<div class="input-group">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-danger">Delete !!</button>
									</div><!-- /btn-group -->
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>


		<div class='modal fade' id="modalLeaveGrupo" tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel'>
			<div class='modal-dialog modal-lg'>
				<div class='modal-content'>
					<div class='modal-header' style="background-color:dimgrey">
						<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						<h4 class='modal-title' id='gridSystemModalLabel' style="font-family:'Kaushan Script', cursive;color:white;">Leave Group</h4>
					</div>
					<div class='modal-body'>
						<h3>Are you sure to leave this group ??</h3>

						<form action="LeaveGroup" method="post">
							<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<input type="hidden" name="grupoLeave">

							<div class="form-group">
								<div class="input-group">
									<div class="input-group-btn">
										<button type="submit" class="btn btn-warning">Leave !!</button>
									</div><!-- /btn-group -->
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>

	</div>




@endsection
@section('scripts')
		@include('app.scripts_pages')
@endsection
