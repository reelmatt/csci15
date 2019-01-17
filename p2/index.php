<?php
require 'includes/helpers.php';
require 'index-logic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Bill Splitter</title>
    <meta charset="UTF-8"/>
    <link rel='stylesheet' href='css/main.css'>
</head>

<body>
    <h1><a href='index.php'>Bill Splitter</a></h1>
    <form method='GET' action='index.php'>
        <p>
            <label>Split how many ways?
                <input type='text' name='numSplit' value='<?= $form->prefill('numSplit'); ?>'>
            </label>
        </p>
        <p>
            <label>How much was the bill?
                <input type='text' name='billTotal' value='<?= $form->prefill('billTotal'); ?>'>
            </label>
        </p>
        <p>
            <label for='tip'>How much tip would you like to add?</label>
            <select name='tip' id='tip'>
                <option value='0'>Choose one...</option>
                <?php foreach ($tipValues as $value => $percent) : ?>
                    <option value='<?= $value ?>' <?= ($tip == $value) ? 'selected' : '' ?>><?= $percent; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label>Round up?
                <input type='checkbox' name='round' value='1' <?= ($round) ? 'checked' : ''; ?>><br/>
            </label>
        </p>
        <p>
            <input type='submit' value='Calculate'>
        </p>
    </form>

    <?php if ($form->hasErrors): ?>
        <div class='warning'>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li class='bullet'><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif ($form->isSubmitted()): ?>
        <div class='results'>
            <p>The total, with <?= $tip ?>% tip, comes out to: $<?= $totalTip ?>
            <p>Split <?= $numSplit ?> ways, everyone owes $<?= $share ?> each.</p>
            <?php if ($round): ?>
                <p>With rounding, there will be $<?= $remainder ?> left over.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</body>

</html>