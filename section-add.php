<?php session_start(); ?>
<?php include('includes/config.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/session.php'); ?>
<?php include('includes/nav.php'); ?>
<div class="main" style="background: url(src/img/bg-logo.jpg);background-repeat: no-repeat;background-size: auto;background-position: top">
    <?php include('includes/topnav.php'); ?>
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Add Section</strong> </h1>

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
                                                    <label for="name">Section Name</label>
                                                    <div class="d-flex">
                                                        <input type="text" class="form-control w-50" id="name" name="section" placeholder="Ex. Villanueva" required>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-4">
                                                    <label for="name">Adviser</label>
                                                    <div class="d-flex">
                                                        <select class="form-control w-50" id="name" name="adviser" required>
                                                            <option value="">Select Adviser</option>
                                                            <?php
                                                            $sql = "SELECT * FROM designee d INNER JOIN faculties s ON d.faculty_id = s.faculty_id WHERE d.user_type = 'Teacher'";
                                                            $result = mysqli_query($con, $sql);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo '<option value="' . $row['faculty_id'] . '">' . $row['first_name'] . ' ' . $row['last_name'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
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
    if (isset($_POST['submit'])) {
        $section = $_POST['section'];
        $adviser = $_POST['adviser'];
        $sql = "INSERT INTO sections (section_name, faculty_id,date_created) VALUES ('$section', '$adviser', NOW())";
        if (mysqli_query($con, $sql)) {
            $_SESSION['success'] = "Section Added!";
            echo '<script>window.location.href = "sections.php";</script>';
        } else {
            $_SESSION['error'] = "Error Adding Section!";
        }
    }
    ?>