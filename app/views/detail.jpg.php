<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?php echo TITLE; ?> - <?=$row['title']?></title>
<link rel="stylesheet" type="text/css" href="<?=$base?>css/style.css"/>
<script type="text/javascript" src="<?=$base?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=$base?>js/jquery.masonry.min.js""></script>
<script type="text/javascript" src="<?=$base?>js/jquery.bottom-1.0.js"></script>
<script type="text/javascript" src="<?=$base?>js/javascript.js"></script>
</head>
<body>

<div id="wrapper">

<?php include("header.php")?>

<div id="main">
<div id="container">

<?php
if($row['filename']):
	if (!file_exists("upload/large/".$row['filename'])){
		$image = new Image();
		$image->imageresize("upload/large/".$row['filename'],"upload/".$row['filename'],1000,1000);
	}
?>
<img src="<?=$base?>upload/large/<?=$row['filename']?>">
<?php
endif;
?>
</div><!--container-->

</div><!--main-->
<div id="sub">
<div id="container">
<div id="twitter">
<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div><!--twitter-->
<h1>
<?=$row['title']?>
</h1>
<p>
<?=$row['description']?>
</p>
<div class="account">
<div class="icon">
<a href="<?=$base?>accounts/<?=$row['account_id']?>"><img src="<?=$base?>upload/accounts/thumb/<?=$row['account_id']?>/icon.jpeg"></a>
</div>
<div class="account_id">
<a href="<?=$base?>accounts/<?=$row['account_id']?>"><?=$row['account_id']?></a>
</div>

</div><!--account-->
</div><!--container-->
</div><!--sub-->
</div><!--wrapper-->

</body>
</html>
