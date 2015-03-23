<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reactiongifs.IO</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="robots" content="index, follow">
	<meta property="og:title" content="Reactionsgifs.IO">
	<style type="text/css">
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

	main article .comments {
		margin-top: 15px;
	}

	main article + article {
		margin-top: 35px;
	}

	footer {
		margin-top: 15px;
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

	<center>

		<header>
			<h1>Reactiongifs.IO</h1>
		</header>

		<hr>

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

	</center>

</body>
</html>
