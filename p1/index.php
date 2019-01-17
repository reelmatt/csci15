<?php require('quotes.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Matthew Thomas — About</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body>
    <h1>Matthew Thomas</h1>
    <img src="images/me.jpg" alt="Taking a photo while hiking.">

    <h2>About Me</h2>
    <p>My name is Matthew, or reelmatt on the web. I received my undergraduate degree in Film/TV post production and currently work with educational video content. For the last year or so now I've been taking software engineering courses at the Extension school on a path towards hopefully earning a Master degree.</p><br/>
    <p>Some of my hobbies include watching lots of movies — I wrote a blog reviewing a movie per day for a whole year — and homebrewing. All my beers, just over ten now, are named after quotes from some of my favorite films, the latest being taken from <i>The Godfather</i>, "Take the Cannoli".

    <h2>Random Quote</h2>
    <p class="quote"><?php echo $randQuote; ?></p>
    <p class="person">––<?php echo $randPerson; ?></p>
</body>

</html>
