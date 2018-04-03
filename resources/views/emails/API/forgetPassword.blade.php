<!DOCTYPE html>
<html lang="en">
<head>
  <title>Answer ME : Reset Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="color:#343535">

<div class="container">

  <p>Hi {{$user->name}},</p>
  <p>In order to reset your password you should use this code in the application <b>{{$user->verificationCode}}</b> .</p>
</div>

</body>
</html>
