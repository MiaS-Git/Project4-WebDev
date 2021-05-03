<?php 
    include('config.php'); 
    include('create_table.php');    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>About</title>
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:900|Merriweather&display=swap" rel="stylesheet"> 
  <link href="css/styles.css" rel="stylesheet">
</head>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: white;
}

.topnav a {
  float: right;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: right;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>
<body>
<div class="topnav">
  <a href="login.php">Login</a>
  <a href="register.php">Sign Up</a>
</div>

<div style="padding-left:16px">

</div>

  <main>
    <header class="main__hero">
      <h1>Car Rental Service</h1>
    </header>
    <section id="section1" data-nav="Section 1">
      <div class="landing__container">
        <h2>About:</h2>
        <p>This service allows you to browse through cars we have available to rent for as long as you need. First you should either sign up or login to your existing account where you can rent which ever car you want, along with a prepay-parking feature where you can pay for parking before you arrive to your destination without any hassle.</p>
	<p>For this project we used html and css for the client end. As for more for the backend, we used javascript for the responsive elements such as the prices and the checkout page, and php for connecting the user info to the database.
      </div>
    </section>
    <section id="section2" data-nav="Section 2">
      <div class="landing__container">
        <h2>Section 2</h2>
        <p></p>

        <p>Mia Stroud: Pre-Pay parking page</p>
	<p>Alexandre Geraldo: Cart/Checkout page</p>
	<p>Vera Agyiri: Database setup/connection</p>
	<p>Naima Mohamed: Rental Page</p>
	<p>Tanjina Salam: Landing/profile(registration) pages</p>
      </div>
    </section>

      </div>
    </section>
  </main>
  <footer class="page__footer">
  </footer>

  <script src="js/app.js"></script>
</body>
</html>