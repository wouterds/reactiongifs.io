@include('base/_header')

	<div id="wrapper">
		@include('includes/header')

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

@include('base/_footer')
