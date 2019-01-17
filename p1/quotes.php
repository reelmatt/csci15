<?php
$quotes = array(
  array(
    'quote' => "Moral indignation is jealousy with a halo.",
    'person' => "H. G. Wells",
  ),
  array(
    'quote' => "Glory is fleeting, but obscurity is forever.",
    'person' => "Napoleon Bonaparte",
  ),
  array(
    'quote' => "The whole problem with the world is that fools and fanatics are always so certain of themselves, and wiser people so full of doubts.",
    'person' => "Bertrand Russell",
  ),
  array(
    'quote' => "Victory goes to the player who makes the next-to-last mistake.",
    'person' => "Savielly Grigorievitch Tartakower",
  ),
  array(
    'quote' => "Don't be so humble - you are not that great.",
    'person' => "Golda Meir",
  ),
  array(
    'quote' => "His ignorance is encyclopedic.",
    'person' => "Abba Eban",
  ),
  array(
    'quote' => "If a man does his best, what else is there?",
    'person' => "General George S. Patton",
  ),
  array(
    'quote' => "Political correctness is tyranny with manners.",
    'person' => "Charlton Heston",
  ),
  array(
    'quote' => "You can avoid reality, but you cannot avoid the consequences of avoiding reality.",
    'person' => "Ayn Rand",
  ),
  array(
    'quote' => "When one person suffers from a delusion it is called insanity; when many people suffer from a delusion it is called religion.",
    'person' => "Robert Pirsig",
  ),
);

$randPick = array_rand($quotes, 1);
$randQuote = $quotes[$randPick]['quote'];
$randPerson = $quotes[$randPick]['person'];
