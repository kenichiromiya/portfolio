<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?php echo TITLE; ?> - <?=$title?></title>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?=BASE?>css/detail.jpg.css"/>
<script type="text/javascript" src="<?=BASE?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=BASE?>js/jquery.masonry.min.js""></script>
<script type="text/javascript" src="<?=BASE?>js/jquery.bottom-1.0.js"></script>
<script type="text/javascript" src="<?=BASE?>js/javascript.js"></script>
</head>
<body>

<div id="wrapper">

<?php include("header.php")?>

<div id="container">
<div id="main">
<form action="<?=BASE?><?=$id?>" method="post">
<input type="hidden" name="_method" value="put">
<input type="hidden" name="type" value="image">
<!--
<label for="type"><?=_('Type')?></label>
<select id="type" name="type">
<option value="image"><?=_('Image')?></option>
<option value="text"><?=_('Text')?></option>
</select><br/>
-->
<label for="title"><?=_('Title')?></label>
<input id="title" type="text" name="title" value="<?=$title?>"/><br/>
<label for="tags"><?=_('Tags')?></label>
<input id="tags" type="text" name="tags" value="<?=$tags?>"/><br/>
<label for="description"><?=_('Description')?></label>
<textarea id="description" name="description" >
<?=$description?>
</textarea><br/>
<!--
<label for="text"><?=_('Text')?></label>
<textarea id="text" name="text" rows="10" cols="20">
<?=$text?>
</textarea><br/>
-->
<label for="submit"><?=_('Submit')?></label>
<input id="submit" type="submit" value="<?=_('Submit')?>"/><br/>

</form>
<div id="frame">

<h1>
<?=$title?>
</h1>
<?php
if($filename):
	if (!file_exists("upload/large/".$filename)){
		$image = new Image();
		$image->imageresize("upload/large/".$filename,"upload/".$filename,1000,1000);
	}
?>
<a href="<?=BASE?>upload/<?=$filename?>"><img src="<?=BASE?>upload/large/<?=$filename?>"></a>
<?php
endif;
?>
<div id="twitter">
<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div><!--twitter-->
<p>
<?=$description?>
</p>
</div><!--frame-->
</div><!--main-->
<div id="sub">
<?php include("meta.php")?>
</div><!--sub-->
</div><!--container-->
</div><!--wrapper-->

<?php include("footer.php")?>
</body>
</html>
