<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reactiongifs.IO</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="robots" content="index, follow">
	<meta property="og:title" content="Reactionsgifs.IO">
	<style type="text/css">
	body {
		font-family: Roboto, Arial, sans-serif;
		font-size: 62.5%;
		padding: 0;
		background: #fafafa;
	}

	#wrapper {
		font-size: 1.6em;
		text-align: center;
	}

	.pagination li {
		list-style: inside;
		list-style-type: none;
		display: inline-block;
		padding: 5px;
	}

	main {
		max-width: 600px;
		padding: 25px;
		width: 100%;
		margin: 0 auto;
		box-sizing: border-box;
	}

	main article img {
		width: 100%;
		box-sizing: border-box;
	}

	main article {
		background: #fff;
		padding: 10px;
	}

	main article .comments {
		margin-top: 15px;
	}

	main article + article {
		margin-top: 35px;
	}

	footer {
		margin-top: 15px;
		background: #fff;
		padding: 5px;
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
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700italic,700,500italic' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
		<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div id="wrapper">

		<header>
			<h1>Reactiongifs.IO</h1>
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
			{!! $entries->render() !!}
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
