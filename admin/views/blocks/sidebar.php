<h3 class="text-center" style="margin-bottom:20px">Menu Chính</h3>
<ul class="nav nav-tabs nav-stacked">
    <?php if ($logged = isLogged()): ?>
    <li><a href="#">Welcome <strong><?php echo $logged['username']; ?></strong></a></li>
    <li><a href="index.php?c=category&m=list">Categories</a></li>
    <li><a href="index.php?c=article&m=list">Articles</a></li>
    <li><a href="index.php?c=comment&m=list">Comments</a></li>
    <li><a href="index.php?c=user&m=list">Members</a></li>
    <li><a href="index.php?c=auth&m=logout">Logout</a></li>
    <?php else: ?>
    <li><a href="index.php?c=auth&m=login">Login</a></li>
    <?php endif; ?>
</ul>

