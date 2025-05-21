<?php
function is_loggedin() {
    $CI = &get_instance(); // Get CI instance
    if (!$CI->session->userdata('logged_in')) {
        redirect(base_url());
    }
}
?>