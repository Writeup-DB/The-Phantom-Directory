<?php
echo "<h3>Level 6: Apache Log Poisoning</h3>";
echo "<p>Vulnerability: File Inclusion of system log files.</p><br>";

if (isset($_GET['page'])) {
    include($_GET['page']); 
} else {
    include("includes/welcome.php");
}
?>