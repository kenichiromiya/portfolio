<div id="header">
<div class="logo">
<h1>
<a href="<?=$base?>"><img src="<?=$base?>upload/logo.png"/></a>
</h1>
</div>

<div class="navi">
<?php if($session['id']) { ?>
<a href="<?=$base?><?=$session['account_id']?>/"><?=_('Home')?></a>
<form action="<?=$base?>sessions/<?=$session['id']?>" method="post">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="<?=_('Sign Out')?>">
</form>
<?php
} else {
?>
<a href="<?=$base?>sessions/"><?=_('Sign In')?></a>
<a href="<?=$base?>accounts/"><?=_('Create an account')?></a>
<?php } ?>
</div>
</div>
