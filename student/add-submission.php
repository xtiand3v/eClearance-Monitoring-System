<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<?php 
$id = $_SESSION['user']; 
$stmt = mysqli_query($con,"SELECT * FROM student WHERE student_id = '$id'");
$row = mysqli_fetch_array($stmt);
?>
<div class="main" style="background: url(../src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Add Submission</strong> </h1>

            <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                        <div class="card flex-fill p-3">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group mt-4">
                                                    <label for="name">Submission</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="submission" placeholder="Ex. Links/Remarks/ etc." required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Add File/Docs</label>
                                                    <div class="d-flex">
                                                        <input type="file" class="form-control w-50" id="name" name="docs">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group mt-5">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>

        </div>
    </main>
    <?php include('includes/footer.php'); ?>
    <?php 
    if(isset($_POST['submit'])){
        $docs = $_FILES['docs']['name'];
        $tmp_name = $_FILES['docs']['tmp_name'];
        $path = "uploads/".$docs;
        $student_id = $_SESSION['user'];
        $submit = $_POST['submission'];
        $clearance_id = $_GET['id'];
        $select = mysqli_query($con,"SELECT * FROM submission WHERE clearance_id = '$clearance_id'");
        if(mysqli_num_rows($select) > 0){
            echo "<script>alert('You have already submitted this clearance')</script>";
        }else{

        move_uploaded_file($tmp_name, $path);
        $stmt = mysqli_query($con,"INSERT INTO submission(clearance_id,student_id,submitted,docs,submit_date) VALUES('$clearance_id','$id','$submit','$path',NOW())");
        if($stmt){
            
            echo "<script>alert('Submission Added Successfully');</script>";
        } else {
            echo "<script>alert('Submission Failed');</script>";
        }
    }
    }
    ?>