<?php

$booksJson = file_get_contents('books.json');

$books = json_decode($booksJson, true);

$haveResults = false;

/*
if (isset($_POST['searchTerm'])) {
    $searchTerm = $_POST['searchTerm'];
} else {
  $searchTerm = false;
}*/


$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';
$caseSensitive= isset($_POST['caseSensitive']) ? true : false;

if ($searchTerm) {



    foreach ($books as $title => $book) {
      if ($caseSensitive) {
        $match = $title == $searchTerm;
      } else {
        $match = strtolower($title) == strtolower($searchTerm);
      }

        if(!$match) {
            unset($books[$title]);
        }
    }

    if (count($books) > 0) {
      $haveResults = true;
    }

}
