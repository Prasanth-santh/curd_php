<?php
if(isset($_GET['del'])){
    $id=$_GET['del'];
    require_once "database.php";
    $sql="DELETE FROM user_details WHERE id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res){
        header("Location:index.php");
    }
    else{
        die("something went wrong");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div>
        <h1 >CURD APPLICATION</h1>   
    </div>
    <div class="detail">
            <h2>DETAILS ADD</h2>
            <a href="./crud_ae.php"><button><i class="fa-solid fa-plus"></i></button></a>
    </div>
    <table class="table">
                <thead>
                    <tr>
                        <th>SI</th>
                        <th>User Name</th>
                        <th> Email </th>
                        <th> Mobile </th>
                        <th> Action </th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require_once "database.php";
                    $sql="SELECT * FROM user_details";
                    $result=mysqli_query($conn,$sql);
                    $id=1;
                    while ($row=mysqli_fetch_array($result)) {
                    $uid=$row['id'];
                    $name=$row['username'];
                    $email=$row['email'];
                    $mobile=$row['mobile'];
                    
                    ?>
                    <tr>
                        <td><?php echo $id?></td>
                        <td><?php echo $name?></td>
                        <td><?php echo $email?></td>
                        <td><?php echo $mobile?></td>
                        <td><button class="btn btn-success"><a href='crud_ae.php?id=<?php echo $uid?>'>edit</a></button>
                        <button class="btn btn-danger"><a href='index.php?del=<?php echo $uid?>'>Remove</a></button></td>
                    </tr>
                    <?php $id++; } ?>
                </tbody>
    </table>
</body>
</html>