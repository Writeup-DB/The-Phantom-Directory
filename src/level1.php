<?php
echo "<h2>Level 1: The Open Door</h2>";
echo "<p>Current File: <code>" . htmlspecialchars($_GET['page'] ?? 'none') . "</code></p>";

// VULNERABILITY: Directly including user input
if (isset($_GET['page'])) {
    include($_GET['page']); 
} else {
    include("includes/welcome.php");
}
?>