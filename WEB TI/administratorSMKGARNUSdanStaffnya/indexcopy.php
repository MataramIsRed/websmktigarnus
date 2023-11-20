<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <style>
        body{
	margin:0;
	color:#6a6f8c;
	background:#c8c8c8;
	font:600 16px/18px 'Open Sans',sans-serif;
}

.login-box{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:670px;
	position:relative;
	background:url(https://images.unsplash.com/photo-1507208773393-40d9fc670acf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1268&q=80) no-repeat center;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-snip{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:rgba(0, 77, 77,.9);
}
.login-snip .login,
.login-snip .sign-up-form{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
}
.login-snip .sign-in,
.login-snip .sign-up,
.login-space .group .check{
	display:none;
}
.login-snip .tab,
.login-space .group .label,
.login-space .group .button{
	text-transform:uppercase;
}
.login-snip .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-snip .sign-in:checked + .tab,
.login-snip .sign-up:checked + .tab{
	color:#fff;
	border-color:#1161ee;
}
.login-space{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-space .group{
	margin-bottom:15px;
}
.login-space .group .label,
.login-space .group .input,
.login-space .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-space .group .input,
.login-space .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}
.login-space .group input[data-type="password"]{
	text-security:circle;
	-webkit-text-security:circle;
}
.login-space .group .label{
	color:#aaa;
	font-size:12px;
}
.login-space .group .button{
	background:#1161ee;
}
.login-space .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.login-space .group label .icon:before,
.login-space .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-space .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-space .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-space .group .check:checked + label{
	color:#fff;
}
.login-space .group .check:checked + label .icon{
	background:#1161ee;
}
.login-space .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-space .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-snip .sign-in:checked + .tab + .sign-up + .tab + .login-space .login{
	transform:rotate(0);
}
.login-snip .sign-up:checked + .tab + .login-space .sign-up-form{
	transform:rotate(0);
}

*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}


.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot{
	text-align:center;
}
.card{
	width: 500px;
	left: 100px;
}

::placeholder{
color: #b3b3b3;
} 
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class ="row">
	<div class="col-md-6 mx-auto p-0">
		<div class="card">
<div class="login-box">
	<div class="login-snip">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-space">
			<div class="login">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input"  placeholder="Enter your username">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" placeholder="Enter your password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot">
					<a href="#">Forgot Password?</a>
				</div>
			</div>
			<div class="sign-up-form">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" placeholder="Create your Username">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" placeholder="Create your password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password" placeholder="Repeat your password" >
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input" placeholder="Enter your email address">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot">
					<label for="tab-1">Already Member?</label>
				</div>
			</div>
		</div>
	</div>
</div>   
</div>
</div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
        let x = document.getElementById("0");
        let y = document.getElementById("1");

        function log(){
            x.classList.remove("visible");
            x.classList.add("invisible");
            y.classList.remove("invisible");
            y.classList.add("visible");
        }
        function reg(){
            x.classList.remove("invisible");
            x.classList.add("visible");
            y.classList.remove("visible");
            y.classList.add("invisible");
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>