<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reactiongifs.IO | GIFs about everyday situations of designers & developers!</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="robots" content="index, follow">
	<meta property="og:title" content="Reactiongifs.IO | GIFs about everyday situations of designers & developers!">
	<meta property="og:image" content="https://reactiongifs.io/layout/img/reactiongifs.jpg">
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
		padding: 75px 25px 65px;
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

	<div id="wrapper">

		<header>
			<h1>Reactiongifs.IO</h1>
			<h2>Gifs about everyday situations of designers &amp; developers!</h2>
			<p class="current-page"><span>p</span>{{ $paging['current'] }}</p>
		</header>

		<main>

			@foreach($entries as $entry)

			<article class="entry">

				<header>
					<h2><a href="/{{ $entry->slug }}-{{ $entry->encoded_id }}">{{ $entry->title }}</a></h2>
				</header>

				<a href="/{{ $entry->slug }}-{{ $entry->encoded_id }}">
					<img src="{{ $entry->picture->url }}" alt="{{ $entry->title }}">
				</a>

			</article>

			@endforeach
		</main>

		<footer>
			@if ($paging['prev'])
			<a href="/page/{{ $paging['prev'] }}" class="pagination left"><i class="fa fa-chevron-left"></i></a>
			@endif

			<div class="pagination center">
				@for($i = $paging['current'] - 3; $i < $paging['current']; $i++)
				@if ($i > 0)
				<a href="/page/{{ $i }}">{{ $i }}</a>
				@endif
				@endfor

				<span class="current">{{ $paging['current'] }}</span>

				@for($i = $paging['current'] + 1; $i < $paging['current'] + 4 + ($paging['current'] < 4 ? 4 - $paging['current'] : 0 ); $i++)
				@if ($i <= $paging['total'])
				<a href="/page/{{ $i }}">{{ $i }}</a>
				@endif
				@endfor
			</div>

			@if ($paging['next'])
			<a href="/page/{{ $paging['next'] }}" class="pagination right"><i class="fa fa-chevron-right"></i></a>
			@endif
		</footer>
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
