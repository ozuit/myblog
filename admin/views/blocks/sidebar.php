<h3 class="text-center">Menu Chính</h3>
<ul class="nav nav-tabs nav-stacked">
    <?php if ($logged = isLogged()): ?>
    <li><a href="#">Welcome <strong><?php echo $logged['username']; ?></strong></a></li>
    <li><a href="index.php?c=auth&m=logout">Logout</a></li>
    <li><a href="#">Categories</a></li>
    <li><a href="#">Comments</a></li>
    <li><a href="#">Members</a></li>
    <?php else: ?>
    <li><a href="index.php?c=auth&m=login">Login</a></li>
    <?php endif; ?>
</ul>

