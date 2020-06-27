<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="col-md-3">
        <a href="javascript:history.go(-1)" class="btn btn-light btn-block">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="card">
        <?php $user = $data['user']; ?>
        <div class="card card-body mb-3 text-center">
            <div class="bg-light p-2 mb-3">
                <?= humanTiming(strtotime($user -> created_at)) . ' ago'; ?>
            </div>
            <h2 class="card-title"><?= $user -> name; ?></h2>
            <p class="card-text">Email : <?= $user -> email; ?></p>
            <p class="card-text">Phone Number: +<?= $user -> phone_number; ?></p>
            <p class="card-text">Postal code : <?= $user -> postal_code; ?></p>
            <p class="card-text">City : <?= $user -> city; ?></p>
        </div>
    </div>
    <h2 class="h2 text-center">Latest Posts</h2>
    <div class="card-columns">
        <?php foreach ($data['post'] as $post) : ?>
            <div class="card card-body mb-3 text-center">
                <div class="bg-light p-2 mb-3">
                    <?= humanTiming(strtotime($post -> created_at)) . ' ago'; ?>
                </div>
                <h4 class="card-title"><?= $post -> title; ?></h4>
                <p class="card-text"><?= $post -> categories; ?></p>
                <a href="<?= URLROOT; ?>/posts/show/<?= $post -> id; ?>" class="btn btn-dark">More</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>