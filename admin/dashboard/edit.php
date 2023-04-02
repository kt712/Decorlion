<?php
include "db_conn.php";
$id =$_GET['id'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $title = $_POST['title'];
    $status = $_POST['status'];
    $role = $_POST['role'];

    $sql = "UPDATE `users` SET `name`='$name',`title`='$title',`status`='$status',`role`='$role' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=Updated successfully");
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootsrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Decorlion</title>

</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: skyblue;">
        Users Form
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php
        $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder=""
                        value="<?php echo $row['name']?>"> <br>
                    </div> 

                    <div class="col">
                        <label class="form-label">Title:</label>
                        <input type="text" class="form-control" name="title" placeholder="" 
                        value="<?php echo $row['title']?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Status:</label>
                        <input type="text" class="form-control" name="status" placeholder=""
                        value="<?php echo $row['status']?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Role:</label>
                        <input type="text" class="form-control" name="role" placeholder=""
                        value="<?php echo $row['role']?>">
                    </div>

                </div>
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>

            </form>
        </div>
    </div>
        

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>