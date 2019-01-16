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
<div class="container mt-5">
    <div class="col-sm-8 offset-2">
    <form method="post" action="process.php" class="form">
        <label>Name</label><input class="form-control" type="text" name="name">
        <label>Email</label><input class="form-control" type="text" name="email">
        <label>Phone</label><input class="form-control" type="text" name="phone">
        <button id="btn" class="btn btn-primary form-control mt-3" type="submit">Send</button>
        <input type="hidden" name="hidden">
    </form>
    <br>
    <div id="error" class="text-center alert"></div>
    <hr>
    </div>
    <div class="col-sm-8 offset-2 mb-5">
        <form method="post" action="search.php" class="form2 form-inline">
            <label>Search</label>
            <input type="text" name="search" class="form-control" placeholder="Search for names">
            <button class="btn btn-primary">Search</button>
        </form>
    </div>
    <div class="col-sm-8 offset-2 mb-5" id="result  "></div>
    <div class="col-sm-8 offset-2">
        <button class="btn btn-primary form-control" id="usersBtn">View Users</button>
    </div>
    <div class="col-sm-8 offset-2">
        <div class="row text-center">
        <div class="col-sm-3">NAME</div>
        <div class="col-sm-3">EMAIL</div>
        <div class="col-sm-3">PHONE</div>
        <div class="col-sm-3">DELETE</div>
        </div>
        <hr>
    </div>
    <div class="col-sm-8 offset-2 pt-3" id="users">


    </div>
</div>
</body>
</html>
<script src="js/jquery.js"></script>
<script src="js/ajax.js"></script>