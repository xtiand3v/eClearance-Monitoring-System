<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Accounts</strong> </h1>

            <div class="row">
                        <div class="col-xl-12 col-xxl-12 d-flex">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                                        <div class="card flex-fill p-3">
                                            <div class="card-header">
                                                <a href="account-add.php" class="btn btn-primary btn-sm">Add Account</a>
                                            </div>
                                            <table class="table table-hover my-0" id="department">
                                                <thead>
                                                    <tr>
                                                       <th>ID #</th>
                                                       <th>Name</th>
                                                       <th>Account Type</th>
                                                       <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $dept = $con->query("SELECT * FROM designee d INNER JOIN faculties f ON f.faculty_id = d.faculty_id ORDER BY designee_id DESC");
                                                    $i = 1;
                                                    while($row = $dept->fetch_assoc()){
                                                        ?>
                                                        <tr>
                                                            <td>202101<?php echo $i++; ?></td>
                                                            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                                            <td><?php echo $row['user_type']; ?></td>
                                                            <td>
                                                                <button data-id=<?php echo $row['designee_id']; ?> class="btn btn-sm btn-primary edit">Edit</button>
                                                                <button data-id=<?php echo $row['designee_id']; ?> class="btn btn-sm btn-danger delete">Delete</button>
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
    <?php include('account-modal.php'); ?>
    <script>
        $(document).ready(function() {
            $('#department').DataTable();
        } );
        
        $(function() {
            $(document).on('click', '.edit', function(e) {
                e.preventDefault();
                $('#edit').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });
        });

        $(document).on('click', '.delete', function(e){
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