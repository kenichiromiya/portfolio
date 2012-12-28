<div id="sub">
<?=_('Uploaded by')?>
<div class="account">
<div class="icon">
<?php
/*
if (!file_exists("upload/accounts/thumb/<?=$row['account_id']?>/icon.jpeg")){
	$image = new Image();
	$image->resize("upload/accounts/thumb/<?=$row['account_id']?>/icon.jpeg","images/pic_noimage110_dgray.jpg",50,50);
}
*/
?>
<a href="<?=BASE?>accounts/<?=$row['account_id']?>"><img src="<?=BASE?>upload/accounts/thumb/<?=$row['account_id']?>/icon.jpeg"></a>
</div>
<div class="account_id">
<a href="<?=BASE?>accounts/<?=$row['account_id']?>"><?=$row['account_id']?></a>
</div>

</div><!--account-->
<?php if ($row['created'] != "0000-00-00 00:00:00"){?>
<?=_('Created at')?>
<div class="created">
<?=$row['created']?>
</div><!--created-->
<?php } ?>
<?php if ($row['modified'] != "0000-00-00 00:00:00"){?>
<?=_('Modified at')?>
<div class="modified">
<?=$row['modified']?>
</div><!--modified-->
<?php } ?>
<!--
<div id="trends">
<?=_('Trends')?>
</div>
-->
<!--trends-->
</div><!--sub-->
