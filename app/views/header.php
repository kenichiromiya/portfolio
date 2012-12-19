<div id="header">
<h1 class="logo">
<a href="<?=$base?>"><img src="<?=$base?>upload/logo.png"/></a>
</h1>
<div class="menu">
</div>

<div class="navi">
<?php if($session['id']) { ?>
<a href="<?=$base?><?=$session['account_id']?>/"><?=$session['account_id']?></a>
<a href="?mode=edit"><?=_('Edit')?></a>
<!--<a href="./?mode=add"><?=_('Add')?></a>-->
<!--
<form action="<?=$base?>" method="get">
<input type="text" name="id">
<input type="submit" value="<?=_('Add')?>">
</form>
-->
<form id="signout" action="<?=$base?>sessions/<?=$session['id']?>" method="post">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="<?=_('Sign Out')?>">
</form>
<?php
} else {
?>
<a href="<?=$base?>sessions/"><?=_('Sign In')?></a>
<a href="<?=$base?>accounts/"><?=_('Create an account')?></a>
<?php } ?>
</div><!--navi-->
</div><!--header-->
