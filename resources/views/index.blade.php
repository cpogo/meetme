@extends('site.layout')
@section('title', 'A Better Meeting Planner')
@section('main')
			<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>Meetme</h2>
					<p>A Better Meeting Planner</p>
					<ul class="actions">
						<li><a href="{{ url('login') }}" class="button special">Log In</a></li>
						<li><a href="{{ url('register') }}" class="button">Sign Up</a></li>
						<li><a href="{{ url('signIn') }}" class="button fit">Sign in with Google</a></li>
						<li><a href="{{ url('') }}" class="button fit">Join with Google</a></li>
					</ul>
				</div>
				<a href="#one" class="more scrolly">Learn More</a>
			</section>

			<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="inner">
					<header class="major">
						<h2>Stop wasting more time planning your meetings</h2>
						<p>With this tool you can improve your meeting planning focusing in the objectives.</p>
					</header>
					<ul class="icons major">
						<li><span class="icon fa-code major style1"><span class="label"></span></span></li>
						<li><span class="icon fa-check major style2"><span class="label"></span></span></li>
						<li><span class="icon fa-calendar major style3"><span class="label"></span></span></li>
					</ul>
				</div>
			</section>

{{--
			<!-- Two -->
			<section id="two" class="wrapper alt style2">
				<section class="spotlight">
					<div class="image"><img src="images/pic01.jpg" alt="" /></div><div class="content">
						<h2>Magna primis lobortis<br />
							sed ullamcorper</h2>
						<p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
					</div>
				</section>
				<section class="spotlight">
					<div class="image"><img src="images/pic02.jpg" alt="" /></div><div class="content">
						<h2>Tortor dolore feugiat<br />
							elementum magna</h2>
						<p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
					</div>
				</section>
				<section class="spotlight">
					<div class="image"><img src="images/pic03.jpg" alt="" /></div><div class="content">
						<h2>Augue eleifend aliquet<br />
							sed condimentum</h2>
						<p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
					</div>
				</section>
			</section>

			<!-- Three -->
			<section id="three" class="wrapper style3 special">
				<div class="inner">
					<header class="major">
						<h2>Accumsan mus tortor nunc aliquet</h2>
						<p>Aliquam ut ex ut augue consectetur interdum. Donec amet imperdiet eleifend<br />
							fringilla tincidunt. Nullam dui leo Aenean mi ligula, rhoncus ullamcorper.</p>
					</header>
					<ul class="features">
						<li class="icon fa-paper-plane-o">
							<h3>Arcu accumsan</h3>
							<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
						</li>
						<li class="icon fa-laptop">
							<h3>Ac Augue Eget</h3>
							<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
						</li>
						<li class="icon fa-code">
							<h3>Mus Scelerisque</h3>
							<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
						</li>
						<li class="icon fa-headphones">
							<h3>Mauris Imperdiet</h3>
							<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
						</li>
						<li class="icon fa-heart-o">
							<h3>Aenean Primis</h3>
							<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
						</li>
						<li class="icon fa-flag-o">
							<h3>Tortor Ut</h3>
							<p>Augue consectetur sed interdum imperdiet et ipsum. Mauris lorem tincidunt nullam amet leo Aenean ligula consequat consequat.</p>
						</li>
					</ul>
				</div>
			</section>
--}}

			<!-- CTA -->
			<section id="cta" class="wrapper style4">
				<div class="inner">
					<header>
						<h2>What Are You Waiting For?</h2>
						<p>Start scheduling your meetings Now!</p>
					</header>
					<ul class="actions vertical">
						<li><a href="{{ url('login') }}" class="button fit special">Log In</a></li>
						<li><a href="{{ url('register') }}" class="button fit">Sign Up</a></li>
						<li><a href="{{ url('signIn') }}" class="button fit">Sign in with Google</a></li>
						<!--<li><a href="{{ url('') }}" class="button fit">Join with Google</a></li>-->
					</ul>
				</div>
			</section>

			@include('site.footer')
@endsection
