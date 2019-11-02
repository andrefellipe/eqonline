<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- Stylesheet used to reset the browser's user agent stylesheet, allowing more flexibility for the development of the project. -->
	<link href="../resources/site/css/reset.css" type="text/css" rel="stylesheet">

	<!-- Link for the favicon of the website. -->
	<link rel="icon" href="../resources/site/images/favicon.ico" type="image/x-icon">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<!-- CSS stylesheet to specify the design of the elements of the page. -->
	<link href="../resources/site/css/style.css" type="text/css" rel="stylesheet">

	<!-- Initialize and add the map. -->
	<script>
		function initMap() {
			// E&Q's location
			var myLatLng = {lat: -5.8183398, lng: -35.200289};
			// The map, centered at E&Q
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 17,
				scrollwheel: false,
				draggable: false,
				center: myLatLng
			});
			// The marker, positioned at E&Q
			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: 'Engenharia & Qualidade'
			});
		}
	</script>

	<!-- Initialize and add the map. -->
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCF88DKo2KBtZe2VK30w1b9GEefAxuYa2Q&signed_in=true&callback=initMap"></script>

	<!-- Title of the website. -->
	<title>Engenharia & Qualidade</title>

</head>

<body>
