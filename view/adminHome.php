<?php
require('includes/headerView.php');
$user = $_SESSION['user'];
//var_dump($user['username']);
?>

<div style="padding: 10%; text-align: center;">
<h2 style="color: white;">Bienvenue <?php echo $user['username']; ?></h2>
<a href="index.php?action=logout" class="btn btn-danger">Deconnexion</a>
</div>

<?php
require('includes/footerView.php');
?>