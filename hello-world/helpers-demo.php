<?php
# Import the helper functions
require 'helpers.php';

# Then test them out:
var_dump('hi');
dump('hi');
var_dump(['apples', 'oranges', 'pears']);
dump(['apples', 'oranges', 'pears']);
dump(sanitize('<script>alert("Hi!")</script>'));
