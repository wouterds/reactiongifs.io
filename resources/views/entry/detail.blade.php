@include('base/_header')
	<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=1549015102029640&version=v2.0"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
	<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>

	<div id="wrapper">
		@include('includes/header')

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
		</main>
	</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/zepto/1.1.4/zepto.min.js"></script>
<script>
if (history && history.length) {
	var $goBack = $('a[data-id=go-back]');
	$goBack.parent().removeClass('hidden');

	$goBack.on('click', function(e) {
		e.preventDefault();
		
		history.back();
	})
}
</script>
@include('base/_footer')
