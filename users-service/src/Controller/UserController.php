<?php
// src/Controller/UserController.php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/users", methods={"POST"})
     */
    public function create(Request $request, EntityManagerInterface $em, MessageBusInterface $bus): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $user = new User();
        $user->setEmail($data['email']);
        $user->setFirstName($data['firstName']);
        $user->setLastName($data['lastName']);

        $em->persist($user);
        $em->flush();

        $bus->dispatch(new UserCreatedEvent($user->getId(), $user->getEmail(), $user->getFirstName(), $user->getLastName()));

        return new JsonResponse(['status' => 'User created!'], 201);
    }
}
