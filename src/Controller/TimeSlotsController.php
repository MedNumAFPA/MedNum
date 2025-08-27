<?php

namespace App\Controller;

use App\Entity\TimeSlots;
use App\Form\TimeSlotsType;
use App\Repository\TimeSlotsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/time/slots')]
final class TimeSlotsController extends AbstractController
{
    #[Route(name: 'app_time_slots_index', methods: ['GET'])]
    public function index(TimeSlotsRepository $timeSlotsRepository): Response
    {
        return $this->render('time_slots/index.html.twig', [
            'time_slots' => $timeSlotsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_time_slots_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $timeSlot = new TimeSlots();
        $form = $this->createForm(TimeSlotsType::class, $timeSlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($timeSlot);
            $entityManager->flush();

            return $this->redirectToRoute('app_time_slots_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('time_slots/new.html.twig', [
            'time_slot' => $timeSlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_time_slots_show', methods: ['GET'])]
    public function show(TimeSlots $timeSlot): Response
    {
        return $this->render('time_slots/show.html.twig', [
            'time_slot' => $timeSlot,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_time_slots_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TimeSlots $timeSlot, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TimeSlotsType::class, $timeSlot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_time_slots_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('time_slots/edit.html.twig', [
            'time_slot' => $timeSlot,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_time_slots_delete', methods: ['POST'])]
    public function delete(Request $request, TimeSlots $timeSlot, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$timeSlot->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($timeSlot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_time_slots_index', [], Response::HTTP_SEE_OTHER);
    }
}
