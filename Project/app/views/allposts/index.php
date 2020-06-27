<?php require APPROOT . '/views/inc/header.php'; ?>
<header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>
                    <i class="fas fa-pencil-alt"></i>All Posts</h1>
            </div>
        </div>
    </div>
</header>
<section id="posts">
    <div class="container">
        <div class="row">
            <div class="card-columns">
                <?php foreach ($data['allposts'] as $allpost) : ?>
                    <div class="card card-body mb-3 text-center">
                        <div class="bg-light p-2 mb-3">
                            <?= humanTiming(strtotime($allpost -> created_at)) . ' ago'; ?>
                        </div>
                        <h4 class="card-title"><?= $allpost -> title; ?></h4>
                        <p class="card-text"><?= $allpost -> categories; ?></p>
                        <a href="<?= URLROOT; ?>/posts/show/<?= $allpost -> id; ?>" class="btn btn-dark">More</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div>
                <nav class="ml-4">
                    <ul class="pagination justify-content-center">
                        <!--Previous-->
                        <?php if ($data['page'] == 1) { ?>
                            <li class="page-item disabled">
                                <a href="#" class="page-link">Previous</a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a href="<?= URLROOT; ?>/allposts/?index=<?= ($data['page'] - 1); ?>"
                                   class="page-link">Previous</a>
                            </li>
                        <?php } ?>
                        <!--Numbers in pagination-->
                        <?php for ($i = 1; $i <= $data['number_of_pages']; $i++) { ?>

                            <?php if ($i == $data['page']) { ?>
                                <li class="page-item active">
                                    <a href="#" class="page-link"><?= $data['page']; ?></a>
                                </li>

                            <?php } else { ?>
                                <li class="page-item">
                                    <a href="<?= URLROOT; ?>/allposts/?index=<?= $i; ?>"
                                       class="page-link"><?= $i; ?></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <!--Next-->
                        <?php if ($data['page'] == $data['number_of_pages']) { ?>
                            <li class="page-item disabled">
                                <a href="#" class="page-link">Next</a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item">
                                <a href="<?= URLROOT; ?>/allposts/?index=<?= ($data['page'] + 1); ?>"
                                   class="page-link">Next</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
