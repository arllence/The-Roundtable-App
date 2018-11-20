<?php
include 'head.php';
include 'database.php';
?>

<div  style="border-top: 6px solid  #3b4b54; margin-top:20px;"></div>

<section id="create">
<div class="container">
    <br>
    <h2>All your data will be deleted! Continue?</h2><br>
    <section id="login">
<div class="container">
    <form action="endses.php" method="post">
        <input type="submit" name="submit" value="End Session">
    </form>
</div>
</section>
</div>
</section>
<br>

<?php
if(isset($_POST['submit'])){
    $sql = "DROP TABLE session";
    $res = mysqli_query($database, $sql) or die(mysqli_error($database));
    $sql = "DROP TABLE data";
    $res = mysqli_query($database, $sql) or die(mysqli_error($database));
    header('Location: index.php');
}
?>



<?php
include 'footer.php';
?>