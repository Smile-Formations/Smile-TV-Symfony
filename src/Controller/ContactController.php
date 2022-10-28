<?php

namespace App\Controller;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Mailer\ContactMailer;

class ContactController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, ContactMailer $mailer): Response
    {
        $form = $this->createForm(ContactType::class, new ContactDTO());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /**@var ContactDTO $dto*/
            $dto = $form->getData();
            $mailer->sendHTMLEmail($dto);

            return $this->render('contact/index.html.twig', [
                'sent' => true
            ]);
        }

        return $this->renderForm('contact/index.html.twig', [
            'contact_form' => $form,
            'sent' => false
        ]);
    }
}
