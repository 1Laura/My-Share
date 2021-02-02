<?php require APPROOT . '\views\includes\head.php'; ?>


<a href="<?php echo URLROOT ?>/posts" class="btn btn-light my-3"><i class="fa fa-chevron-left"></i> Back</a>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by: <strong><?php echo $data['user']->name; ?></strong>>
    On: <?php echo $data['post']->created; ?>
</div>
<p class="lead"><?php echo $data['post']->body; ?></p>


<?php
//var_dump($data['post']);
//var_dump($data['user']);
require APPROOT . '\views\includes\footer.php'; ?>

