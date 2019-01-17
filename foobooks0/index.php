<?php
require 'helpers.php';
require 'logic.php';
?>

<!DOCTYPE html>
<html lang=’en’>
<head>

    <title>Foobooks0</title>
    <meta charset=’utf-8’>


</head>

<body>
    <h1>Foobooks0</h1>

    <form method='POST' action='index.php'>
      <label>Search for a book:
      <input type='text' name='searchTerm' value='<?=sanitize($searchTerm)?>'>
    </label>

    <label>Case sensitive
    <input type='checkbox' name='caseSensitive' value='1' <?=($caseSensitive) ? 'checked' : ''?>>
    </label>
    <input type='submit' value='Search'>
    </form>

    <?php if ($searchTerm): ?>
      <p>You serached for <em><?=sanitize($searchTerm)?></em></p>
    <?php else: ?>
      <p>Welcome to foobooks0; enter a title above to search our library</p>
    <?php endif; ?>
    <?php if ($haveResults): ?>
      <?php foreach($books as $title => $book): ?>
          <div class='book'>
              <?=$title ?> by <?=$book['author']?>
              <img src='<?=$book['cover_url']?>' alt='Cover photo for the book <?=$title ?>'>
          </div>
      <?php endforeach ?>
    <?php elseif($searchTerm): ?>
      No results
    <?php endif; ?>
</body>
</html>
