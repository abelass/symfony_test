<?php
// src/Controller/PageController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

 class PageController {
    /**
     * @Route("/page/{id}", name="page_content"))
    */
  public function index(int $id)
  {

      return new Response(
          '<html><body>id : ' . $id .'</body></html>'
      );
  }

 }