<?php
if (isset($_SESSION['error'])) {
    echo "
            <script>
               
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: ' " . $_SESSION['error'] . "'
  })
             
            </script>
          ";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo "
    <script>
       
Swal.fire({
icon: 'success',
title: 'Success !',
text: ' " . $_SESSION['success'] . "'
})
     
    </script>
          ";
    unset($_SESSION['success']);
}
