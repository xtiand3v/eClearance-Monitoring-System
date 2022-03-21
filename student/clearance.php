<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<?php
$id = $_SESSION['user'];
$stmt = mysqli_query($con, "SELECT * FROM student WHERE student_id = '$id'");
$row = mysqli_fetch_array($stmt);
$name = $row['first_name'] . " " . $row['last_name'];
$sec_id = $row['section_id'];
$sec = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM sections s INNER JOIN faculties f ON s.faculty_id = f.faculty_id WHERE s.section_id = '$sec_id'"));
$teachers = $sec['first_name']." ".$sec['last_name'];
?>
<div class="main" style="background: url(../src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Clearance</strong> </h1>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">List of clearance</h5>
                                    </div>
                                    <div class="card-header">
                                        <a href="clearance.php?search=done" class="btn btn-success btn-sm">Cleared</a>
                                        <a href="clearance.php?search=not" class="btn btn-danger btn-sm">Uncleared</a>
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
                                                <th class="d-none"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $section_id = $row['section_id'];
                                            $query = "SELECT * FROM signatory s INNER JOIN sections sec ON sec.section_id = s.section_id INNER JOIN department d ON d.department_id = s.department_id INNER JOIN faculties f ON f.faculty_id = s.faculty_id WHERE s.section_id = '$section_id'";
                                            $result = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $teacher_id = $row['faculty_id'];
                                                $subject = $row['department_name'];
                                                $dept_id = $row['department_id'];
                                                $teacher = $row['first_name'] . ' ' . $row['last_name'];
                                                $get = mysqli_query($con, "SELECT * from clearances WHERE student_id = '$id' AND department_id = '$dept_id'");
                                                $get_row = mysqli_fetch_assoc($get);
                                                $cle_id = $get_row['clearance_id'];
                                                if (mysqli_num_rows($get) > 0) {
                                                    $remarks = $get_row['remarks'];
                                                    $status = $get_row['status'];
                                                    $deadline = $get_row['deadline'];
                                                    $lacking = $get_row['requirement'];
                                                } else {
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
                                                        if ($status == "0") {
                                                            echo "<span class='badge badge-danger bg-danger'>Not Cleared</span>";
                                                            echo "<button class='btn btn-sm btn-link view' data-id='" . $get_row['clearance_id'] . "'>View Submission</button>";
                                                        } elseif ($status == "1") {
                                                            echo "<span class='badge badge-success bg-success'>Cleared</span>";
                                                            echo "<button class='btn btn-sm btn-success view' data-id='" . $get_row['clearance_id'] . "'>View Submission</button>";
                                                        } else {
                                                            echo "<span class='badge badge-warning bg-warning'>Unset</span>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (mysqli_num_rows($get) > 0) {

                                                            $select = mysqli_query($con, "SELECT * FROM submission WHERE clearance_id = '$cle_id'");
                                                            if (mysqli_num_rows($select) > 0) {
                                                                if ($status == "1") {
                                                        ?>
                                                                    <button class="btn btn-success btn-sm" readonly disabled>Cleared</button>

                                                                <?php
                                                                } else {
                                                                ?>

                                                                    <button class="btn btn-warning btn-sm" readonly>Pending Submission</button>
                                                                <?php
                                                                }
                                                            } else {
                                                                ?>

                                                                <a href="add-submission.php?id=<?php echo $cle_id; ?>" class="btn btn-success btn-sm">Add Submission</a>
                                                            <?php

                                                            }
                                                            ?>
                                                        <?php } else {
                                                        ?>
                                                            <button class="btn btn-success btn-sm" disabled>Add Submission</button>
                                                        <?php
                                                        } ?>
                                                    </td>
                                                    <td class="d-none">
                                                        <?php
                                                        if ($status == "0") {
                                                            echo "Not yet cleared";
                                                        } elseif ($status == "1") {
                                                            echo "Done";
                                                        } else {
                                                            echo "Not yet cleared";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <div class="text-center col-12">
                                        <form method="POST" action="print.php">
                                            <input type="hidden" value="<?php echo $name; ?>" name="name">
                                            <input type="hidden" value="<?php echo $section_id; ?>" name="section">
                                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                                            <input type="hidden" value="<?php echo $teachers; ?>" name="teacher">
                                            <button type="submit" class="btn btn-success btn-lg btn-flat" name="print">Print</button>
                                        </form>
                                    </div>
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

                    // First, get the search parameter. Here I use example.com#search=yourkeyword
                    // Read a page's GET URL variables and return them as an associative array.
                    function getUrlVars() {
                        var vars = {};
                        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
                            vars[key] = value;
                        });
                        return vars;

                    }

                    $('#department').DataTable({
                            initComplete: function() {
                                this.api().search(getUrlVars()['search']).draw();
                            }
                        });
                    });

                $(function() {
                    $(document).on('click', '.edit', function(e) {
                        e.preventDefault();
                        $('#edit').modal('show');
                        var id = $(this).data('id');
                        getRow(id);
                    });
                });

                $(document).on('click', '.delete', function(e) {
                    e.preventDefault();
                    $('#delete').modal('show');
                    var id = $(this).data('id');
                    getRow(id);
                });

                function getRow(id) {
                    $.ajax({
                        type: 'POST',
                        url: 'account-row.php',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('.acc_id').val(response.designee_id);
                            $('#edit_name').val(response.designee_name);
                            $('#edit_username').val(response.username);
                            $('#edit_password').val(response.password);
                            $('#edit_email').val(response.email);
                            $('#edit_type').val(response.user_type);
                        }
                    });
                }
    </script>