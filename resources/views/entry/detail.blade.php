<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $entry->title }} | Reactiongifs.IO</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<meta name="robots" content="index, follow">
	<meta property="og:title" content="{{ $entry->title }}">
	<meta property="og:url" content="{{ Request::url() }}">
	<meta property="og:image" content="{{ $entry->picture->url }}">
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
	<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=1549015102029640&version=v2.0"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
	<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>

	<center>

		<header>
			<h1>Reactiongifs.IO</h1>
		</header>

		<hr>

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

			<footer>
					<a href="{{ URL::previous() }}">Back</a>
			</footer>

		</main>

	</center>
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
