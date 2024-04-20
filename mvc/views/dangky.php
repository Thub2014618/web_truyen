<?php require_once "./mvc/core/libs.php"; require_once "./mvc/core/route.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng Ký Tài Khoản</title>
    <link rel="shortcut icon" href="<?php public_patch('images/favicon.ico.jpg') ?>" type="image/x-icon"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="<?php public_patch('css/bootstrap.min.css') ?>"> 
    <link rel="stylesheet" href="<?php public_patch('css/all.min.css') ?>"> 
    <link rel="stylesheet" href="<?php public_patch('css/style_register.css') ?>"> 
    <link rel="stylesheet" href="<?php public_patch('css/jquery-confirm.min.css') ?>">
</head>
<body background="<?php public_patch('images/login_register.jpg') ?>" style="background-size: cover">
    <div class="container mt-5"> 
        <div class="card bg-light m-auto" style="max-width: 400px; border-radius: 1rem;"> 
            <article class="card-body mx-auto" > 
                <h4 class="t1 card-title mt-3 text-center">Tạo Tài Khoản</h4> 
                <p class="t1 text-center">Bắt đầu tạo tài khoản miễn phí</p> 
                <p>
                    <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="submit"><i class="fab fa-google me-2"></i> Đăng nhập với Google</button>
                    <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="submit"><i class="fab fa-facebook-f me-2"></i> Đăng nhập với Facebook</button>
                </p> 
                <p class="divider-text"><span class="bg-light rounded-circle"><b>Hoặc</b></span></p> 
                
                <form action="<?php echo xulydangky; ?>" method="POST"> 
                            
                    <div class="form-group input-group position-relative"> 
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span> 
                        </div>
                        <input id="check_user" name="tendangnhap" class="form-control" placeholder="Tên đăng nhập" type="text" maxlength="50" required> 
                    </div> 
                    <div class="form-group input-group"> 
                        <div class="input-group-prepend"> 
                            <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                        </div>
                        <input id="pass" name="matkhau" class="form-control" placeholder="Mật khấu" type="password" maxlength="50" required> 
                    </div> 
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                        </div>
                        <input id="re_pass" name="nhaplaimatkhau" class="form-control" placeholder= "Nhập lại mật khẩu" type="password" maxlength="50" required> 
                    </div> 
                    <?php if(isset($_COOKIE['message'])) {?>
                        <div class="alert alert-warning shadow-sm" role="alert">
                            <?php echo $_COOKIE['message']; ?>
                        </div>
                    <?php }?>
                    <div class="form-group"> 
                        <button name="CreateAccount"  type="submit" class="btn btn-primary btn-block" ><i class="fas fa-user-plus"></i> Tạo Tài Khoản</button> 
                    </div>
                   
                    <p class="t1 text-center" >Bạn đã có tài khoản?<a href="<?php echo dangnhap ?>" style="color: blue; "> Đăng nhập</a></p> 
                    <p class="t1 text-center"><a class="text-dark" href="<?php echo APP_URL ?>"><i class="fas fa-home"></i> Trở về Trang Chủ</a></p>
                </form>
            </article> 
        </div> 
    </div> 

    <script src="<?php public_patch('js/jquery-3.5.1.min.js') ?>"></script> 
    <script src="<?php public_patch('js/popper.min.js"') ?>"></script>
    <script src="<?php public_patch('js/bootstrap.min.js') ?>"></script> 
    <script src="<?php public_patch('js/jquery-confirm.min.js') ?>"></script> 
      
        <?php 
            if(isset($_COOKIE['error_message'])){
                echo '<script type-"text/javascript">Error("'.$_COOKIE["error_message"].'")</script>';
            }
        ?>
</body>
</html>

