<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController{

    /**
     * @Route("/blog", name="blog_list")
     */
    public function list()
    {
        // ...
    }

    
}