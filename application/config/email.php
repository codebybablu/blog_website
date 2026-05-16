<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//  email configuration moved to config/email.php for better organization and security

// removing credentials for SMTP for security reasons 
$config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_user' => '',
    'smtp_pass' => '',
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'newline'   => "\r\n",
    'wordwrap'  => TRUE
);