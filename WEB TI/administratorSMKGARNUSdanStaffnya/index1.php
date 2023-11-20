<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
    .border {
        border-radius: 12px;
        border-color: #007bff;
        border-style: dashed;
    }

    #login {
        left: 0;
    }

    #mom {
        overflow: hidden;
    }
</style>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container-sm  mt-sm-5 py-5 d-flex justify-content-evenly">
            <div class="col-sm-4 border p-5 d-flex justify-content-evenly">
                <form method="POST" enctype="multipart/form-data" action="login.php">
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group ">
                        <input type="radio" class="btn-check" name="btnradio" id="btncheck1" autocomplete="off" checked onclick="log()">
                        <label class="btn btn-outline-primary" for="btncheck1">Login</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btncheck3" autocomplete="off" onclick="reg()">
                        <label class="btn btn-outline-primary" for="btncheck3">Signup</label>
                    </div>
                    <div id="login" class="form-group question">
                        <h1 id="kon">LOGIN</h1>
                        <br>
                        <?php
                        if (isset($_GET['error'])) {
                        ?>
                            <div class="container">
                                <div class="text-danger d-flex justify-content-between align-items-center mt-2">
                                    <h6>
                                        <?php
                                        echo $_GET['error'];
                                        ?>
                                    </h6>
                                </div>
                            <?php
                        }
                            ?>
                            </div>
                            <input type="text" class="form-control question mt-4" name="username" id="username" aria-describedby="helpId" placeholder="Username">
                            <br>
                            <input type="password" class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="Password">
                            <br>

                            <div class="d-grid gap-2">
                                <input type="submit" name="login" value="Login" class="btn btn-primary buttontop">
                            </div>

                            <br>
                            <div class="container">
                                <div class="d-flex justify-content-center align-items-center mt-2">
                                    <a align="center" href="#" style="color:#007bff;">Lupa Password</a>
                                </div>
                            </div>
                    </div>
                </form>
                <form id="mom" method="POST" enctype="multipart/form-data" action="login.php" onclick="mem()">
                    <div class="form-group question">
                        <h1>REGISTRASI</h1>
                    </div>
                    <h6 id="helpId" class="form-text">Masukkan Username</h6>
                    <input type="text" class="form-control question" name="username" id="username" aria-describedby="helpId" placeholder="admin">
                    <br>
                    <h6 id="helpId" class="form-text">Masukkan Password</h6>
                    <input type="password" class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="*****">
                    <h6 id="helpId" class="form-text">Konfirmasi Password</h6>
                    <input type="password" class="form-control" name="konpass" id="pass" aria-describedby="helpId" placeholder="*****">
                    <div class="form-check mt-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="" id="" value="SyaratKetentuan" unchecked>
                            Syarat & Ketentuan
                        </label>
                    </div>
                    <div class="container">
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <a href="#" type="submit" name="login" class="btn btn-primary buttontop">Registrasi</a>
                        </div>
                    </div>
                    <br>

            </div>
            </form>
            <div class="col-sm-4">
            </div>
        </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

<script>
    let x = document.getElementById("kon");
    let y = documen.getElementById("mem");

    function log() {
        x.innerHTML = "Konntol";
    }

    function reg() {
        x.innerHTML = "Memek";
    }
</script>

</html>