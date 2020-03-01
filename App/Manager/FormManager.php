<?php


namespace App\Manager;


class FormManager
{
    public function fromTraitment($nom, $prenom, $email, $message)
    {
// Create the Transport
        $data = require __DIR__ . './../Config/mail.php';
        $transport = (new \Swift_SmtpTransport($data['SMTP'], 465,'ssl'))
            ->setUsername($data['email'])
            ->setPassword($data['password']);

// Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

// Create a message
        $message = (new \Swift_Message('Message du Blog'))
            ->setFrom($email)
            ->setTo($data['email'])
            ->setBody($message);

// Send the message
        $result = $mailer->send($message);


    }
}