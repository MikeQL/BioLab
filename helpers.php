<?php

function showError($errors, $field) {
    $alert = '';
    if (isset($errors[$field]) && !empty($field)) {
        $alert = "<div class='alert alert-error'>".$errors[$field]."</div>";
    }

    return $alert;
}

function clearErrors() {
    if (isset($_SESSION['errors'])) $_SESSION['errors'] = null;
    if (isset($_SESSION['status_success']))$_SESSION['status_success'] = null;
    if (isset($_SESSION['status_error'])) $_SESSION['status_error'] = null;

    return true;
}