<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig


{
    public string $fromEmail  = 'humphrey.dulo@strathmore.edu';
    public string $fromName   = 'Safari Stay';
    public string $recipients = '';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp';

    /**
     * SMTP Server Address
     */
    public string $SMTPHost = 'in-v3.mailjet.com';

    /**
     * SMTP Username
     */
    public string $SMTPUser = '0dc1c9790eaea8fd89139b5fa701c253';

    /**
     * SMTP Password
     */
    public string $SMTPPass = 'f2115ee08a271b8dec81e8451a43693a';

    /**
     * SMTP Port
     */
    public int $SMTPPort = 587;

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 10;

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = true;

    /**
     * SMTP Encryption. Either tls or ssl
     */
    public string $SMTPCrypto = 'tls';

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'html';

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     */
    public bool $validate = true;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;
}
