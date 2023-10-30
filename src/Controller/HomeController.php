<?php

namespace App\Controller;

use App\Form\LanguageSwitchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    #[Route('/{_locale}', name: 'home', requirements: ['_locale' => 'en|es'])]
    public function index(Request $request, TranslatorInterface $translator, FormFactoryInterface $formFactory): Response
    {
        $greeting = $translator->trans('hello');
        $welcomeMessage = $translator->trans('welcome');

        $form = $formFactory->create(LanguageSwitchType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $locale = $form->get('locale')->getData();
            return $this->redirectToRoute('home', ['_locale' => $locale]);
        }

        return $this->render('home/index.html.twig', [
            'greeting' => $greeting,
            'welcomeMessage' => $welcomeMessage,
            'form' => $form->createView(),
        ]);
    }
}
