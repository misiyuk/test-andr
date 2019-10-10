<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('site/index.html.twig');
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contacts(ContactRepository $contactRepository)
    {
        $contacts = $contactRepository->findBy(['isPublic' => true]);

        return $this->render('site/contacts.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
