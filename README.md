# The Phantom Directory: Advanced File Inclusion Lab

![Lab Status](https://img.shields.io/badge/Status-Vulnerable-red.svg)
![Docker](https://img.shields.io/badge/Docker-Supported-blue.svg)

## Overview

**The Phantom Directory** is a comprehensive, Dockerized practice environment designed for cybersecurity enthusiasts and professionals to practice Local File Inclusion (LFI), Remote File Inclusion (RFI), and progression to Remote Code Execution (RCE). 

This lab contains 10 escalating levels of difficulty, starting from basic unsanitized includes to bypassing filters using advanced PHP wrappers and poisoning techniques.

<img width="1884" height="661" alt="image" src="https://github.com/user-attachments/assets/bc5f4d3e-53a6-4d9b-a40c-7bd7dcb087e9" />

---

## Disclaimer

**WARNING:** This application is intentionally vulnerable to severe security exploits. 
* **DO NOT** host this application on a public-facing web server or VPS.
* Run this exclusively in an isolated local environment (like Docker desktop on your local machine).
* This project is strictly for educational purposes and authorized security training.

---

## Challenges

The lab is structured into 10 levels:

| Level | Vulnerability / Technique | Goal |
| :--- | :--- | :--- |
| **Level 1** | Basic LFI | Read local files (e.g., `secret.txt`, `/etc/passwd`) |
| **Level 2** | Extension Mitigation (`.php` append) | Read source code using `php://filter` |
| **Level 3** | Traversal Filter (`str_replace`) | Bypass basic WAF using nested traversals (`....//`) |
| **Level 4** | Double URL Encoding | Bypass strict strict WAF checks |
| **Level 5** | Session Poisoning | Inject PHP into sessions, escalate LFI to RCE |
| **Level 6** | Apache Log Poisoning | Inject PHP into User-Agent, escalate LFI to RCE |
| **Level 7** | Basic RFI | Execute remote code via HTTP payload |
| **Level 8** | Zip Wrapper LFI | Bypass upload restrictions via `zip://` wrapper RCE |
| **Level 9** | Data Wrapper | Bypass `http://` blocklist using `data://` wrapper |
| **Level 10**| PHP Input Wrapper | Execute raw POST payload via `php://input` |

---

## 🛠️ Installation & Setup

### Prerequisites
* [Docker](https://www.docker.com/products/docker-desktop)
* [Docker Compose](https://docs.docker.com/compose/install/)

### Booting the Lab

1. Clone or download the repository to your local machine.
2. Navigate to the `phantom-directory-advanced` folder.
3. Build and start the container using Docker Compose:

```bash
docker-compose up --build -d
```

Access the lab interface in your web browser:

URL: http://localhost:8080

### Stopping the Lab
To stop and remove the containers, run:

```bash
docker-compose down
```

## Flags and Objectives
There are two main objectives in this lab:

- The LFI Objective: Read the contents of secret.txt located in the web root.
  - Flag format: FLAG{Ph4nt0m_F1l3s_R3v3al3d}
- The RCE Objective (Levels 5-10): Achieve Remote Code Execution and read the system root flag located at /root/root_flag.txt.
  - Flag format: FLAG{D0ck3r_R00t_C0mpr0m1s3d}

## Author
Author: Touhid
Developed for WriteupDB Academy educational web application security training.
