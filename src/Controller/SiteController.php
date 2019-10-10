<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
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
        $contacts = $contactRepository->findAll();

        return $this->render('site/contacts.html.twig', [
            'contacts' => $contacts,
        ]);
    }
}
