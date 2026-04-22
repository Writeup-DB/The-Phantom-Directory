<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Phantom Directory | Advanced LFI/RFI Lab</title>
    <style>
        :root { --bg: #0d1117; --surface: #161b22; --accent: #58a6ff; --text: #c9d1d9; --border: #30363d; }
        body { font-family: 'Courier New', Courier, monospace; background-color: var(--bg); color: var(--text); margin: 0; display: flex; height: 100vh; }
        .sidebar { width: 250px; background-color: var(--surface); border-right: 1px solid var(--border); padding: 20px; display: flex; flex-direction: column; }
        .sidebar h2 { color: var(--accent); font-size: 1.2rem; margin-top: 0; text-transform: uppercase; letter-spacing: 1px; }
        .sidebar a { color: var(--text); text-decoration: none; padding: 10px; margin: 5px 0; border-radius: 5px; border: 1px solid transparent; transition: all 0.3s; }
        .sidebar a:hover, .sidebar a.active { background-color: rgba(88, 166, 255, 0.1); border-color: var(--accent); color: var(--accent); }
        .content { flex: 1; padding: 40px; overflow-y: auto; }
        .target-box { background-color: rgba(255, 0, 0, 0.05); border: 1px dashed #ff7b72; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .terminal { background-color: #000; color: #0f0; padding: 20px; border-radius: 5px; margin-top: 20px; overflow-x: auto; box-shadow: inset 0 0 10px rgba(0,255,0,0.2); }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Phantom Dir</h2>
        <a href="?level=1" class="<?= ($_GET['level'] ?? '1') == '1' ? 'active' : '' ?>">Level 1: Basic LFI</a>
        <a href="?level=2" class="<?= ($_GET['level'] ?? '') == '2' ? 'active' : '' ?>">Level 2: Extension</a>
        <a href="?level=3" class="<?= ($_GET['level'] ?? '') == '3' ? 'active' : '' ?>">Level 3: Filter</a>
        <a href="?level=4" class="<?= ($_GET['level'] ?? '') == '4' ? 'active' : '' ?>">Level 4: URL Encode</a>
        <a href="?level=5" class="<?= ($_GET['level'] ?? '') == '5' ? 'active' : '' ?>">Level 5: Session LFI</a>
        <a href="?level=6" class="<?= ($_GET['level'] ?? '') == '6' ? 'active' : '' ?>">Level 6: Log Poison</a>
        <a href="?level=7" class="<?= ($_GET['level'] ?? '') == '7' ? 'active' : '' ?>">Level 7: Basic RFI</a>
        <a href="?level=8" class="<?= ($_GET['level'] ?? '') == '8' ? 'active' : '' ?>">Level 8: Zip Wrapper</a>
        <a href="?level=9" class="<?= ($_GET['level'] ?? '') == '9' ? 'active' : '' ?>">Level 9: Data Wrapper</a>
        <a href="?level=10" class="<?= ($_GET['level'] ?? '') == '10' ? 'active' : '' ?>">Level 10: PHP Input</a>
    </div>

    <div class="content">
        <div class="target-box">
            <strong>Target:</strong> Exploit the vulnerability to read <code>secret.txt</code>, and for advanced levels, achieve Remote Code Execution (RCE) to read <code>/root/root_flag.txt</code>.
        </div>
        <div class="terminal">
            <?php
            $level = $_GET['level'] ?? '1';
            $file = "level" . preg_replace("/[^1-6]/", "", $level) . ".php";
            
            if (file_exists($file)) {
                require_once($file);
            } else {
                echo "Error: Level module missing.";
            }
            ?>
        </div>
    </div>

</body>
</html>