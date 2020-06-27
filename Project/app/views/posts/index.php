<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['posts'] as $post) : ?>
                            <tr>
                                <td><?= $post -> postId; ?></td>
                                <td><?= $post -> title; ?></td>
                                <td><?= $post -> categories; ?></td>
                                <td><?= humanTiming(strtotime($post -> postCreated)) . ' ago'; ?></td>
                                <td>
                                    <div>
                                        <a href="<?php echo URLROOT; ?>/posts/show/<?= $post -> postId ?>"
                                           class="btn btn-light btn-block">
                                            <i class="fas fa-angle-double-right"></i>
                                        </a>
                                    </div>
                                </td>
                                <?php if ($post -> user_id == $_SESSION['user_id']) : ?>
                                    <td>
                                        <div>
                                            <a href="<?php echo URLROOT; ?>/posts/edit/<?= $post -> postId ?>"
                                               class="btn btn-dark btn-block">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <form onclick="return confirm('Do you want to delete this task?');"
                                              action="<?php echo URLROOT; ?>/posts/delete/<?= $post -> postId ?>"
                                              method="post">
                                            <button type="submit" value="Delete" class="btn btn-danger btn-block"><i
                                                        class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                <?php else : ?>
                                    <td>
                                        <div>
                                            <a class="disabled btn btn-dark btn-block">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a class="disabled btn btn-danger btn-block">
                                                <i class="far fa-trash-alt"></i></i>
                                            </a>
                                        </div>
                                    </td>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--LEFT SIDE ACTIONS-->
                <div>
                    <form action="<?php echo URLROOT; ?>/posts/add" method="post">
                        <div class="modal fade" id="addPostModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Add Post</h5>
                                        <button class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="title">Title: <sup>*</sup></label>
                                            <input type="text" name="title"
                                                   class="form-control form-control-lg <?= (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                                                   value="<?php echo $data['title']; ?>" required>
                                            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category: <sup>*</sup></label>
                                            <input type="text" name="categories"
                                                   class="form-control form-control-lg <?= (!empty($data['categories_err'])) ? 'is-invalid' : ''; ?>"
                                                   value="<?php echo $data['categories']; ?>" required>
                                            <span class="invalid-feedback"><?php echo $data['categories_err']; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="body">Body: <sup>*</sup></label>
                                            <textarea name="body"
                                                      class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"
                                                      required><?php echo $data['body']; ?></textarea>
                                            <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                                        </div>
                                        <div class="modal-footer form-group">
                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <section id="actions" class="py-3 mb-3">
                        <div class="container">
                            <a href="<?= URLROOT; ?>/posts" class="btn btn-dark btn-block" data-toggle="modal"
                               data-target="#addPostModal">
                                <i class="fas fa-plus"></i> Add Post
                            </a>
                        </div>
                    </section>
                    <div class="card text-center bg-info text-white mb-3">
                        <div class="card-body">
                            <h3>Posts</h3>
                            <h4 class="display-4">
                                <i class="fas fa-pencil-alt"></i><?= $data['countPosts'][0]; ?>
                            </h4>
                            <a href="<?= URLROOT; ?>/allposts/index" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card text-center bg-warning text-white mb-3 ">
                        <div class="card-body">
                            <h3>Categories</h3>
                            <h4 class="display-4">
                                <i class="fas fa-folder"></i><?= $data['countCtg'][0]; ?>
                            </h4>
                            <a href="<?= URLROOT; ?>/categories/index" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>
                    <div class="card text-center bg-success text-white mb-3">
                        <div class="card-body">
                            <h3>Users</h3>
                            <h4 class="display-4">
                                <i class="fas fa-users"></i><?= $data['countUsers'][0]; ?>
                            </h4>
                            <a href="<?= URLROOT; ?>users/index" class="btn btn-outline-light btn-sm">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require APPROOT . '/views/inc/footer.php'; ?>