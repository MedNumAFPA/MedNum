<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashBoardAdminController extends AbstractController
{
    #[Route('/dashboardadmin', name: 'app_dash_board_admin')]
    public function index(): Response
    {
        return $this->render('dash_board_admin/index.html.twig', [
            'controller_name' => 'DashBoardAdminController',
        ]);
    }
}
