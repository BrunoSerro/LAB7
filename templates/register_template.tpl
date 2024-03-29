<!DOCTYPE html>
<html lang="en">
<head>
  <title>REGISTER TEMPLATE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #d50000 ;
      color: #212121;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Nascido na Farmácia Franco!</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li class="active"><a href="register.php">Register</a></li>
      </ul>
    </div>
  </div>
</nav>

{if $isError == true }
  <div class="alert alert-danger">
    <p style="text-align: left">{$Error}</p>
  </div>
{/if}

<div class="container text-left">
  <div class="text text-center">
    <h1> <b> Register </b> </h1> 
  </div>

<form class="form-horizontal" action="register_action.php" method="POST">
  <div class="form-group">
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" style="width:100%" name="username" placeholder="" class="input-xlarge form-control" value="{$username}" required>
      </div>
    </div>
 
    <div class="form-group">
      <label class="control-label" for="email">Email</label>
      <div class="controls">
        <input type="text" id="email" style="width:100%" name="email" placeholder="" class="input-xlarge form-control" value="{$email}" required>
      </div>
    </div>
 
    <div class="form-group">
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" style="width:100%" name="password" placeholder="" class="input-xlarge form-control" value="{$password}" required>
      </div>
    </div>
 
    <div class="form-group">
      <label class="control-label"  for="password_confirm">Password confirmation</label>
      <div class="controls">
        <input type="password" id="password_confirm" style="width:100%" name="password_confirm" placeholder="" class="input-xlarge form-control" value="{$password_confirm}" required>
      </div>
    </div>

    <div class="form-group text-center">
      <button type="submit" name="submit" class="btn btn-danger"> Go</button>
      <button type="reset" name="reset" class="btn btn-default"> Clear</button>
    </div>
</form>

</div>
</div>
</div>

</body>
</html>