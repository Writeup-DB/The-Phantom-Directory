<?php
echo "<h3>Level 8: The Archive Inspector</h3>";
echo "<p>Vulnerability: Arbitrary File Upload + <code>zip://</code> Wrapper RCE.</p>";

// Simple file upload logic restricting to .zip files
if (isset($_FILES['file'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($fileType != "zip") {
        echo "<span style='color:red;'>Error: Only .zip files are allowed.</span><br>";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "<span style='color:green;'>File uploaded to: " . htmlspecialchars($target_file) . "</span><br>";
        } else {
            echo "<span style='color:red;'>Upload failed.</span><br>";
        }
    }
}
?>
<form action="?level=8" method="post" enctype="multipart/form-data" style="margin-bottom: 20px;">
    Select ZIP file to upload:
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload Archive" name="submit">
</form>
<hr>
<?php
if (isset($_GET['page'])) {
    include($_GET['page']); 
} else {
    echo "<p>Use the <code>?page=</code> parameter to view files.</p>";
}
?>