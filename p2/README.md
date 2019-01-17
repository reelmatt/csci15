# Project 2
+ By: *Matthew Thomas*
+ Production URL: <http://p2.reelmatt.me>

## Outside resources
+ Form CSS help <https://www.w3schools.com/css/css_form.asp>
+ Using PHP to add class to HTML element <https://stackoverflow.com/questions/25786205/change-an-elements-css-class-with-php>
+ Check if variable is empty in PHP <http://php.net/manual/en/function.empty.php>
+ Reference for HTML select/option <https://www.w3schools.com/html/html_form_elements.asp>
+ Copied example code from [your page on extending Form.php](https://github.com/susanBuck/dwa15-spring2018/blob/master/php/form.php-extending.md)
to allow form to properly process decimal values for the bill total.

## Code style divergences
+ Some lines on the index.php page exceed 80 characters (the longest is 111).
+ All lines in index-logic.php are under 80 characters.

## Notes for instructor
I made minor changes to Form.php, in addition to creating ExpandedForm.php
(which, as noted above, copies code from [your example](https://github.com/susanBuck/dwa15-spring2018/blob/master/php/form.php-extending.md) on
extending Form.php). The changes to Form.php for the getErrorMessage() function. It adds an entry for the new method decimal()
and changes wording on the numeric() method to specify it accepts *integer* numbers.