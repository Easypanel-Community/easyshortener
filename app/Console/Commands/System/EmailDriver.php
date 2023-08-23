<?php

namespace App\Console\Commands\System;

use Illuminate\Console\Command;

class EmailDriver extends Command
{
    protected $signature = 'easyshortener:email';
    protected $description = 'Configure the email driver settings';

    public function handle()
    {
        $this->info('Welcome to the email configuration wizard!');
        $driver = $this->choice('Select an email driver to configure', ['SMTP', 'Mailgun', 'Postmark', 'Amazon SES', 'Sendmail', 'SendGrid'], 0);

        switch ($driver) {
            case 'SMTP':
                $this->configureSMTP();
                break;
            case 'Mailgun':
                $this->configureMailgun();
                break;
            case 'Postmark':
                $this->configurePostmark();
                break;
            case 'Amazon SES':
                $this->configureAmazonSES();
                break;
            case 'Sendmail':
                $this->configureSendmail();
                break;
            case 'SendGrid':
                $this->configureSendgridSMTP();
                break;
        }

        $this->info('Email configuration completed successfully!');
    }

    private function setEnv($name, $value)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $name . '=' . env($name), $name . '=' . $value, file_get_contents($path)));
        }
    }

    protected function configureSMTP()
    {
        // Configure SMTP settings
        $smtpHost = $this->ask('SMTP Host');
        $smtpPort = $this->ask('SMTP Port');
        $smtpUsername = $this->ask('SMTP Username');
        $smtpPassword = $this->secret('SMTP Password');

        // Update .env with SMTP settings
        $this->setEnv('MAIL_MAILER', 'smtp');
        $this->setEnv('MAIL_HOST', $smtpHost);
        $this->setEnv('MAIL_PORT', $smtpPort);
        $this->setEnv('MAIL_USERNAME', $smtpUsername);
        $this->setEnv('MAIL_PASSWORD', $smtpPassword);
    }

    protected function configureMailgun()
    {
        // Configure Mailgun settings
        $mailgunDomain = $this->ask('Mailgun Domain');
        $mailgunSecret = $this->secret('Mailgun Secret');

        // Update .env with Mailgun settings
        $this->setEnv('MAIL_MAILER', 'mailgun');
        $this->setEnv('MAILGUN_DOMAIN', $mailgunDomain);
        $this->setEnv('MAILGUN_SECRET', $mailgunSecret);
    }

    protected function configurePostmark()
    {
        // Configure Postmark settings
        $postmarkToken = $this->ask('Postmark Token');

        // Update .env with Postmark settings
        $this->setEnv('MAIL_MAILER', 'postmark');
        $this->setEnv('POSTMARK_TOKEN', $postmarkToken);
    }

    protected function configureAmazonSES()
    {
        // Configure Amazon SES settings
        $sesKey = $this->ask('Amazon SES Key');
        $sesSecret = $this->secret('Amazon SES Secret');
        $sesRegion = $this->ask('Amazon SES Region');

        // Update .env with Amazon SES settings
        $this->setEnv('MAIL_MAILER', 'ses');
        $this->setEnv('AWS_ACCESS_KEY_ID', $sesKey);
        $this->setEnv('AWS_SECRET_ACCESS_KEY', $sesSecret);
        $this->setEnv('AWS_DEFAULT_REGION', $sesRegion);
    }

    protected function configureSendmail()
    {
        // Update .env with Sendmail settings
        $this->setEnv('MAIL_MAILER', 'sendmail');
    }

    protected function configureSendgridSMTP()
    {
        // Configure SendGrid SMTP settings
        $sendgridApiKey = $this->secret('SendGrid API Key');
        $smtpHost = 'smtp.sendgrid.net';
        $smtpPort = 587;
        $smtpUsername = 'apikey';
        $smtpPassword = $sendgridApiKey;

        // Update .env with SendGrid SMTP settings
        $this->setEnv('MAIL_MAILER', 'smtp');
        $this->setEnv('MAIL_HOST', $smtpHost);
        $this->setEnv('MAIL_PORT', $smtpPort);
        $this->setEnv('MAIL_USERNAME', $smtpUsername);
        $this->setEnv('MAIL_PASSWORD', $smtpPassword);
        $this->setEnv('MAIL_ENCRYPTION', 'tls'); // or 'ssl'
    }
}
