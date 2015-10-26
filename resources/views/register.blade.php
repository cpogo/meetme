<!DOCTYPE html>
<!--
	Spectral by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>MeetMe - Register</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
</head>
<body class="landing">

<!-- Page Wrapper -->
<div id="page-wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="/">MeetMe</a></h1>
        <nav id="nav">
            <ul>
                <li class="special">
                    <a href="#menu" class="menuToggle"><span>Menu</span></a>
                    <div id="menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="elements.html">About</a></li>
                            <li><a href="register">Sign Up</a></li>
                            <li><a href="login">Log In</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
</div>

<div class="dataUser" style="margin-top: 52px; padding-top: 25px; display: flex; justify-content: center;">
    <section>
        <h4>Register</h4>
        <form action="registerUser" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row uniform">
                <div class="6u$ 12u$(xsmall)" style="width: 100%;">
                    <input type="text" placeholder="Name" value="" id="name" name="input_name">
                </div>
                <div class="6u$ 12u$(xsmall)" style="width: 100%;">
                    <input type="text" placeholder="User" value="" id="username" name="input_username">
                </div>
                <div class="6u$ 12u$(xsmall)" style="width: 100%;">
                    <input type="password" placeholder="Password" value="" id="password" name="input_password">
                </div>
                <div class="6u$ 12u$(xsmall)" style="width: 100%;">
                    <input type="email" placeholder="Email" value="" id="email" name="input_email">
                </div>
                <div class="12u$">
                    <div class="select-wrapper" style="color: rgba(255, 255, 255, 0.5) !important;">
                        <select id="demo-category" name="sexOption">
                            <option class="optionSelect" value="-" > - Sex - </option>
                            <option class="optionSelect" value="0"> Male </option>
                            <option class="optionSelect" value="1"> Female </option>
                        </select>
                    </div>
                </div>
                <!--<div class="6u$ 12u$(xsmall)" style="width: 100%;">
                    <input type="text" placeholder="Occupation" value="" id="occupation" name="input_occupation">
                </div>-->
                <div class="12u$">
                    <textarea name="input_addinfo" id="demo-message" placeholder="Additional Information" rows="4"></textarea>
                </div>
                <div class="6u$ 12u$(xsmall)" style="width: 100%;">
                    <label>Date of Birth</label>
                    <input type="date" value="" id="datebirth" name="input_dbirth" style="color: rgba(255, 255, 255, 0.5) !important;">
                </div>

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

<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollex.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrolly.min.js') }}"></script>
<script src="{{ asset('js/skel.min.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<!--[if lte IE 8]><script src="js/ie/respond.min.js"></script><![endif]-->
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
