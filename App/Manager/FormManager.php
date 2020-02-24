<?php


namespace App\Manager;


class FormManager
{
    public function fromTraitment($nom, $prenom, $email, $message)
    {


// Create the Transport
        $transport = (new \Swift_SmtpTransport('smtp.example.org', 25))
            ->setUsername('your username')
            ->setPassword('your password');

// Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

// Create a message
        $message = (new \Swift_Message('Wonderful Subject'))
            ->setFrom(['john@doe.com' => 'John Doe'])
            ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
            ->setBody('Here is the message itself');

// Send the message
        $result = $mailer->send($message);


    }

    /**
     * $entetemail = "From: Blog Projet OpenClassroom <nicodupriez@hotmail.com>\r\n";
     * $entetemail .= "Reply-To: nicodupriez@hotmail.com\n";
     * $entetemail .= 'X-Mailer: PHP/'.phpversion()."\n";
     * $entetemail .= "Content-Type: text/plain; charset=utf8\r\n";
     * $objet = 'Comfirmation de la réception de votre message';
     * $message_email = 'Nous avons bien reçu votre message';
     *
     * mail($email, $objet, $message_email, $entetemail);
     *
     * $entetemail = 'From:'.$nom.' '.$prenom.' <'.$email.">\r\n";
     * $entetemail .= 'Reply-To: '.$email."\n";
     * $entetemail .= 'X-Mailer: PHP/'.phpversion()."\n";
     * $entetemail .= "Content-Type: text/plain; charset=utf8\r\n";
     * $objet = 'Contact depuis votre Blog';
     * $message_email = $message;
     *
     * mail('nicodupriez@hotmail.com', $objet, $message_email, $entetemail);
     * }**/
}