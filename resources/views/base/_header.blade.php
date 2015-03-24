<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>{{ $meta['title'] }}</title>
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
@if ($meta['og']['title'])
<meta property="og:title" content="{{ $meta['og']['title'] }}">
@endif
@if ($meta['og']['image'])
<meta property="og:image" content="{{ $meta['og']['image'] }}">
@endif
<link rel="icon" href="/layout/img/reactiongifs.jpg">
<link rel="apple-touch-icon-precomposed" href="/layout/img/reactiongifs.jpg">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700italic,700,500italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/layout/css/style.css">
<!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
