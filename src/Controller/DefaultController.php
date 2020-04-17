<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;

class DefaultController extends AbstractController{


  /**
   * @Route("/{_locale}", name="home"))
   */
    public function index($_locale, TranslatorInterface $translator)
    {
        return $this->render('base.html.twig', [
          '_locale' => $_locale,
          'title' => $translator->trans('title.home')
      ]);
    }
}
