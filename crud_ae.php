<?php
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    require_once "database.php";
    $sql="SELECT * FROM user_details WHERE id='$id'";
    $res=mysqli_query($conn,$sql)->fetch_assoc(); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<h1>Curd Application</h1>
    <div class="overall">
        <?php
        require_once "database.php";
        if(isset($_POST["submit"])){
            $name=$_POST["uname"];
            $email=$_POST["email"];
            $mobile=$_POST["mobile"];

            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $sql="UPDATE user_details SET username='$name',email='$email',mobile='$mobile' WHERE id='$id'";
                $result=mysqli_query($conn,$sql);
                if($result){
                    header("Location:index.php");
                }
                else{
                    die("something went wrong");
                }
            }
            $errors=array();
            
            if(empty($name) || empty($email) || empty($mobile)){
                array_push($errors,"All fields are required");
            }
            $sql="SELECT * FROM user_details WHERE username='$name'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($result);
            if($row>0){
                array_push($errors,"Name is already exist");
            }
            $sql="SELECT * FROM user_details WHERE email='$email'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($result);
            if($row>0){
                array_push($errors,"Email is already exist");
            }
            $sql="SELECT * FROM user_details WHERE mobile='$mobile'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($result);
            if($row>0){
                array_push($errors,"Name is already exist");
            }
            if(count($errors)>0){
                foreach($errors as $error){
                    echo "<div class='alert'>$error</div>";
                }
            }
            else{
            require_once "database.php";
            $sql="INSERT INTO user_details (username,email,mobile) VALUES ('$name','$email','$mobile')";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo "Data has been recorded";  
                header("Location:index.php");  
            }
            else{
                die("something went wrong");
            }
        }

        }
        
        ?>
        <h2>User details</h2>
        <form action="" method="post">
            <label> Name :</label><br/>
            <input type="text" name="uname" placeholder="Enter your name" id="uname" value="<?php echo isset($_GET['id']) ? $res['username'] : ""?>"><br/>
            <label> Email :</label><br/>
            <input type="text" name="email" placeholder="Enter your email" id="email" value="<?php echo isset($_GET['id']) ? $res['email'] : ""?>"><br/>
            <label> Mobile no:</label><br/>
            <input type="text" name="mobile" placeholder="Enter your mobile no" id="mobile" value="<?php echo isset($_GET['id']) ? $res['mobile'] : ""?>"><br/>
            <input type="submit" name="submit" value="Submit" id="button">
        </form>
    </div>
</body>
</html>