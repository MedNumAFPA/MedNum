<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/mailtest', name: 'app_mail')]
    public function index(MailerInterface $mailer): Response
    {

        $email = (new Email())
            ->from('me@arnaudrabel.com')
            ->to('arnaud.rabel@gmail.com')
            ->subject('Test Email from Symfony!')
            ->text('This is the plain text version of the email.')
            ->html('<p>This is the <strong>HTML</strong> version of the email. If you see this, it worked!</p>');

        $mailer->send($email);

        return new Response('Test email has been sent! Check your inbox.');
    }
}
