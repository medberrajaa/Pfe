<?php
    function sql_injection(string $input):string {
        $pattern = '/[^a-zA-Z0-9_@.\-\séàùïîâêûüënè]+/'; // match any email
        $sanitized_input = preg_replace($pattern, '', $input); // remove any non-word characters
        return $sanitized_input;
    }
    function xss_attack(string $input):string {
        $pattern = '/<[^>]*>|[\'"\\\]/'; // match any HTML tags and special characters
        $sanitized_input = preg_replace($pattern, '', $input); // remove any HTML tags and special characters
        return $sanitized_input;
    }
    function validate_input(string $input):string {
        $input = stripslashes($input);
        $input = xss_attack($input);
        $input = sql_injection($input);
        return $input;
    }
?>