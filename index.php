<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=evice-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" /> -->
</head>

<body>
    <?php require_once 'process.php';?>
<?php 
if(isset($_SESSION['message'])):?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);

?>

</div>

<?php endif ?>
<div class="container"></div>

    <?php 
$con=mysqli_connect('localhost','root','','crud' );
    $result=$con->query("SELECT * from data") or
    die($con->error);
    ?>

<div class="row-cols-3 justify-content-center d-flex p-2">
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>

    <?php 
    while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['location'];?></td>
        <td><a href="index.php?edit=<?php echo $row['id'];?>"
    class="btn btn-info">Edit</a>
    <a href="index.php?delete=<?php echo $row['id'];?>"
    class="btn btn-danger">Delete</a>
</td>
    </tr>

<?php endwhile;?>
   
</table>


</div>

    <?php
    // pre_r($result);
    pre_r($result->fetch_assoc());
    function pre_r($array){
        echo"<pre>";
        print_r($array);
        echo"</pre>";
    }
    
    ?>
    <div class="row-cols-3 justify-content-center d-flex p-2">
        <form action="process.php" method="post">
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name" />
            </div>
            <div class="form-group">
                <label>Location</label>
                <input class="form-control" type="text" name="location" id="name" placeholder="Enter your location" />
            </div>
            <br />

            <div class="form-group">
                <button class="btn-btn-primary" name="save">Save</button>
            </div>
        </form>
    </div>
</body>

</html>