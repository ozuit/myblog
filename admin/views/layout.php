<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Money Lover</title>
    <link rel="stylesheet" href="myblog/../../styles/css/bootstrap.css">
    <link rel="stylesheet" href="myblog/../../styles/css/styles.css">
    <script type="text/javascript" src="myblog/../../styles/js/jquery.js"></script>
    <script type="text/javascript" src="myblog/../../includes/ckeditor/ckeditor.js"></script>
</head>
<body>
  <div class='row' style="margin:0 10px">
    <div class='navbar navbar-inverse'>
      <div class='navbar-inner nav-collapse' style="height: auto;">
        <ul class="nav">
            <li class="active" style="float:left"><a href="index.php">My blog - Admin</a></li>
            <li style="float:right"><a href="../index.php" target="_blank">Review</a></li>
        </ul>
      </div>
    </div>
    <div id='content' class='row-fluid'>
        <div class='col-md-9 admin_main'>
            <?php include ROOT . DS . 'views' . DS . $template_file; ?>
        </div>
        <div class='col-md-3 admin_sidebar'>
            <?php include ROOT . DS . 'views' . DS . 'blocks' . DS . 'sidebar.php'; ?>
        </div>
    </div>
  </div>
</body>
</html>