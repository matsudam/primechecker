<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="{$css_url}style.css" type="text/css" />
	<title>{$service_name}</title>

	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
	</script>
	<![endif]-->
</head>
<body>

<!-- GoogleAnalytics-Start -->
{literal}
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-28045860-2', 'hanak.in');
  ga('send', 'pageview');
</script>
{/literal}
<!-- GoogleAnalytics-end -->

<header id="header">
	<a href="./"><img src="{$img_url}title.png" /></a>
</header>
<div id="main">

	<form action="/primechecker/?" method="get">
		<p>
			<input type="text" name="input" id="input" size="10" maxlength="8" value="" />
		</p>
		<p>
			<input type="submit" id="submit" value="チェック！" />
		</p>
	</form>

	<p id="msg">
		<span id="msg" class="err{$err}">{$msg}</span>
	</p>

	{if $num && !$err}
		<p>
		{assign var="i" value="0"}
		{$num} = 
		{foreach from=$primes item=val}
			{if $i}
				×
			{/if}
			{$val} 
			{assign var="i" value="1"}
		{/foreach}
		</p>
	{/if}
</div>
<footer id="footer">
	Copyright (C) {$smarty.now|date_format:"%Y"} <a href="http://matsudam.com" target="_blank">matsudam</a> All Rights Reserved.
</footer><!-- #footer -->

</body>
</html>