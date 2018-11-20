<?php
include 'head.php';
?>


    <div  style="border-top: 6px solid  #3b4b54; margin-top:20px;"></div>
<section id="login">
    <div class="container">
        <form action="login.inc.php" method="post">
        <h1>Log In</h1>
        <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="submit" value="Log In">
</form>
    <br>
    <p> Not a member? <a href="signup.php">Sign Up</a></p>
</div>
</section>
<br>
<?php
include 'footer.php';
?>