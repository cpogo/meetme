@extends('app.layout')
@section('title', 'My Group')
@section('stylesheet_pages')
		@include('app.styles_pages')
@endsection
@section('main')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1 id="gg">
						My Group:
						<small>{{$grupoInformation[0]->name }}</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
						<li class="active">Group</li>
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					<div class="box">
						<div class="box box-primary">
							<div class="box-header with-border">
									<h1 class="box-title">{{$grupoInformation[0]->name }} , </h1> <h6 style="display: inline"><i>{{$grupoInformation[0]->description }}</i></h6><br>

									<form class="navbar-form navbar-right" role="search">
				                		<div class="input-group">
				                    <input type="text" name="agregarMiembro" id="addmember" class="form-control" placeholder="Add a member...">
				                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
				                		</div>
												<div class="displaygroup"></div>
				          			</form>
							</div>

							<div class="box-body">
										<div class="box-header with-border">
											<div class="thumbnail">
												<img src="{{asset('images/avatar5.png')}}" class="img-circle img-responsive" alt="owner" width="140" height="140">
												<div class="caption">
													<h3 style='text-align: center;'>Owner</h3>
													<h4 style='text-align: center;'>{{$grupoInformation[2]->full_name}}</h4>
												</div>
											</div>
										</div>

										<div class="row membersgroup">
												@forelse($grupoInformation[1] as $members)
														<div class="col-sm-6 col-md-4">
															<div class="thumbnail">
																<img src="{{asset('images/avatar3.png')}}" class="img-circle img-responsive" alt="owner" width="140" height="140">
																<div class="caption">
																	<h3 style='text-align: center;'>Member</h3>
																	<h4 style='text-align: center;'>{{$members->full_name}}</h4>
																</div>
															</div>
														</div>
												@empty
														<h4 align="center">There aren't members yet </h4>
												@endforelse
										</div>
							</div>
							{{--<h3>Members:</h3>--}}

						{{--	@forelse ($grupoInformation[1] as $grupoinfo)
								<table>
								<tr>

									<td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $grupoinfo->full_name }}, ({{ $grupoinfo->username }})</td>
								</tr>
								<tr>
									<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
								</tr>

							@empty
								<h4 align="center">You do not have members created yet :(</h4>
							@endforelse
						</table>--}}
							{{--<div class="box-body">
								<div class="box-header with-border">
									<div class="thumbnail">
										<img src="{{asset('images/avatar5.png')}}" class="img-circle img-responsive" alt="owner" width="140" height="140">
										<div class="caption">
											<h3 style='text-align: center;'>Owner</h3>
											<h4 style='text-align: center;'>Owner name</h4>
										</div>
									</div>
								</div>
								<div class="row membersgroup">
									<div class="col-sm-6 col-md-4">
										<div class="thumbnail">
											<img src="{{asset('images/avatar3.png')}}" class="img-circle img-responsive" alt="owner" width="140" height="140">
											<div class="caption">
												<h3 style='text-align: center;'>Member</h3>
												<h4 style='text-align: center;'>Member</h4>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-4">
										<div class="thumbnail">
											<img src="{{asset('images/avatar2.png')}}" class="img-circle img-responsive" alt="owner" width="140" height="140">
											<div class="caption">
												<h3 style='text-align: center;'>Member</h3>
												<h4 style='text-align: center;'>Member</h4>
											</div>
										</div>
									</div>
									<div class="col-sm-6 col-md-4">
										<div class="thumbnail">
											<img src="{{asset('images/avatar04.png')}}" class="img-circle img-responsive" alt="owner" width="140" height="140">
											<div class="caption">
												<h3 style='text-align: center;'>Member</h3>
												<h4 style='text-align: center;'>Member</h4>
											</div>
										</div>
									</div>
								</div>
							</div><!-- /.box-body -->--}}
						</div>
					</div>
				</section>
			</div>
@endsection
@section('scripts')
		@include('app.scripts_pages')
@endsection
