<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Departments</strong> </h1>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                <div class="card flex-fill p-3">
                                    <div class="card-header">
                                        <a href="department-add.php" class="btn btn-primary btn-sm">Add Department</a>
                                    </div>
                                    <table class="table table-hover my-0" id="department">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Department Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $dept = $con->query("SELECT * FROM department ORDER BY department_name ASC");
                                            $i = 1;
                                            while ($row = $dept->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row['department_name']; ?></td>
                                                    <td>
                                                        <a href="department-view.php?id=<?php echo $row['department_id']; ?>" class="btn btn-sm btn-primary">View Teachers</a>
                                                        <button data-id="<?php echo $row['department_id']; ?>" class="btn btn-sm btn-success edit">Edit</button>
                                                        <a href="department-delete.php?id=<?php echo $row['department_id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
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
    <?php include('department-modal.php'); ?>
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

        function getRow(id) {
            $.ajax({
                type: 'POST',
                url: 'department-row.php',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('.dept_id').val(response.department_id);
                    $('#edit_name').val(response.department_name);
                    $('#edit_faculty').val(response.faculty_id);
                }
            });
        }
    </script>