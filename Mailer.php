<?php
/**
 * Mailer Class using PHPMailer for Jasprit Singh Sanu Portfolio
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__ . '/');
}

require_once ROOT_PATH . 'PHPMailer/src/Exception.php';
require_once ROOT_PATH . 'PHPMailer/src/PHPMailer.php';
require_once ROOT_PATH . 'PHPMailer/src/SMTP.php';

class Mailer {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);
        
        // SMTP Configuration
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.gmail.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'codecpp019@gmail.com';
        $this->mail->Password   = 'spfj cfvv yycf apmw'; // Gmail App Password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;
        $this->mail->CharSet    = 'UTF-8';

        // SSL options for local XAMPP/Windows compatibility
        $this->mail->SMTPOptions = [
            'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true
            ]
        ];
        
        // Default From Header
        $this->mail->setFrom('codecpp019@gmail.com', 'Jasprit Portfolio Contact');
    }

    /**
     * Send contact form notification to portfolio owner
     * 
     * @param string $senderName Name of the person filling the form
     * @param string $senderEmail Email of the person filling the form
     * @param string $messageContent Message content
     * @param string $targetEmail Email address where the notification will be sent
     * @return bool True if email sent successfully, false otherwise
     */
    public function sendContactMessage(string $senderName, string $senderEmail, string $messageContent, string $targetEmail = 'codecpp019@gmail.com'): bool {
        try {
            $this->mail->clearAddresses();
            $this->mail->clearReplyTos();

            // Destination address
            $this->mail->addAddress($targetEmail, 'Jasprit Singh Sanu');
            
            // Set Reply-To so clicking 'Reply' in Gmail directly replies to the sender
            $this->mail->addReplyTo($senderEmail, $senderName);
            
            $this->mail->isHTML(true);
            $this->mail->Subject = "New Portfolio Message from " . $senderName;
            
            $safeName    = htmlspecialchars($senderName, ENT_QUOTES, 'UTF-8');
            $safeEmail   = htmlspecialchars($senderEmail, ENT_QUOTES, 'UTF-8');
            $safeMessage = nl2br(htmlspecialchars($messageContent, ENT_QUOTES, 'UTF-8'));
            $sentTime    = date('F j, Y, g:i a T');
            $ipAddress   = htmlspecialchars($_SERVER['REMOTE_ADDR'] ?? 'Unknown', ENT_QUOTES, 'UTF-8');

            $this->mail->Body = "
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset='utf-8'>
                <style>
                    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #0f172a; color: #f8fafc; margin: 0; padding: 20px; }
                    .card { max-width: 600px; margin: 0 auto; background: #1e293b; border: 1px solid #334155; border-radius: 12px; padding: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
                    .header { border-bottom: 2px solid #3b82f6; padding-bottom: 15px; margin-bottom: 20px; }
                    .header h2 { margin: 0; color: #38bdf8; font-size: 22px; }
                    .field { margin-bottom: 15px; }
                    .label { font-size: 12px; font-weight: bold; text-transform: uppercase; color: #94a3b8; letter-spacing: 0.05em; margin-bottom: 4px; }
                    .value { font-size: 15px; color: #f1f5f9; }
                    .message-box { background: #0f172a; border-left: 4px solid #3b82f6; padding: 15px; border-radius: 6px; font-size: 15px; line-height: 1.6; color: #e2e8f0; margin-top: 10px; white-space: pre-wrap; }
                    .footer { font-size: 12px; color: #64748b; margin-top: 25px; padding-top: 15px; border-top: 1px solid #334155; text-align: center; }
                </style>
            </head>
            <body>
                <div class='card'>
                    <div class='header'>
                        <h2>📬 New Contact Form Submission</h2>
                    </div>
                    <div class='field'>
                        <div class='label'>Sender Name</div>
                        <div class='value'><strong>{$safeName}</strong></div>
                    </div>
                    <div class='field'>
                        <div class='label'>Sender Email</div>
                        <div class='value'><a href='mailto:{$safeEmail}' style='color:#38bdf8;text-decoration:none;'>{$safeEmail}</a></div>
                    </div>
                    <div class='field'>
                        <div class='label'>Message Content</div>
                        <div class='message-box'>{$safeMessage}</div>
                    </div>
                    <div class='footer'>
                        Sent from Jasprit Singh Sanu Portfolio • {$sentTime} • IP: {$ipAddress}
                    </div>
                </div>
            </body>
            </html>
            ";

            $this->mail->AltBody = "New Portfolio Message from {$senderName}\n"
                                 . "Email: {$senderEmail}\n"
                                 . "Date: {$sentTime}\n"
                                 . "IP: {$ipAddress}\n\n"
                                 . "Message:\n{$messageContent}\n";

            return $this->mail->send();
        } catch (Exception $e) {
            error_log("Portfolio Mailer Error: " . $this->mail->ErrorInfo);
            return false;
        }
    }
}
