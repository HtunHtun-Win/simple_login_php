<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container-flude">
        <div class="row">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="/" class="h2 text-white">HomeScreen</a>
                            </div>
                            <div class="col-md-6">
                                <div class="float-end">
                                    <a href="/" class="btn btn-lg btn-primary"> &lt;&lt;Back </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <?php if(isset($_SESSION['errMsg'])): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Warning!</strong> Invalid Email or Password.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['errMsg']) ?>
                            <?php endif; ?>
                            <form action="_actions/login.php" method="post">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <div class="card-title">
                                            <h4 class="text-white">Login</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <?php if (isset($_GET['msg'])) : ?>
                                            <div class="alert alert-warning alert-dismissible">
                                                <strong>Warning!</strong> Invalid Email or Password!
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <Label>Email</Label>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <Label>Password</Label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-primary">Register</button>
                                        <span class="float-end">
                                            Don't you have an account?<a href="register.php"> Register here</a>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>