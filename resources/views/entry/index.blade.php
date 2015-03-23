<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reactiongifs.IO</title>
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
	}

	main article img {
		width: 100%;
	}

	main article + article {
		margin-top: 35px;
	}

	footer {
		margin-top: 15px;
	}
	</style>
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
