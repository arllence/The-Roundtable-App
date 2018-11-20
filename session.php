<?php
include 'head.php';
include 'database.php';
?>

<div  style="border-top: 6px solid  #3b4b54; margin-top:20px;"></div>



<?php 
    
  $sql = "SELECT * FROM session ORDER BY id DESC";
  $res = mysqli_query($database, $sql) or die(mysqli_error($database));
  $posts = "";
  if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
      $id=$row['id'];
      $sesname=$row['sesname'];
      $title=$row['title'];
      $content=$row['content'];
      $date=$row['date'];



      $output=$content;
      $posts .="<div class=\"container\"><h2><a href='view_post.php?pid=$id' target='_blank'>$title</a></h2><h4>$date</h4><p>$output</p><br/><hr></div>";
    }
      
      
      
      
    echo "<div class=\"container\"><h2>Session name: $sesname</h2><hr></div>";
    echo $posts;
    
      
      
  }else{
    echo "There are no posts to display!";
  }
                    $filex = "pdf";
                    $sql = "SELECT * FROM data";
                    $result = mysqli_query($database, $sql) or die(mysqli_error($database));
                     while ($data = mysqli_fetch_assoc($result)){
                        //print_r($data);
                    echo "<div class='container' style='text-align:center'>";
                    echo "<h2>{$data['name']}</h2>";
                    echo "<img src = '{$data['img_dir']}' width ='40%'>";
                    echo "</div>";
                    }
      









if(isset($_POST['post'])){
//  $title=strip_tags($_POST['title']);
//  $content=strip_tags($_POST['content']);
  $title=($_POST['title']);
  $content=($_POST['content']);

  $title=mysqli_real_escape_string($database, $title);
  $content=mysqli_real_escape_string($database, $content);

  $date=date('l jS \of F Y h:i:s A');

  $sql="INSERT INTO session(title, content, date) VALUES ('$title', '$content', '$date')";

  if($title == "" || $content==""){
    echo "Please complete your post!";
    return;
  }
  mysqli_query($database, $sql);
  header("Location: session.php");
}
?>

<?php
if(isset($_POST['data'])){
   $file =$_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
 
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
  
   // print_r($fileExt);
    $picname = $fileExt[0];
    $picname = preg_replace("!-!","",$picname);
    $picname = ucwords($picname);
    //echo $fileExt[0];
    $allowed = array('jpg', 'jpeg','png', 'pdf','doc','docx');
  
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                 $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
       // $img_dir = $fileDestination;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                $sql = "INSERT IGNORE INTO data (name, img_dir) VALUES ('$picname','$fileDestination')";
               // mysqli_query($database, $sql); 
                mysqli_query($database,$sql) or die(mysqli_error);
    
                //header("Location: today.php?uploadsuccess");
              
            }else{
                echo "<div class='container'><p style='color=red'>Your file is too big!</p></div>";
            }
        }else{
            echo"<div class='container'><p style='color=red; text-align:center'>There was an error uploading the file</p></div>";
        }
    }else{
        echo "<div class='container'><p style='color=red'>You cannot upload files of this type!</p></div>";
    }
}
?>

<div id="login" class="post">
    <br><hr>
<form action="session.php" method="post" enctype="multipart/form-data">
    <h3>Post to Session</h3>
  <input placeholder="Title" type="text" name="title"  size="48.95" value=""><br/>
  <textarea placeholder="Content" name="content" rows="10" ></textarea><br/>
  <input type="submit" name="post" value="Post" id="submit">
</form>
</div>



<!--IMAGES $ PDF-->


<div id="loginl" class="post">
            <div class="container">
                <br>
             <form action="session.php" method="post" enctype="multipart/form-data">
                 <h3>Upload a file</h3>
            <input type="file" name="file">
            <input type="submit" name="data" value="Upload">
            </form>
                <br>
            </div> 
</div>




<br>
<?php
include 'footer.php';
?>