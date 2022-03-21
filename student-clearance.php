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
        $sec = $_GET['section'];
        $query = "SELECT * FROM student WHERE student_id = '$id'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $student = $row['first_name'] . ' ' . $row['last_name'];

        
        ?>
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Clearance - <?php echo $student; ?></strong> </h1>
            <a href="section-view.php?id=<?php echo $sec; ?>" class="btn btn-primary btn-sm">Back</a>
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
                                                <th>Subject</th>
                                                <th>Teacher</th>
                                                <th>Lacking Requirement</th>
                                                <th>Remarks</th>
                                                <th>Deadline</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $section_id = $_GET['section'];
                                            $query = "SELECT * FROM signatory s INNER JOIN sections sec ON sec.section_id = s.section_id INNER JOIN department d ON d.department_id = s.department_id INNER JOIN faculties f ON f.faculty_id = s.faculty_id WHERE s.section_id = '$section_id'";
                                            $result = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $teacher_id = $row['faculty_id'];
                                                $subject = $row['department_name'];
                                                $dept_id = $row['department_id'];
                                                $teacher = $row['first_name'] . ' ' . $row['last_name'];
                                                $get = mysqli_query($con,"SELECT * from clearances WHERE student_id = '$id' AND department_id = '$dept_id'");
                                                $get_row = mysqli_fetch_assoc($get);
                                                if(mysqli_num_rows($get) > 0){
                                                    $remarks = $get_row['remarks'];
                                                    $status = $get_row['status'];
                                                    $deadline = $get_row['deadline'];
                                                    $lacking = $get_row['requirement'];
                                                }else{
                                                    $remarks = "N/A";
                                                    $status = "N/A";
                                                    $deadline = "N/A";
                                                    $lacking = "N/A";
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $subject ?></td>
                                                    <td><?php echo $teacher ?></td>
                                                    <td><?php echo $lacking ?></td>
                                                    <td><?php echo $remarks ?></td>
                                                    <td><?php echo $deadline ?></td>
                                                    <td>
                                                        <?php 
                                                        if($status == "0"){
                                                            echo "<span class='badge badge-danger bg-danger'>Not Cleared</span>";
                                                            ?>
                                                            <a class="btn btn-sm btn-link" href="view-submission.php?id=<?php echo $id ?>&dept=<?php echo $dept_id ?>&sec=<?php echo $section_id; ?>&cle=<?php echo $get_row['clearance_id']; ?>">View Submission</a>
                                                            <?php
                                                        }elseif ($status == "1") {
                                                            echo "<span class='badge badge-success bg-success'>Cleared</span>";
                                                            ?>
                                                            <a class="btn btn-sm btn-link" href="view-submission.php?id=<?php echo $id ?>&dept=<?php echo $dept_id ?>&sec=<?php echo $section_id; ?>&cle=<?php echo $get_row['clearance_id']; ?>">View Submission</a>
                                                            <?php
                                                        } else {
                                                            echo "<span class='badge badge-warning bg-warning'>Not set</span>";
                                                        }
                                                        ?>        
                                                </td>
                                                    <td>
                                                        <?php 
                                                if($status == "0"){
                                                        ?>
                                                        <a href="clear-clearance.php?id=<?php echo $id ?>&dept=<?php echo $subject ?>&sec=<?php echo $section_id; ?>&cle=<?php echo $get_row['clearance_id']; ?>" class="btn btn-success btn-sm">Clear</a>
                                                        <a href="notify-clearance.php?id=<?php echo $id ?>&dept=<?php echo $dept_id ?>&sec=<?php echo $section_id; ?>" class="btn btn-success btn-sm">Notify</a>
                                                        <?php 
                                                } elseif($status == "1"){
                                                    ?>
                                                    <button disabled class="btn btn-success btn-sm">Cleared</button>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="add-clearance.php?id=<?php echo $id ?>&dept=<?php echo $dept_id ?>&sec=<?php echo $section_id; ?>" class="btn btn-success btn-sm">Add Requirement</a>
                                                    <?php
                                                }
                                                        ?>
                                                        </td>
                                                </tr>
                                            <?php } ?>
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
    <?php include('submission-modal.php'); ?>
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