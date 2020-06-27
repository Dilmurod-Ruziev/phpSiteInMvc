<?php require APPROOT . '/views/inc/header.php'; ?>
    <!-- HEADER -->
    <header id="main-header" class="py-2 bg-success text-white mb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>
                        <i class="fas fa-folder"></i> Categories</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="card-columns">
        <?php foreach ($data['categories'] as $category) : ?>
            <div class="card card-body mb-3  text-center">
                <div class="card-body">
                    <h4 class="card-title"><?= $category -> categories; ?></h4>
                    <a href="<?= URLROOT; ?>/categories/show/<?= $category -> categories ?>"
                       class="btn btn-outline-dark btn-block"> Read posts
                        <i class="fas fa-angle-double-right"></i>
                    </a>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>