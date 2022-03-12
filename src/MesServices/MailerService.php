<?php 

namespace App\MesServices;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class MailerService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendContactMail(array $data)
    {
        $email = (new TemplatedEmail())
                ->from('contact@flyde.com')
                ->to('contact@flyde.com')
                ->subject($data['subject'])

                // path of the Twig template to render
                ->htmlTemplate('emails/email_contact.html.twig')

                // pass variables (name => value) to the template
                ->context([
                    'subject' => $data['subject'],
                    'content' => $data['content'],
                    'fullname' => $data['fullname'],
                    'email_customer' => $data['email'],
                    'telephone' => $data['telephone']
                ])
            ;

        $this->mailer->send($email);
    }
}