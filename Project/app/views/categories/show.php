<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="col-md-3">
    <a href="javascript:history.go(-1)" class="btn btn-light btn-block">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>
<div class="card-columns">
    <?php foreach ($data['category'] as $category) : ?>
        <div class="card card-body mb-3 text-center">
            <div class="bg-light p-2 mb-3">
                <?= humanTiming(strtotime($category -> created_at)) . ' ago'; ?>
            </div>
            <h4 class="card-title"><?php echo $category -> title; ?></h4>

            <p class="card-text"><?php echo $category -> body; ?></p>

            <div>
                <?php if ($category -> user_id == $_SESSION['user_id']) : ?>
                    <div class="btn">
                        <a href="<?php echo URLROOT; ?>/posts/edit/<?= $category -> id; ?>"
                           class="btn btn-dark btn-block">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                    <div class="btn">
                        <form onclick="return confirm('Do you want to delete this task?');"
                              action="<?php echo URLROOT; ?>/posts/delete/<?= $category -> id; ?>" method="post">
                            <button type="submit" value="Delete" class="btn btn-danger btn-block"><i
                                        class="far fa-trash-alt"></i> Delete Post
                            </button>
                        </form>
                    </div>
                <?php endif; ?></div>
        </div>
    <?php endforeach; ?>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
