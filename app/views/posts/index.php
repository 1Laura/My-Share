<?php require APPROOT . '\views\includes\head.php'; ?>

<div class="row mt-2">
    <div class="col">
        <h1>Posts</h1>
    </div>
    <div class="col">
        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-secondary pull-right"><i class="fa fa-pencil"></i> Add
            post</a>
    </div>
</div>
<div class="row m-2">
    <?php foreach ($data['posts'] as $post) : ?>
        <div class="col-md-6">
            <div class="card border-secondary mb-3">
                <div class="card-header border-secondary">Written by: <?php echo $post->name ?></div>
                <div class="card card-body">
                    <h4 class="card-title"><?php echo $post->title ?>></h4>
                    <!--            <p class="bg-light p-2 mb-3">Written by USER</p>-->
                    <p class="card-text"><?php echo $post->body ?></p>
                    <!--                    <a href="-->
                    <?php //echo URLROOT . '/posts/show/' . $post->postId; ?><!--" class="card-link">Read More</a>-->
                    <a href="<?php echo URLROOT . '/posts/show/' . $post->postId; ?>" class="btn btn-xs btn-outline-secondary">Read
                        More</a>
                </div>
                <div class="card-footer border-secondary">Created
                    at: <?php echo $post->postCreated ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php var_dump($data['posts']); ?>


<?php require APPROOT . '\views\includes\footer.php'; ?>

