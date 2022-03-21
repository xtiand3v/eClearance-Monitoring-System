<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); 
        $error = "";?>
<div class="main">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">
            <?php 
            $id = $_GET['id'];
            $stmt = mysqli_query($con,"SELECT * FROM sections WHERE section_id = '$id'");
            $row = mysqli_fetch_array($stmt);
            if(isset($_GET['id'])){
                ?>
                
            <h1 class="h3 mb-3"><strong>Add Requirements for Section <?php echo $row['section_name']; ?></strong> </h1>
                <?php
            } else {
                ?>
                <h1 class="h3 mb-3"><strong>Add Requirement</strong> </h1>

                <?php
            }
            
            ?>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                    <form method="POST">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group mt-4">
                                                    <p><?php echo $error; ?></p>
                                                    <label for="name">Lacking Requirement</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="req" placeholder="Ex. Projects,Quiz,Exam etc." required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Remarks</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="remarks" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Deadline</label>
                                                    <div class="d-flex">
                                                        <input type="date" class="form-control w-50" id="name" name="deadline" required>
                                                </div>
                                                </div>
                                                
                                                <div class="form-group mt-5">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="sections.php?id=<?php echo $id; ?>" class="btn btn-primary">Back</a>
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
    if (isset($_POST['submit'])) {
        $req = $_POST['req'];
        $remarks = $_POST['remarks'];
        $deadline = $_POST['deadline'];
        $sec = $_GET['id'];
        $search = mysqli_query($con, "SELECT * FROM student WHERE section_id = '$sec'");
        while($get = mysqli_fetch_array($search)){
        $sig = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM signatory WHERE section_id = '$sec'"));
        $dept_id = $sig['department_id'];
        $id = $get['student_id'];
        foreach ((array)$id as $ids) {
            $insert = mysqli_query($con, "INSERT INTO clearances(student_id,department_id,status,requirement,remarks,deadline,added) VALUES ('$ids','$dept_id','0','$req','$remarks','$deadline',NOW())");
            if ($insert) {
                    echo '<script>alert("Requirement added!");</script>';
                    echo '<script>window.location.href="section-view.php?id=' . $sec . '";</script>';
                } else {
                    echo '<script>alert("Error!");</script>';
                    $error = "".mysqli_error($con);
                }
        }
    }
    }
    ?>