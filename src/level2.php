<?php
echo "<h2>Level 2: The .PHP Restrictor</h2>";
echo "<p>Current File: <code>" . htmlspecialchars($_GET['page'] ?? 'none') . ".php</code></p>";

if (isset($_GET['page'])) {
    $file = $_GET['page'];
    
    // VULNERABILITY: Appending .php. 
    // Attackers can use PHP wrappers to bypass this and read source code.
    include($file . ".php"); 
} else {
    include("includes/welcome.php");
}
?>