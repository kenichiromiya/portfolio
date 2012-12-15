<html>
<head>
<title>Session</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<base href="<?=$base?>"/>
<link rel="stylesheet" type="text/css" href="<?=$base?>css/style.css"/>
</head>

<body>
<div id="wrapper">
<?php include("header.php")?>
<div id="subcontainer">

<form id="session" method="post" action="<?=$base?>sessions/">
<input type="hidden" name="_method" value="post">
<input type="hidden" name="done" value="<?=$done?>">
<label for="account_id"><?=_('Id')?></label>
<input id="account_id" type="text" name="account_id" value="<?=$req['account_id']?>"/><br/>
<label for="password"><?=_('Password')?></label>
<input id="password" type="password" name="password" /><br/>
<label for="persistent"><?=_('Persistent')?></label>
<input id="persistent" type="checkbox" name="persistent" /><br/>
<label for="submit"></label>
<input id="submit" type="submit" name="submit" value="<?=_('Submit')?>"/><br/>
</form>
</div><!--subcontainer-->
</div>
</body>
</html>
