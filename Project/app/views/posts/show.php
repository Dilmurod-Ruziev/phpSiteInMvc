<?php require APPROOT . '/views/inc/header.php'; ?>
    <section id="actions" class="py-2 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="javascript:history.go(-1)" class="btn btn-light btn-block">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
                <?php if ($data['post'] -> user_id == $_SESSION['user_id']) : ?>
                    <div class="col-md-3">
                        <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post'] -> id; ?>"
                           class="btn btn-dark btn-block">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                    </div>
                    <div class="col-md-3">
                        <form onclick="return confirm('Do you want to delete this task?');"
                              action="<?php echo URLROOT; ?>/posts/delete/<?= $data['post'] -> id; ?>" method="post">
                            <button type="submit" value="Delete" class="btn btn-danger btn-block"><i
                                        class="far fa-trash-alt"></i> Delete Post
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><?php echo $data['post'] -> title; ?></h2>
            <p class="card-text"><?php echo $data['post'] -> body; ?></p>
            <p class="card-text">
                <small class="text-muted">Written by <?php echo $data['user'] -> name; ?>
                    on <?php echo $data['post'] -> created_at; ?></small>
            </p>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>