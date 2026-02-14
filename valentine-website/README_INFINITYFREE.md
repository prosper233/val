# Deploying to InfinityFree

Since you are moving to InfinityFree (a PHP host), the setup is different from Vercel.

## 1. Get the `vendor` folder (CRITICAL)
Your project uses `PHPMailer` to send emails. This requires a `vendor` folder containing the library code.
**This folder is missing from your local files because you don't have Composer installed.**

To get it:
1.  **Install Composer** on your computer: [Download Composer](https://getcomposer.org/download/)
2.  Open your terminal in this project folder (`c:\Users\McDeclan's\Desktop\val site\valentine-website`).
3.  Run: `composer install`
4.  A `vendor` folder will appear.

## 2. Upload to InfinityFree
1.  Open the **File Manager** (or use FTP like FileZilla) in your InfinityFree dashboard.
2.  Navigate to the `htdocs` folder.
3.  Upload **ALL** files from your `valentine-website` folder effectively:
    -   `index.html`
    -   `script.js`
    -   `send_mail.php`
    -   `public/` folder (with `style.css` and images)
    -   **`vendor/` folder** (IMPORTANT: The site will crash without this!)

## 3. SMTP Limitations
InfinityFree and other free hosts often **BLOCK** outgoing SMTP ports (like 465 or 587) to prevent spam.
-   If your email doesn't send, check if InfinityFree allows Gmail SMTP.
-   You might need to use their own SMTP server if they provide one.
-   The error message "Connection timed out" usually means the port is blocked.

## 4. Troubleshooting
-   If you see a blank page, check the browser console (F12).
-   If emails fail, check the network tab response from `send_mail.php`.
