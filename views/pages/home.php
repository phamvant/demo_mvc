<?php 
include_once './helpers/session_helper.php'; 
?>

<link rel="stylesheet" href="../../assets/home/styles.css" type="text/css">
</head>
  <body>
<div class="container">
  <a href="index.php?controller=pages&action=login" class="btn">
  <svg width="277" height="62">
    <defs>
        <linearGradient id="grad1">
            <stop offset="0%" stop-color="#FF8282"/>
            <stop offset="100%" stop-color="#E178ED" />
        </linearGradient>
    </defs>
     <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
  </svg>
  <!--<span>Voir mes réalisations</span>-->
    <!-- <span>Welcome in my world</span> -->
<<<<<<< HEAD
    <span id="index-text">Welcome <?php if(isset($_SESSION['usersId'])){
=======
    <span id="index-text">Welcome <?php if(isset($_SESSION['usersId'])){
>>>>>>> 736f9becb5e1d22259b9bb03a48cf3d39b4eb727
        echo explode(" ", $_SESSION['usersName'])[0];
    }else{
        echo 'Guest';
    } 
    ?> </span>
</a>
</div>
