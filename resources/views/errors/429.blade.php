<!DOCTYPE html>
<html>
<head>
	<title>Error 429 - Too Many Requests</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <style>


body {
	font-family: Arial, sans-serif;
	margin: 0;
	padding: 0;
	background-color: #f2f2f2;
}

header {
	background-color: #333;
	color: #fff;
	padding: 20px;
	text-align: center;
}

main {
	margin: 20px;
	text-align: center;
}

footer {
	background-color: #333;
	color: #fff;
	padding: 10px;
	text-align: center;
	position: fixed;
	bottom: 0;
	left: 0;
	width: 100%;
}

h1 {
	margin: 0;
}

p {
	margin: 0 0 20px 0;
}

#countdown {
	font-weight: bold;
	font-size: 24px;
}

@media (min-width: 768px) {
	main {
		margin: 40px auto;
		max-width: 600px;
	}
}


    </style>

</head>
<body>
	<header>
		<h1>Error 429 - Too Many Requests</h1>
		<p>Please try again in <span id="countdown">60</span> seconds</p>
	</header>
	<main>
		<p>Sorry, you have exceeded the number of requests allowed for this resource. Please wait for the countdown timer to finish before trying again.</p>
	</main>
	<footer>
		<p>&copy; 2023 - Pangasinan State University, Lingayen Campus</p>
	</footer>
	<script>

var timeleft = 60;
var downloadTimer = setInterval(function(){
  document.getElementById("countdown").innerHTML = timeleft;
  timeleft -= 1;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "0"
  }
}, 1000);


    </script>
</body>
</html>
