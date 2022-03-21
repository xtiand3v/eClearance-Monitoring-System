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
        $q = "SELECT * FROM department WHERE department_id = '$id'";
        $results = mysqli_query($con, $q);
        $rows = mysqli_fetch_assoc($results);
        $dept_name = $rows['department_name'];


        ?>
        <div class="container-fluid p-0">

            <div class="row mt-2">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                    <div class="card-header">
                                        <div class="text-center">
                                            <h1 class="h3 mb-3"><strong><?php echo $dept_name ?> Department</strong> </h1>
                                        </div>
                                    </div>
                                    <table class="table table-hover my-0" id="department">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Teacher Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = $_GET['id'];
                                            if (isset($_GET['section'])) {
                                                $section_id = $_GET['section'];
                                            } else {
                                                $section_id = 1;
                                            }
                                            $dept = $con->query("SELECT * FROM signatory s INNER JOIN faculties f ON f.faculty_id = s.faculty_id INNER JOIN department d ON d.department_id = s.department_id INNER JOIN sections sec ON sec.section_id = s.section_id INNER JOIN designee desi ON desi.faculty_id = s.faculty_id WHERE s.department_id = '$id' AND s.section_id = '$section_id'");
                                            $i = 1;
                                            while ($row = $dept->fetch_assoc()) {
                                                $dept_id = $row['department_id'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['username']; ?></td>
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