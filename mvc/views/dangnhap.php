
<?php require_once "./mvc/core/libs.php"; require_once "./mvc/core/route.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập Tài Khoản</title>
    <link rel="shortcut icon" href="<?php public_patch('images/favicon.ico.jpg') ?>" type="image/x-icon"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="<?php public_patch('css/bootstrap.min.css') ?>"> 
    <link rel="stylesheet" href="<?php public_patch('css/all.min.css') ?>"> 
    <link rel="stylesheet" href="<?php public_patch('css/style_register.css') ?>"> 
    <link rel="stylesheet" href="<?php public_patch('css/jquery-confirm.min.css') ?>">
</head>
<body background="<?php public_patch('images/login_register.jpg') ?>" style="background-size: cover">
    <div class="container">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">

                        <form action="<?php echo xulydangnhap ?>" class="card-body p-5 text-center" method="POST">

                            <h3 class="mb-5">Đăng Nhập</h3>

                            <div class="form-outline mb-4">
                                <input name="tendangnhap" type="text" class="form-control form-control-lg" placeholder="Đăng nhập" required/>
                            </div>

                            <div class="form-outline mb-4">
                                <input name ="matkhau" type="password" class="form-control form-control-lg" placeholder="Mật khẩu" required/>
                            </div>

                            <div class="form-check d-flex justify-content-start mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                <label class="form-check-label" for="form1Example3"> Ghi nhớ mật khẩu </label>
                                <p class="text-center"><a href="#" style="color: blue;"> Quên mật khẩu</a></p>
                            </div>
                            <?php if(isset($_COOKIE['message'])) {?>
                            <div class="alert alert-warning shadow-sm" role="alert">
                                <?php echo $_COOKIE['message']; ?>
                            </div>
                            <?php }?>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            
                            <hr class="my-4">
                            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Đăng nhập với Google</button>
                            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="submit"><i class="fab fa-facebook-f me-2"></i> Đăng nhập với Facebook</button>
                        </form>
                    
                        <p class="t1 text-center" >Bạn chưa có tài khoản?<a href="<?php echo dangky ?>" style="color: blue; "> Đăng ký</a></p> 
                        <p class="t1 text-center"><a class="text-dark" href="<?php echo APP_URL ?>"><i class="fas fa-home"></i> Trở về Trang Chủ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--container end.//--> 
<script src="<?php public_patch('js/jquery-3.5.1.min.js') ?>"></script> 
<script src="<?php public_patch('js/popper.min.js"') ?>"></script>
<script src="<?php public_patch('js/bootstrap.min.js') ?>"></script> 
<script src="<?php public_patch('js/jquery-confirm.min.js') ?>"></script> 
</body>
</html>

