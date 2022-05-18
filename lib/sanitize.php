<?php

    function sanitize($string) {
        $sanitized = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        return $sanitized;
    }
    function desanitize($string) {
        $desanitized = htmlspecialchars_decode($string, ENT_QUOTES, 'UTF-8');
        return $desanitized;
    }

?>
