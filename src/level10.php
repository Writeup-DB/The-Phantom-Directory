<?php
echo "<h3>Level 10: The Postman</h3>";
echo "<p>Vulnerability: LFI to RCE via <code>php://input</code>.</p><br>";

if (isset($_GET['page'])) {
    // The developer forces a .php extension
    include($_GET['page'] . ".php"); 
} else {
    include("includes/welcome.php");
}
?>