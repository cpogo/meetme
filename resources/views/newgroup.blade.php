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
												<textarea name="grupo_descripcion" class="form-control" rows="3" placeholder="Short descrption of your group ..."></textarea>
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
						<div id="Misgrupos">
							<h3 align="center">Your groups are bellow:</h3><br/>

								<table align="center">
									@forelse ($grupos as $grupo)

									<tr>

										<td><a href="mygroup/{{ $grupo->id }}" style="...">"{{ $grupo->name }}"&nbsp;&nbsp;</a></td>
										<form>
											<input type="hidden" value="{{ $grupo->id }}" name="nGrAeditar">
										<td>&nbsp;&nbsp;&nbsp;<button type="submit" id="btnEdit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit </button></td>
										</form>
										<form>
											<input type="hidden" value="{{ $grupo->id }}" name="nGrABorrar">
											<td>&nbsp;&nbsp;&nbsp;<button type="submit" id="btnDelete" class="btn btn-danger"><i class="fa fa-remove"></i> Delete </button></td>
										</form>
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

				</section>
				<!--<div id="modal" class="overlayDesaparece";" ></div>-->
			</div>
@endsection
@section('scripts')
		@include('app.scripts_pages')
@endsection
