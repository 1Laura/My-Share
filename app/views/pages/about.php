<?php
//$currentPage='about';
require APPROOT . '\views\includes\head.php';
?>

<h1 class="display-3"><?php echo $data['title'] ?></h1>
<p class="lead"><?php echo $data['description'] ?></p>
<p>Version: <?php echo APPVERSION ?></p>


<?php require APPROOT . '\views\includes\footer.php'; ?>
