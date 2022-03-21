<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(../src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
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
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>LRN</th>
                                                <th>Lacking Requirements</th>
                                                <th>Remarks</th>
                                                <th>Deadline</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Submission</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $section_id = $_GET['id'];
                                            $query = "SELECT * FROM clearances c INNER JOIN student s  WHERE section_id = '$section_id'";
                                            $result = mysqli_query($con, $query);
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['student_id'];
                                                $clearance = $con->query("SELECT * FROM clearances WHERE student_id = '$id'");
                                                $clearance_row = $clearance->fetch_assoc();
                                                $req = $clearance_row['requirement'];
                                                $deadline = $clearance_row['deadline'];
                                                $remarks = $clearance_row['remarks'];
                                                $status = $clearance_row['status'];
                                                $c_id = $clearance_row['clearance_id'];
                                                $dept_id = $clearance_row['department_id'];

                                                echo '<tr>';
                                                echo '<td>' . $i++ . '</td>';
                                                echo '<td>' . $row['last_name'] . ', ' . $row['first_name'] . '</td>';
                                                echo '<td>' . $row['student_id'] . '</td>';
                                                echo '<td class="text-center">' . $req . '</td>';
                                                echo '<td class="text-center">' . $remarks . '</td>';
                                                echo '<td class="text-center">' . $deadline . '</td>';
                                                echo '<td class="text-center">';
                                                if($status == "0"){
                                                    echo "<span class='badge badge-danger bg-danger'>Not Cleared</span>";
                                                }elseif ($status == "1") {
                                                    echo "<span class='badge badge-success bg-success'>Cleared</span>";
                                                } else {
                                                    echo "<span class='badge badge-warning bg-warning'>Not set</span>";
                                                };
                                                echo '</td>';
                                                ?>
                                                
                                                <td>
                                                        <?php 
                                                if($status == "0"){
                                                        ?>
                                                        <a href="clear-clearance.php?id=<?php echo $id ?>&dept=<?php echo $dept_id; ?>&sec=<?php echo $section_id; ?>&cle=<?php echo $c_id; ?>" class="btn btn-success btn-sm">Clear</a>
                                                        <a href="notify-clearance.php?id=<?php echo $id ?>&dept=<?php echo $dept_id; ?>&sec=<?php echo $section_id; ?>" class="btn btn-success btn-sm">Notify</a>
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
                                                <td>
                                                    <?php 
                                                    
                                                if($status == "0"){
                                                    ?>
                                                    <a class="btn btn-sm btn-link" target="_blank" href="view-submission.php?id=<?php echo $id ?>&sec=<?php echo $section_id; ?>&cle=<?php echo $c_id; ?>">View Submission</a>
                                                    <?php } elseif($status == "1"){
                                                    ?>
                                                    <a class="btn btn-sm btn-link" target="_blank" href="view-submission.php?id=<?php echo $id ?>&sec=<?php echo $section_id; ?>&cle=<?php echo $c_id; ?>">View Submission</a>
                                                    <?php
                                                    } else {
                                                        echo "";
                                                    }?>
                                                </td>
                                                </tr>
                                                <?php
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