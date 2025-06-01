<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/stylelogin.css')); ?>">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            background-image: url('/images/bg.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>

    <!-- main container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100" id="cont">
        <!-- login container -->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!-- box kiri -->
            <div class="col-md-6 rounded-5 d-flex justify-content-center align-items-center flex-column left-box" style="background: white;">
                <div class="featured-image mb-3">
                    <img src="<?php echo e(asset('images/Logo.png')); ?>" class="img-fluid rounded-bottom-5" style="width: 250px;">
                </div>
                <p class="text-black fs-2" style="font-weight: 600; padding-top: 10px;">Welcome Back!</p>
            </div>  
            <!-- box kanan -->
            <div class="col-md-6">
                <div class="row align-items-center">
                    <div class="header-text mt-3 mb-3">
                        <h4>Login</h4>
                        <p>Enter your email and password</p>
                    </div>
                    <!-- tampilkan error login -->
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div><?php echo e($error); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('login.submit')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" required>
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Don't have an account? <a href="<?php echo e(route('register')); ?>">Sign Up</a></small>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\Tubes PAW\TUBES_PAW_KELOMPOK3\resources\views/auth/login.blade.php ENDPATH**/ ?>