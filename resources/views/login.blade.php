@extends('site.layout')
@section('title', 'Log In')
@section('form')
		<div class="dataUser" style="margin-top: 52px; padding-top: 25px; display: flex; justify-content: center;">
			<section>
				<h4>Log In</h4>
				<form action="loginUser" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row uniform">
						<div class="6u$ 12u$(xsmall)" style="width: 100%;">
							<input type="text" placeholder="User" value="" id="username" name="input_username" autofocus="autofocus">
						</div>
						<div class="6u$ 12u$(xsmall)" style="width: 100%;">
							<input type="password" placeholder="Password" value="" id="password" name="input_password">
						</div>
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" class="special" value="Log In"></li>
								<li><input type="reset" value="Reset"></li>
							</ul>
						</div>
					</div>
				</form>
				<div class="col-xs-12 col-sm-6 col-lg-3">
					<div class="box">
						<a href="{{ url('signIn') }}" class="button fit">Join with Google</a>		 
					</div>
				</div>
			</section>
		</div>
@endsection
