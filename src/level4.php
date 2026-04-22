<?php
echo "<h3>Level 4: The Strict Inspector</h3>";
echo "<p>Vulnerability: WAF bypass via Double URL Encoding.</p><br>";

if (isset($_GET['page'])) {
    // The server inherently decodes the URL once. 
    // The developer manually decodes it again, assuming they caught everything.
    $page = urldecode($_GET['page']);
    
    // Strict block if the exact string '../' is found
    if (strpos($page, '../') !== false) {
        die("<span style='color:red;'>[WAF BLOCK] Traversal characters detected! Incident logged.</span>");
    }
    
    include($_GET['page']); // The original input is included, not the sanitized one!
} else {
    include("includes/welcome.php");
}
?>