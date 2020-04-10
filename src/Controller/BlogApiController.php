<?php

// src/Controller/BlogApiController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BlogApiController extends AbstractController
{
    /**
     * @Route("/api/posts/{id}", methods={"GET","HEAD"})
     */
    public function show(int $id)
    {
        // ... return a JSON response with the post
    }

    /**
     * @Route("/api/posts/{id}", methods={"PUT"})
     */
    public function edit(int $id)
    {
        // ... edit a post
    }
}
