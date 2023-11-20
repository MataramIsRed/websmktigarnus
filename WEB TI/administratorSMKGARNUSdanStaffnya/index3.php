<form method="POST" enctype="multipart/form-data" action="login.php">
    <div class="form-group question">
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
            <h6 id="helpId" class="form-text">Username</h6>
            <input type="text" class="form-control question" name="username" id="username" aria-describedby="helpId" placeholder="admin">
            <br>
            <h6 id="helpId" class="form-text">Password</h6>
            <input type="password" class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="*****">

            <div class="form-check mt-2">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="" id="" value="SyaratKetentuan" checked>
                    Syarat & Ketentuan
                </label>
            </div>
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <input type="submit" name="login" value="Login" class="btn btn-primary buttontop">
                    <a href="#" type="submit" name="login" class="btn btn-primary buttontop">Registrasi</a>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="d-flex justify-content-center align-items-center mt-2">
                    <a align="center" href="#" style="color:#007bff;">Lupa Password</a>
                </div>
            </div>

    </div>
</form>