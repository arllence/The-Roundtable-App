<?php
include 'head.php';
include 'database.php';
?>

<div  style="border-top: 6px solid  #3b4b54; margin-top:20px;"></div>

<section id="login">
<div class="container">
    <form action="createses.php" method="post">
        <h3>Create Session</h3>
        <input type="text" name="sesname" placeholder="Enter Session Name"><br>
        <input type="submit" name="submit" value="Create">
    </form>
</div>
</section>
<br>

<?php
if(isset($_POST['submit'])){
        $sesname = mysqli_real_escape_string($database,$_POST['sesname']);
        

    $sql ="CREATE TABLE session (id INT AUTO_INCREMENT PRIMARY KEY, sesname VARCHAR(100), title VARCHAR(100), content VARCHAR(100), date VARCHAR(100))";
    $res = mysqli_query($database, $sql) or die(mysqli_error($database));
    $sql = "INSERT INTO session (sesname) VALUES ('$sesname')";
    $res = mysqli_query($database, $sql) or die(mysqli_error($database));
    $sql = "CREATE TABLE data (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), img_dir VARCHAR(255))";
    $res = mysqli_query($database, $sql) or die(mysqli_error($database));
        
    
echo '<section id="create">
<div class="container">
    <br>
    <h2><a href="session.php">Start Session</a></h2><br>
</div>
</section>';
    }

?>




<?php
include 'footer.php';
?>