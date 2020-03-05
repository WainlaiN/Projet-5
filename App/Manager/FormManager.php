<?php


namespace App\Manager;

/**
 * FormManager using SwiftMailer for ContactForm
 */
class FormManager
{
    /**
     * Manage Home Form
     *
     * @param $name
     * @param $forename
     * @param $email
     * @param $message
     */
    public function fromTraitment($name, $forename, $email, $message)
    {

        $data = require __DIR__ . './../Config/mail.php';
        $transport = (new \Swift_SmtpTransport($data['SMTP'], 465, 'ssl'))
            ->setUsername($data['email'])
            ->setPassword($data['password']);

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Message du Blog'))
            ->setFrom($email)
            ->setTo($data['email'])
            ->setBody($message);

        $mailer->send($message);
    }

    /**
     * Manage register form
     *
     * @param $email
     * @param $username
     */
    public function registerTraitment($email, $username)
    {

        $data = require __DIR__ . './../Config/mail.php';
        $transport = (new \Swift_SmtpTransport($data['SMTP'], 465, 'ssl'))
            ->setUsername($data['email'])
            ->setPassword($data['password']);

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Confirmation de votre inscription ' . $username))
            ->setFrom($email)
            ->setTo($data['email'])
            ->setBody('Votre inscription a bien été prise en compte');

        $mailer->send($message);
    }
}