<?php require "includes/db_config.php" ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">REGISTER NOW</h1>
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3">
            <form class="register" method="post" action="includes/register.inc.php">
                <div class="form-group">
                    <label for="username">Username: </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="picture" name="picture">
                    <label class="custom-file-label"  for="picture">Choose Picture</label>
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    <small id="passwordInfo" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="passwordCheck">Password Check: </label>
                    <input type="password" class="form-control" id="passwordCheck" name="passwordCheck" placeholder="Repeat Password">
                    <small id="passwordCheckInfo" class="form-text"></small>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3 alert mt-3" id="error"></div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/ajax.js"></script>
</body>
</html>