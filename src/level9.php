<?php
echo "<h3>Level 9: Protocol Blacklist</h3>";
echo "<p>Vulnerability: Blacklist bypass via <code>data://</code> wrapper.</p><br>";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    
    // Developer attempts to block RFI
    if (preg_match('/^https?:\/\//i', $page)) {
        die("<span style='color:red;'>[WAF] Remote HTTP/HTTPS inclusions are blocked.</span>");
    }

    include($page); 
} else {
    include("includes/welcome.php");
}
?>