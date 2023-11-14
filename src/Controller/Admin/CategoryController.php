<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/admin/category', name: 'admin_category')]
    public function index(): Response
    {
        return $this->render('admin/category/listeCategory.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
