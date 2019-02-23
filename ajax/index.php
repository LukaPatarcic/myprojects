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
        <small class="text-muted">Only letters(2-20 characters)</small><br>
        <label>Email</label><input class="form-control" type="text" name="email">
        <small class="text-muted">Enter a valid email</small><br>
        <label>Phone</label><input class="form-control" type="text" name="phone">
        <small class="text-muted">Only numbers and - / chars</small><br>
        <button id="btn" class="btn btn-primary form-control mt-3" type="submit">Send</button>
        <input type="hidden" name="hidden">
    </form>
    <br>
    <div id="error" class="text-center alert"></div>
    <hr>
    </div>
    <div class="col-sm-8 offset-2 mb-5">
        <form method="post" action="search.php" class="form2">
            <label>Search</label>
            <input type="text" name="search" class="form-control" placeholder="Search for names or emails" id="search">
        </form>
    </div>
    <!--<div class="col-sm-8 offset-2 mb-5" id="result"></div>
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
    </div>-->
    <div class="col-sm-8 offset-2 pt-3" id="users"></div>
    <div class="row">
        <div class="col-sm-1">
            <span class="text-center text-primary" id="result"></span>
        </div>
        <div class="col-sm-2">
            <button class="btn btn-primary" id="RDND">RDND</button>
        </div>
        <div class="col-sm-4">
            <input type="text" name="number" class="form-control" id="number">
        </div>
    </div>
</div>


</body>
</html>
<script src="js/jquery.js"></script>
<script>
    $(document).ready(function () {
        $('#RDND').click(function () {
            var number = $('#number').val();
            var random = (Math.floor(Math.random()+1));
            var difference = $('#result').val();
            console.log(random);
            $('#result').text(random*number);
        })
    })
</script>
<script src="js/bootstrap.js"></script>
<script src="js/ajax.js"></script>