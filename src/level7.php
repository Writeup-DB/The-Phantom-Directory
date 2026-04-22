<?php
echo "<h3>Level 7: The External Resource</h3>";
echo "<p>Vulnerability: Remote File Inclusion (RFI).</p><br>";

if (isset($_GET['page'])) {
    // No filters, but the goal is to execute code from a remote server you control.
    include($_GET['page']); 
} else {
    include("includes/welcome.php");
}
?>