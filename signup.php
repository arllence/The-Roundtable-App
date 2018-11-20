<?php
include 'head.php';
?>

<div  style="border-top: 6px solid  #3b4b54; margin-top:20px;"></div>

<section id="login">
<div id="container">

<form action="post.php" method="post">
  <h1>Create an Account</h1>
<input type="text" name="fname" placeholder="First Name"><br>
<input type="text" name="lname" placeholder="Last Name"><br>
<input type="email" name="email" placeholder="Email"><br>
<input type="password" name="pass" placeholder="Password"><br>
<input type="submit" name="submit" value="Sign Up">
</form>
<br>
    <p> Already a member? <a href="login.php"><strong>Sign In</strong></a></p>
</div>
</section>
<br>
<?php
include 'footer.php';
?>