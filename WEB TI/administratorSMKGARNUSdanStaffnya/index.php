<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="Logo.png" type="image" />
    <link rel="stylesheet" href="asset/css/stylesheet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>

        .border{
            border-style: solid;
            border-radius: 64px;
            max-width: 960px;
        }
        .border-1{
            border-color:transparent;
            border-style: solid;
            border-radius: 32px;
            background: white;
        }
        .border-x{
            border-color:transparent;
            border-style: solid;
            background: white;
        }
        .border-x1{
            border-color:transparent;
            border-radius: 6px;
            border-style: solid;
            background: white;
        }
        .border-o{
            background: linear-gradient(rgba(13, 138, 247, 0.67), rgba(247, 229, 13, 0.8)), url("carousel-1.jpg");
            background-size: cover;
            background-position: relative;
            border-color:transparent;
            border-style: solid;
            border-width: 0px;
            min-width: fit-content;
            border-radius: 32px;
            width: 800px;
            
           
        }
        .border-i{
            background: linear-gradient(rgba(13, 138, 247, 0.67), rgba(247, 229, 13, 0.8)), url("carousel-1.jpg");
            background-size: cover;
            background-position: relative;
            border-color:transparent;
            border-style: solid;
            border-width: 0px;
            min-width: fit-content;
           
        }
        .hide{
            overflow: hidden;
        }
        .transition{
            opacity: 0;
	        transition:all .4s linear;
        }
        .transition2{
            opacity: 1;
            transition:all .4s linear;
        }
        .invisible{
            opacity:0;
        }
        .border-i{
            background: linear-gradient(rgba(197, 207, 215, 0.67), rgba(5, 57, 163, 0.8));
            background-size: cover;
        }
        .field i{
    position: absolute;
    right: 15px;
    color: #ccc;
    top: 70%;
    transform: translateY(-50%);
    cursor: pointer;
    }
    .field i.active::before{
    color: #333;
    content: "\f070";
}
.text-a{
    color: black;
}
    </style>
    
  </head>
  <body>
    <div class="mt-5 container d-flex justify-content-center align-items-left mb-5">
        <div class="border-o p-3 d-flex justify-content-center flex-column align-items-center">
                <div class="btn-toolbar" role="toolbar" aria-label="">
                    <div class="btn-group" role="group" aria-label="">
                        <button onclick="log()" id="login" type="button" class="btn  btn-light btn-lg rounded-left" >LOGIN</button>
                        <button onclick="reg()" id="registrasi" type="button" class="btn btn-outline-light btn-lg rounded-right" data-toggle="modal" data-target="#modelId">SIGNUP</button>
                    </div>
                </div>

            <!-- Button trigger modal -->
            
            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content p-1 border-i">
                        <div class="modal-header rounded border-x">
                            <h5 class="modal-title">Registrasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <div class="border-x1 px-3">
                                <form action="registrasi.php" method="POST">
                        <div>
                            <input type="text" class="form-control input my-4" placeholder="Kode Unik(Nis, Kode Pengajar, dll)" class="input" name="nis" required>
                        </div>
                        <div>
                            <input type="text" class="form-control input my-4" placeholder="Masukkan Username" class="input" name="username" required>
                        </div>
                        <div class="form-group">
                          <select name="role" class="custom-select">
                            <option>-Pilih Role-</option>
                            <option>Pengajar</option>
                            <option>Pelajar</option>
                            <option>Staff</option>
                          </select>                        
                        </div>
                        <div class="input-group my-4">
                            <input name="pass" type="password" value="" class="input form-control " id="password0" placeholder="Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="password_show_hide0();">
                            <i class="fas fa-eye" id="show_eye0"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye0"></i>
                            </span>
                        </div>
                        </div>
                        <div class="input-group my-4">
                            <input name="kpass" type="password" value="" class="input form-control " id="password1" placeholder="Konfirmasi Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="password_show_hide1();">
                            <i class="fas fa-eye" id="show_eye1"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye1"></i>
                            </span>
                        </div>
                        </div>
                        <div class="pb-5 d-flex justify-content-center align-items-center"><input type="submit" name="registrasi" value="Registrasi" class="btn btn-primary my-1"></div>
                        
                    </form>
                            </div>
                        
                        </div>
                        <div class="modal-footer border-x rounded">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 container  d-flex justify-content-center align-items-center">
                <div id="p" class="visible fadeIn">
                  <div class="card-body">
                    <div class="form-content border-1 p-5 col-xl-12">
                  <h4 align="center" class="card-title">LOGIN</h4>
                    <form action="login.php" class="position-relative" method="POST">
                        <div>
                            <input type="text" class="form-control input my-4" placeholder="Username" class="input" name="username" required>
                        </div>
                        <div class="input-group my-4">
                            <input name="pass" type="password" value="" class="input form-control " id="password" placeholder="Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                        <div class="input-group-append">
                            <span class="input-group-text" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                            </span>
                        </div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center"><input type="submit" name="login" value="Login" class="btn btn-primary my-1"></div>
                        
                    </form>
                    <div class="d-flex justify-content-center align-items-center"><a href="#" class="form-link forgot-pass">Forgot password?</a></div>
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
        function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
        function password_show_hide0() {
  var x = document.getElementById("password0");
  var show_eye = document.getElementById("show_eye0");
  var hide_eye = document.getElementById("hide_eye0");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
        function password_show_hide1() {
  var x = document.getElementById("password1");
  var show_eye = document.getElementById("show_eye1");
  var hide_eye = document.getElementById("hide_eye1");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
        function show() {
            var x = document.getElementById("password");
            var y = document.getElementById("togglePassword");
            if (x.type === "password") {
                x.type = "text";
                y.classList.toggle()
                
            } else {
                x.type = "password";
            }
            }
    </script>
    <Script src="asset/js/btn-login.js"></script>
    <script src="asset/js/pass-showhide.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>