<?php
include "_actions/auth.php";
include "_actions/connect.php";

$editFormState = false;
if (isset($_GET['id'])) {
    $editFormState = true;
    $editID = $_GET['id'];
    $editSql = "select * from users where id=$editID";
    $sqlData = $db->query($editSql);
    $userInfo = $sqlData->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container-flude">
        <div class="row">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="text-white">AdminDashboard</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="float-end">
                                    <a href="_actions/logout.php" class="btn btn-lg btn-primary" onclick="return confirm('Are you sure?')">
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4>User Info</h4>
                                    <div>
                                        Role: <span class="badge text-bg-primary"><?php echo $_SESSION['user']['role']; ?></span>
                                    </div>
                                    <div>
                                        Name: <?php echo $_SESSION['user']['name']; ?>
                                    </div>
                                    <div>
                                        Email: <?php echo $_SESSION['user']['email']; ?>
                                    </div>
                                    <div>
                                        Address: <?php echo $_SESSION['user']['address']; ?>
                                    </div>
                                    <a href="user-dashboard.php?id=<?= $_SESSION['user']['id'] ?>" class="btn btn-primary btn-sm">Edit Info</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <?php if ($editFormState) : ?>
                                <div class="card mt-3">
                                    <form action="_actions/update.php" method="post">
                                        <div class="card-header">
                                            <h4>
                                                Edit form
                                                <a href="admin-dashboard.php" class="btn btn-close float-end"></a>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" name='id' value="<?= $userInfo['id'] ?>">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" class="form-control" value="<?= $userInfo['name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" class="form-control" value="<?= $userInfo['email'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <textarea type="text" name="address" class="form-control">
                                                    <?= $userInfo['address']; ?>
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="text" name="password" class="form-control">
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary float-end">Update</button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
</body>

</html>