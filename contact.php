<?php 

$isSend = mail("g.muntoni.cs@gmail.com", $_POST['subject'], $_POST['message'], array('From' => $_POST['email']));

if ($isSend) {
    echo "OK";
} else {
    var_dump(error_get_last()['message']);
}
