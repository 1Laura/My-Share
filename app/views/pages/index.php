<?php require APPROOT . '\views\includes\head.php'; ?>

<?php echo "<h1>{$data['title']}</h1>"; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title'] ?></h1>
        <p class="lead"><?php echo $data['description'] ?></p>

    </div>

</div>

<?php require APPROOT . '\views\includes\footer.php'; ?>

