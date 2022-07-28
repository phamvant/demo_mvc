<?php 
include_once './helpers/session_helper.php'; 
?>

<link rel="stylesheet" href="../../assets/login/styles.css" type="text/css">
</head>
  <body>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1" />

<!-- ------------------------------------Navigation----------------------------------- -->

<nav id="nav" role="navigation"> <a href="#nav" title="Show navigation">Show navigation</a> <a href="#" title="Hide navigation">Hide navigation</a>
      <ul class="clearfix">
    <li><a href="index.php">Home</a></li>
    <li> <a href="/index.php?controller=pages&action=signup">Sign up</a>
        </li>
    <li> <a href="./controllers/UsersController.php?q=logout">Logout</a>
        </li>
    <li><a href="">About</a></li>
  </ul>
</nav>

<!-- ------------------------------------Scripts----------------------------------- -->

  
<script src="http://osvaldas.info/examples/main.js"></script>

<script src="http://osvaldas.info/examples/drop-down-navigation-touch-friendly-and-responsive/doubletaptogo.js"></script> 
  
<script>
	$( function()
	{
		$( '#nav li:has(ul)' ).doubleTapToGo();
	});
</script>

<!-- ------------------------------------Main----------------------------------- -->

    <div class="login-box">
    <h2>Login</h2>
    <form method="post" action="./controllers/UsersController.php">
        <div class="user-box">
        <input type="hidden" name="type" value="register">
        <input type="text" name="usersName" required="">
        <label>FullName</label>
        </div>
        <div class="user-box">
        <input type="text" name="usersEmail" required="">
        <label>Email</label>
        </div>
        <div class="user-box">
        <input type="text" name="usersUid" required="">
        <label>Username</label>
        </div>
        <div class="user-box">
        <input type="password" name="usersPwd" required="">
        <label>Password</label>
        </div>
        <div class="user-box">
        <input type="password" name="pwdRepeat" required="">
        <label>Password</label>
        </div>
        <button type="submit" name="submit">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Submit
        </button>
    </form>
    </div>