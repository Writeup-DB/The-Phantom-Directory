<?php
session_start();
echo "<h3>Level 5: Session Poisoning</h3>";
echo "<p>Vulnerability: LFI + Unsanitized Session Data = RCE.</p>";

// Simulating a feature where a user sets their display name
if (isset($_GET['user'])) {
    $_SESSION['username'] = $_GET['user'];
    echo "<p>Hello, " . htmlspecialchars($_SESSION['username']) . "</p>";
} else {
    echo "<p>Set your username using the <code>?user=</code> parameter.</p><br>";
}

if (isset($_GET['page'])) {
    include($_GET['page']); 
} else {
    include("includes/welcome.php");
}
?>