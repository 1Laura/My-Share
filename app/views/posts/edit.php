<?php require APPROOT . '\views\includes\head.php'; ?>

<a href="<?php echo URLROOT ?>/posts" class="btn btn-light my-3"><i class="fa fa-chevron-left"></i> Back</a>
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="car card-body bg-light ">
            <?php flash('postMessage'); ?>
            <h2>Edite Post</h2>
            <p>Share your thoughts with the world</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="text" name="title" id="title"
                           class="<?php echo !empty($data['titleErr']) ? 'is-invalid' : ''; ?> form-control form-control-lg"
                           value="<?php echo $data['title']; ?>">
                    <span class="invalid-feedback"><?php echo $data['titleErr']; ?></span>
                </div>

                <div class="form-group">
                    <label for="body">Your text: <sup>*</sup></label>
                    <textarea name="body" id="body"
                              class="<?php echo (!empty($data['bodyErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg"><?php echo $data['body'] ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['bodyErr']; ?></span>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-secondary w-100" value="UPDATE">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '\views\includes\footer.php'; ?>
