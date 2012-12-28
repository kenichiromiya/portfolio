<?php
include_once "app/functions/markdown.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?php echo TITLE; ?> - <?=$row['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/detail.css"/>
<script type="text/javascript" src="<?=BASE?>js/jquery-1.7.1.min.js"></script>
<!--
<script type="text/javascript" src="<?=BASE?>js/jquery.masonry.min.js""></script>
<script type="text/javascript" src="<?=BASE?>js/jquery.bottom-1.0.js"></script>
-->
<script type="text/javascript" src="<?=BASE?>js/javascript.js"></script>
</head>
<body>

<div id="wrapper">

<?php include("header.php")?>

<div id="container">
<div id="main">
<div class="page">
<?php
echo Markdown($row['text']);
//$markdown = new Markdown();
//echo $markdown->parse($row['text']);
?>
</div><!--page-->
<div id="twitter">
<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div><!--twitter-->

</div><!--main-->
<div id="sub">
<?php include("sub.php")?>
</div>

</div><!--container-->
</div><!--wrapper-->

<?php include("footer.php")?>
</body>
</html>
