<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="<?= URLROOT; ?>" class="navbar-brand"><?= SITENAME; ?></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <div class="nav-link">
                    <li class="nav-item px-2">
                        <a href="<?= URLROOT; ?>/allposts/index" class="nav-link">All posts</a>
                    </li>
                </div>
                <div class="nav-link">
                    <li class="nav-item px-2">
                        <a href="<?= URLROOT; ?>/categories/index" class="nav-link">Categories</a>
                    </li>
                </div>
                <div class="nav-link">
                    <li class="nav-item px-2">
                        <a href="<?= URLROOT; ?>/users/index" class="nav-link">Users</a>
                    </li>
                </div>
            </ul>
            <!--            Welcome ..-->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user"></i> Welcome
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <?= $_SESSION['user_name']; ?>
                        <?php else : ?>
                            Guest
                        <?php endif; ?>
                    </a>
                    <?php if (isset($_SESSION['user_id'])) : ?>
                    <div class="dropdown-menu">
                        <a href="<?= URLROOT; ?>/users/logout" class="dropdown-item">
                            <i class="fas fa-user-times"></i> Logout
                        </a>
                    </div>
                </li>
                <!--                Registration page for guest-->
                <?php else : ?>
                    <div class="dropdown-menu">
                        <a href="<?= URLROOT; ?>/users/register" class="dropdown-item">
                            Registration
                        </a>
                        <a href="<?php echo URLROOT; ?>/users/login" class="dropdown-item"><i
                                    class="fas fa-sign-in-alt"></i> Login</a>
                    </div>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<?php
#DATE
date_default_timezone_set('Asia/Tashkent');

function humanTiming($time)
{
    $time = time() - $time;
    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second',
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
    }
}

?>
