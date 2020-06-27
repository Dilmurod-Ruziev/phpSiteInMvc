<?php require APPROOT . '/views/inc/header.php'; ?>
    <section id="details">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Post</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
                                <section id="actions" class="py-2">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light btn-block">
                                                    <i class="fas fa-arrow-left"></i> Back To Dashboard
                                                </a>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <button class="btn btn-success btn-block" type="submit">
                                                    <i class="fas fa-check"></i> Save Changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"
                                           class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['title']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" name="categories"
                                           class="form-control form-control-lg <?php echo (!empty($data['categories_err'])) ? 'is-invalid' : ''; ?>"
                                           value="<?php echo $data['categories']; ?>">
                                    <span class="invalid-feedback"><?php echo $data['categories_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="body">Body: <sup>*</sup></label>
                                    <textarea name="body"
                                              class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                                    <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                                </div>
                                <div class="form-group"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require APPROOT . '/views/inc/footer.php'; ?>