			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel -->
					<div class="user-panel">
						<div class="pull-left image">
							<img src="{{ $user->photo_url }}" class="img-circle" alt="User Image">
						</div>
						<div class="pull-left info">
							<p>{{$user->first_name}} {{$user->last_name}}</p>
							<!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
							<a href="{{ url('profile') }}">{{$user->username}}</a>
						</div>
					</div>

					<!-- search form -->
					<form action="#" method="get" class="sidebar-form">
			            <div class="input-group">
			              <input type="text" name="buscar" id="busqueda" class="form-control" placeholder="Search...">
			              <span class="input-group-btn">
			                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
			              </span>
			            </div>
			            <div class="display"></div><!--id=display-->
			        </form>
					<!-- /.search form -->

					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">MAIN NAVIGATION</li>
						<li class="{{ (Request::is('dashboard')) ? 'active' : null }} treeview">
							<a href="{{ url('dashboard') }}">
								<i class="fa fa-dashboard"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="{{ (Request::is('new_event')) ? 'active' : null }} treeview">
							<a href="{{ url('new_event') }}">
								<i class="fa fa-calendar"></i>
								<span>New Event</span>
							</a>
						</li>
						<li class="{{ (Request::is('new_group')) ? 'active' : null }} treeview">
							<a href="{{ url('new_group') }}">
								<i class="fa fa-group"></i>
								<span>Groups Info</span>
							</a>
						</li>
						<li class="{{ (Request::is('profile')) ? 'active' : null }} treeview">
							<a href="{{ url('profile') }}">
								<i class="fa fa-user"></i>
								<span>Profile</span>
							</a>
						</li>
						</li>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>
