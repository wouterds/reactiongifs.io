<script src="//cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.6/fastclick.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/unveil/1.3.0/jquery.unveil.min.js"></script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-57637936-3', 'auto'); ga('send', 'pageview');

if ('addEventListener' in document) {
	document.addEventListener('DOMContentLoaded', function() {
		FastClick.attach(document.body);
	}, false);
}

var $left = $('.prev-next .left');
var $right = $('.prev-next .right');

$('.prev-next a').on('click', function() {
	$(this).addClass('active');
});

$(document).on('keydown', function(e) {
	var $selected = null;
	if (e.keyCode === 39 && $right.length) {
		$selected = $right;
	} else if (e.keyCode === 37 && $left.length) {
		$selected = $left;
	}

	if ($selected) {
		$left.removeClass('active');
		$right.removeClass('active');
		$selected.addClass('active');
		window.location = $selected.attr('href');
	}
});

$(document).ready(function() {
	$('img').unveil(100, function() {
		$(this).parent().addClass('loaded');
	});
});
</script>
</body>
</html>
