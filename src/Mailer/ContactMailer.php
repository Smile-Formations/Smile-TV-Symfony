<?php

namespace App\Mailer;

use App\DTO\ContactDTO;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class ContactMailer
{
    public function __construct(private MailerInterface $mailer) {}
    /**
     * @throws TransportExceptionInterface
     */
    public function sendRawEmail(ContactDTO $contactDTO): void
    {
        $email = (new Email())
            ->from('smile-tv@smile.com')
            ->to('frederic.geffray@smile.fr')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            ->replyTo($contactDTO->getEmail())
            //->priority(Email::PRIORITY_HIGH)
            ->subject($contactDTO->getSubject())
            ->text($contactDTO->getMessage())
            ->html('<p>You just received an email from ' . $contactDTO->getName() . ' Smile TV</p>');

        $this->mailer->send($email);
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendHTMLEmail(ContactDTO $contactDTO): void
    {
        $email = (new TemplatedEmail())
            ->from('smile-tv@smile.com')
            ->to('frederic.geffray@smile.fr')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            ->replyTo($contactDTO->getEmail())
            ->subject($contactDTO->getSubject())
            ->htmlTemplate('emails/contact.html.twig')
            ->context([
                'name' => $contactDTO->getName(),
                'message' => $contactDTO->getMessage(),
            ]);

        $this->mailer->send($email);
    }
}
