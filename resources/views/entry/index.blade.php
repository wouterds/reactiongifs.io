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
						<div class="image">
							<img src="/layout/img/loader.gif" data-src="{{ $entry->picture->url }}" alt="{{ $entry->title }}">
						</div>
					</a>
				</article>
			@endforeach
		</main>

		<nav class="prev-next">
			@if ($paging['prev'])
			<a href="/page/{{ $paging['prev'] }}" class="left"><i class="fa fa-chevron-left"></i></a>
			@endif

			@if ($paging['next'])
			<a href="/page/{{ $paging['next'] }}" class="right"><i class="fa fa-chevron-right"></i></a>
			@endif
		</nav>

		<footer>
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
		</footer>
	</div>

@include('base/_footer')
