<?php
function show($stuff){
    echo '<pre>';
    print_r($stuff);
    echo '</pre>';
}

/*
  
    - When an attacker injects malicious JavaScript code into an unescaped input field, the code is literally displayed[runed] on the web page.

   - If the input is escaped using the esc() function, the special characters are replaced with their HTML-escaped equivalents, making the malicious code harmless.
 
*/

function esc($str){
    return htmlspecialchars($str);
}