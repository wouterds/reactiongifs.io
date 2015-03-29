<header>
	<h1><a href="/">Reactiongifs.IO</a></h1>
	<h2>Gifs about everyday situations of designers &amp; developers!</h2>
	@if (isset($paging))
	<p class="current-page"><span>p</span>{{ $paging['current'] }}</p>
	@endif

	<p class="go-back hidden"><a data-id="go-back" href="#back"><i class="fa fa-chevron-left"></i></a></p>
</header>
