<?php
include 'head.php';
?>
    <section id="showcase">
        <div class="container">
                <h1>Easily share digital information among team members</h1>
                 <h2>
                     Indulge your Team.
                 </h2>
                 <br>
         <?php
                 if(!isset($_SESSION['u_email'])){
                     echo "
                         <p>
                            <a href='login.php' class='sign'>Log In</a>
                             &nbsp;&nbsp;
                            <a href='signup.php' class='sign'>Sign Up</a>
                         </p>
                     ";
                 }else{
                     echo "<div id='dots'><p>. . .</p></div>";
                     
                 }
                
         ?>
             </div>                      
    </section>
    <section id="contact">
        <div class="container">
            <br>
                <p>We'd love to hear from you.</p>
            <br><br>
            <p>
                <a href='#' class='sign'>Arrange Demo</a>
                     &nbsp; &nbsp;
                <a href='contact.php' class='sign'>Contact Us</a>
                    &nbsp; &nbsp;
                <a href='email.php' class='sign'>Email Us</a>
             </p>
             <br> <br>
        </div>
    </section>
    
        
<?php
    include 'footer.php';
?>
