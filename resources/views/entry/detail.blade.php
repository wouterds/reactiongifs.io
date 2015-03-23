<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $entry->title }} | Reactiongifs.IO</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="robots" content="index, follow">
	<meta property="og:title" content="{{ $entry->title }}">
	<meta property="og:url" content="{{ Request::url() }}">
	<meta property="og:image" content="https:{{ $entry->picture->url }}">
	<link rel="icon" href="/layout/img/reactiongifs.jpg">
	<link rel="apple-touch-icon-precomposed" href="/layout/img/reactiongifs.jpg">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700italic,700,500italic' rel='stylesheet' type='text/css'>
	<style type="text/css">
	html,
	body {
		width: 100%;
		height: 100%;
		overflow: hidden;
	}

	html,
	body,
	#wrapper {
		height: 100%;
		padding: 0;
		margin: 0;
	}

	body {
		font-family: Roboto, Arial, sans-serif;
		font-size: 62.5%;
		background: #fff;
	}

	#wrapper {
		font-size: 1.6em;
		position: relative;
		overflow: scroll;
		-webkit-overflow-scrolling: touch;
	}

	#wrapper > header {
		background: #d5002d;
		color: #fff;
		font-weight: 600;
		text-transform: uppercase;
		font-style: italic;
		padding: 15px 100px 15px 30px;
		font-size: 1.4em;
		position: fixed;
		width: 100%;
		box-sizing: border-box;
	}

	#wrapper > header h1,
	#wrapper > header h2 {
		margin: 0;
		padding: 0;
		display: inline-block;
	}

	#wrapper > header p.current-page {
		background: #2a2831;
		color: #fff;
		display: inline-block;
		top: 0;
		right: 0;
		bottom: 0;
		position: absolute;
		margin: 0;
		padding: 0 25px 0 30px;
  		vertical-align: middle;
	}

	#wrapper > header p.current-page:before {
		content: '';
		display: inline-block;
		height: 100%;
		vertical-align: middle;
		margin-right: -0.25em;
	}

	#wrapper > header p.current-page span {
		color: #999;
		padding-right: 5px;
	}

	#wrapper > header h2 {
		font-size: 1em;
		margin-left: 30px;
		margin-top: 5px;
		margin-bottom: 5px;
	}

	#wrapper > footer {
		position: fixed;
		bottom: 0;
		left: 0;
		width: 100%;
		text-align: center;
	}

	#wrapper > footer a.pagination {
		background: #d5002d;
		color: #fff;
		text-decoration: none;
		height: 40px;
		width: 40px;
		line-height: 40px;
		font-size: 1.4em;
		display: inline-block;
		position: absolute;
	}

	#wrapper > footer .pagination.center {
		bottom: 0;
		background: #d5002d;
		color: #fff;
		display: inline-block;
		min-width: 200px;
		height: 40px;
		padding: 0 10px;
		border-top-right-radius: 3px;
		border-top-left-radius: 3px;
		line-height: 44px;
		overflow: hidden;
		margin-bottom: -4px;
	}

	#wrapper > footer .pagination.center .current {
		background: #2a2831;
		font-weight: 600;
		font-style: italic;
		font-size: 1.2em;
		height: 40px;
		display: inline-block;
		padding: 0 15px;
		float: left;
	}

	#wrapper > footer .pagination.center a {
		color: #fff;
		font-weight: 500;
		text-decoration: none;
		padding: 0 5px;
		min-width: 30px;
		display: inline-block;
		float: left;
	}

	#wrapper > footer .pagination.center a:hover {
		background: rgba(0, 0, 0, 0.1);
	}

	#wrapper > footer a.pagination:hover {
		background: #2a2831;
	}

	#wrapper > footer a.pagination.left {
		left: 0;
		bottom: 0;
		border-top-right-radius: 3px;
		padding-right: 3px;
	}

	#wrapper > footer a.pagination.right {
		right: 0;
		bottom: 0;
		border-top-left-radius: 3px;
		padding-left: 3px;
	}

	.pagination li {
		list-style: inside;
		list-style-type: none;
		display: inline-block;
		padding: 5px;
	}

	main {
		max-width: 720px;
		padding: 75px 25px 25px;
		width: 100%;
		margin: 0 auto;
		box-sizing: border-box;
	}

	main article img {
		width: 100%;
		box-sizing: border-box;
	}

	main article {
		padding: 10px;
		font-size: 1.2em;
	}

	main article a {
		text-decoration: none;
		color: #2a2831;
	}

	main article .comments {
		margin-top: 15px;
	}

	main article + article {
		margin-top: 35px;
	}

	main article .social div,
	main article .social iframe {
		vertical-align: top;
		line-height: 0;
	}

	main article .social iframe {
		max-width: 92px;
	}
	</style>
	<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=1549015102029640&version=v2.0"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
	<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>

	<div id="wrapper">

		<header>
			<h1>Reactiongifs.IO</h1>
			<h2>Gifs about everyday situations of designers &amp; developers!</h2>
		</header>

		<main>

			<article class="entry">

				<header>
					<h2>{{ $entry->title }}</h2>
				</header>

				<img src="{{ $entry->picture->url }}" alt="{{ $entry->title }}">


				<div class="social">
					<a class="twitter-share-button" href="https://twitter.com/share" data-text="{{ $entry->title }}">Tweet</a>
					<div class="fb-share-button" data-layout="button_count"></div>
				</div>

				<div class="comments">
					<div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
				</div>

			</article>

			<!--
			<footer>
				@if ($nextEntry)
				<a href="/{{ $nextEntry->slug }}-{{ $nextEntry->encoded_id }}">< Next</a>
				@endif
				|
				@if ($prevEntry)
				<a href="/{{ $prevEntry->slug }}-{{ $prevEntry->encoded_id }}">Previous ></a>
				@endif
			</footer>
			-->

		</main>

	</div>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-57637936-3', 'auto');
	  ga('send', 'pageview');

	</script>
</body>
</html>
