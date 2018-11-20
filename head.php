<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Roundtable | Home</title>
    <?php session_start(); ?>
</head>

<body>
    <header>
        <div class="container">
            <h1 style="text-align:center">The Round-Table App</h1>
        </div>
            <div class="container">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>                
                    <li><a href="create.php">Create-Session</a></li>                
                    <li><a href="about.php">About</a></li>                
                </ul> 
                    <?php
                        if(isset($_SESSION['u_email'])){
                            echo '<div id="loginx"><form action="logout.inc.php" method="POST">
                              <input type="submit" name="submit" class="button_2" value="Logout"></form></div><br><br>';
                        }
?>
            </nav>
            </div>
    </header>