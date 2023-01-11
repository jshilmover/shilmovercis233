<?php
$emails = ["a@b.com", null, "ab.com", "   a@c.com", "b@c.com  ", "", "d@e .com", "f@g.com", "yahoo.com", "g@h.com"];

$emails = array_filter($emails);

function checkForAtSymbol($element) {
    return strpos($element, '@') !== false;
}

$emails = array_filter($emails, 'checkForAtSymbol');

$trimmedEmails = [];

foreach ($emails as $email) {
    array_push($trimmedEmails, str_replace(' ', '', $email));
}

sort($trimmedEmails);

print_r($trimmedEmails);

?>