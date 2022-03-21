
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a class="text-muted" href="" target="_blank"><strong>Student Organization Clearance System</strong></a> &copy;
                            </p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="vendor/js/jquery.js"></script>
    <script src="https://demo.adminkit.io/js/app.js"></script>
    <script src="vendor/js/script.js"></script>
    <script src="vendor/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="vendor/js/datatables.min.js"></script>

</body>

<?php
        if(isset($_SESSION['error'])){
          echo "
          <script>
          Swal.fire({
            title: 'Error!',
            text: '".$_SESSION['error']."',
            icon: 'error',
            showConfirmButton: false,
            timer: 1500
        })
          </script>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
            echo "
          <script>
          Swal.fire({
            title: 'Success!',
            text: '".$_SESSION['success']."',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        })
          </script>
          ";
          unset($_SESSION['success']);
        }
      ?>
</html>