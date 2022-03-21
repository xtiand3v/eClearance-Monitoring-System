<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Signatories</strong> </h1>
            <div class="col-2">
                <select class="form-control" id="select_section">
                    <?php if(isset($_GET['id'])){
                        $section_id = $_GET['id'];
                        $query = "SELECT * FROM sections s INNER JOIN faculties f ON f.faculty_id = s.faculty_id WHERE s.section_id = '$section_id'";
                        $result = mysqli_query($con, $query);
                        $rows = mysqli_fetch_assoc($result);
                        $section_name = $rows['section_name'];
                        echo "<option value='signatories.php?id=$section_id'>10 - $section_name</option>";
                    } ?>
                    <?php
                    $sql = "SELECT * FROM sections";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="signatories.php?id=' . $row['section_id'] . '">10 - ' . $row['section_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row mt-2">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                    <div class="card-header">
                                        <a href="signatories-add.php?id=<?php echo $section_id; ?>" class="btn btn-sm btn-primary float-right">Add New Subject</a>
                                        <div class="text-center">
                                            <h5 class="mb-0">List of Signatories for 10 - <?php echo $section_name; ?></h5>
                                            <h6>Adviser <?php echo $rows['first_name']." ".$rows['last_name']; ?></h6>
                                        </div>
                                    </div>
                                    <table class="table table-hover my-0" id="department">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Subject</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $section_id = $_GET['id'];
                                            $dept = $con->query("SELECT * FROM signatory s INNER JOIN faculties f ON f.faculty_id = s.faculty_id INNER JOIN department d ON d.department_id = s.department_id INNER JOIN sections sec ON sec.section_id = s.section_id INNER JOIN designee des ON des.faculty_id = f.faculty_id WHERE s.section_id = '$section_id'");
                                            $i = 1;
                                            while ($row = $dept->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['department_name']; ?></td>
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
    <?php include('signatories-modal.php'); ?>
    <script>
        $(document).ready(function() {
            $('#department').DataTable();
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
                url: 'signatories-row.php',
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
        $('#select_section').bind("change keyup", function() {
            // set the window's location property to the 
            // value of the option the user has selected
            window.location = $(this).val();
        });
    </script>