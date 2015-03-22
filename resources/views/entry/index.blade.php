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
					<h2>{{ $entry->title }}</h2>
				</header>

				<img src="{{ $entry->picture->url }}" alt="{{ $entry->title }}">

			</article>

			@endforeach

		</main>

		<footer>
			{!! $entries->render() !!}
		</footer>

	</center>

</body>
</html>
