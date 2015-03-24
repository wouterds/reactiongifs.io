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
	<link rel="stylesheet" href="/layout/css/style.css">
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

	<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-57637936-3', 'auto'); ga('send', 'pageview');</script>
</body>
</html>
