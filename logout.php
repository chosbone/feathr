<?php
if (isset($_POST['logoutButton'])) {
   unset($_COOKIE['username']);
   unset($_POST['logoutButton']);
   header('Location: index.html');
}
?>