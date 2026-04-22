<?php
echo "<h2>Level 3: The Traversal Filter</h2>";

if (isset($_GET['page'])) {
    $file = $_GET['page'];
    
    // VULNERABILITY: Non-recursive sanitization. 
    // It only strips '../' once. What happens if you nest them?
    $file = str_replace("../", "", $file);
    
    echo "<p>Attempting to load: <code>" . htmlspecialchars($file) . "</code></p>";
    include($file); 
} else {
    include("includes/welcome.php");
}
?>