<?php require APPROOT . '\views\includes\head.php'; ?>

<a href="<?php echo URLROOT ?>/posts" class="btn btn-light my-3"><i class="fa fa-chevron-left"></i> Back</a>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by: <strong><?php echo $data['user']->name; ?></strong>
    On: <?php echo $data['post']->created; ?>
</div>
<p class="lead"><?php echo $data['post']->body; ?></p>


<!--show this only if this post belongs to this user-->
<?php if ($_SESSION['userId'] === $data['post']->userId) : ?>
    <hr>
    <a href="<?php echo URLROOT . "/posts/edit/" . $data['post']->id; ?>" class="btn btn-secondary"><i
                class="fa fa-pencil"></i> EDIT </a>

    <form action="<?php echo URLROOT . '/posts/delete/' . $data['post']->id ?>" method="post" class="pull-right">
        <button type="submit" class="btn btn-danger"><i class="fa fa-close"></i> DELETE</button>
    </form>
<?php endif; ?>
<?php
//var_dump($data['post']);
//var_dump($data['user']);
//var_dump($_SESSION);
require APPROOT . '\views\includes\footer.php'; ?>

