@extends('site.layout')
@section('title', 'Register')
@section('form')
		<div class="dataUser" style="margin-top: 52px; padding-top: 25px; display: flex; justify-content: center;">
			<section>
				<h4>Register</h4>
				<form action="registerUser" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row uniform">
						<div class="6u$ 12u$(xsmall)" style="width: 100%;">
							<input type="text" placeholder="Full Name..." value="" id="fname" name="full_name" required autofocus="autofocus">
						</div>
						<!--<div class="6u$ 12u$(xsmall)" style="width: 100%;">
							<input type="text" placeholder="Last Name..." value="" id="lname" name="last_name" required>
						</div>-->
						<div class="6u$ 12u$(xsmall)" style="width: 100%;">
							<input type="email" placeholder="Email..." value="" id="email" name="input_email" required>
						</div>
						<div class="6u$ 12u$(xsmall)" style="width: 100%;">
							<input type="text" placeholder="Username..." value="" id="username" name="input_username" required>
						</div>
						<div class="6u$ 12u$(xsmall)" style="width: 100%;">
							<input type="password" placeholder="Password" value="" id="password" name="input_password" required>
						</div>
						<!--<div class="12u$">
							<div class="select-wrapper" style="color: rgba(255, 255, 255, 0.5) !important;">
								<select id="demo-category" name="sexOption">
									<option class="optionSelect" value="-" > - Sex - </option>
									<option class="optionSelect" value="0"> Male </option>
									<option class="optionSelect" value="1"> Female </option>
								</select>
							</div>
						</div>-->
						<div class="12u$">
							<ul class="actions">
								<li><input type="submit" class="special" value="Register"></li>
								<li><input type="reset" value="Reset"></li>
							</ul>
						</div>
					</div>
				</form>
			</section>
		</div>
@endsection
