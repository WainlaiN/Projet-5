<?php


namespace App\Manager;

/**
 * FormManager using SwiftMailer for ContactForm
 */

class FormManager
{
    public function fromTraitment($name, $forename, $email, $message)
    {

        $data = require __DIR__ . './../Config/mail.php';
        $transport = (new \Swift_SmtpTransport($data['SMTP'], 465,'ssl'))
            ->setUsername($data['email'])
            ->setPassword($data['password']);

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Message du Blog'))
            ->setFrom($email)
            ->setTo($data['email'])
            ->setBody($message);

        $mailer->send($message);
    }

    public function RegisterTraitment($email, $username)
    {

        $data = require __DIR__ . './../Config/mail.php';
        $transport = (new \Swift_SmtpTransport($data['SMTP'], 465,'ssl'))
            ->setUsername($data['email'])
            ->setPassword($data['password']);

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Confirmation de votre inscription ' . $username ))
            ->setFrom($email)
            ->setTo($data['email'])
            ->setBody($message);

        $mailer->send($message);
    }
}