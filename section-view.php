<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <?php 
        $id = $_GET['id'];
        $query = "SELECT * FROM sections WHERE section_id = '$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $section_name = $row['section_name'];

        
        ?>
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Grade 10 - <?php echo $section_name ?></strong> </h1>
            <a href="sections.php" class="btn btn-primary btn-sm">Back</a>
            <div class="row mt-2">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                    <div class="card-header">
                                        <div class="text-center">
                                            <?php 
                                            $fac = $con->query("SELECT * FROM signatory s INNER JOIN faculties f ON f.faculty_id = s.faculty_id INNER JOIN department d ON d.department_id = s.department_id INNER JOIN sections sec ON sec.section_id = s.section_id INNER JOIN designee des ON des.faculty_id = f.faculty_id WHERE s.department_id = '$id'");
                                            $fac_row = $fac->fetch_assoc();

                                            ?>
                                            <h3 class="mb-0"><?php echo $fac_row['first_name']." ".$fac_row['last_name']; ?></h3>
                                        </div>
                                    </div>
                                    <table class="table table-hover my-0" id="department">
                                        <thead>
                                            <tr>
                                                <th>Student ID</th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Gender</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $section_id = $_GET['id'];
                                            $query = "SELECT * FROM student WHERE section_id = '$section_id'";
                                            $result = mysqli_query($con, $query);
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<tr>';
                                                echo '<td>' . $row['student_id'] . '</td>';
                                                echo '<td>' . $row['last_name'] . '</td>';
                                                echo '<td>' . $row['first_name'] . '</td>';
                                                echo '<td>' . $row['gender'] . '</td>';
                                                echo '<td><a href="student-clearance.php?id=' . $row['student_id'] . '&section=' . $section_id . '" class="btn btn-primary">View Clearance Status</a></td>';
                                                echo '</tr>';
                                            }
                                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <?php include('includes/footer.php'); ?>
    <?php include('signatories-modal.php'); ?>
    <script>
        $(document).ready(function() {
            $('#department').DataTable();
        });

        $('#select_section').bind("change keyup", function() {
            // set the window's location property to the 
            // value of the option the user has selected
            window.location = $(this).val();
        });
    </script>