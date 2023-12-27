<?php


function sanitizer($input)
{
    return trim(htmlentities(htmlspecialchars($input)));
}
function require_input($input)
{
    if (empty($input)) {
        return true;
    }
    return false;
}

function min_length($input, $min)
{
    if (strlen($input) < $min) {
        return true;
    }
    return false;
}
function max_length($input, $max)
{
    if (strlen($input) > $max) {
        return true;
    }
    return false;
}

function displayMessages($messages, $type) {
    if (isset($_SESSION[$type])) {
        foreach ($_SESSION[$type] as $message) {
            echo '<div class="alert alert-' . $type . ' text-center" role="alert">';
            echo $message;
            echo '</div>';
        }
        unset($_SESSION[$type]);
    }
}


function alert_display($class, $s_name)
{
    if (isset($s_name)) {
        foreach ($s_name as $item) {
            echo "<div class='alert $class text-center' role='alert'>";
            echo $item;
            echo "</div>";
        }
        unset($s_name);
    }
}

