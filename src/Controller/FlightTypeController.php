<?php

namespace App\Controller;

use App\Entity\Flight;
use App\Form\FlightType;
use App\Services\FlightService;
use App\Repository\FlightRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/flight")
 */
class FlightTypeController extends AbstractController
{

    private $em;
    function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    /**
     * @Route("/", name="flight_type_index", methods={"GET"})
     */
    public function index(FlightRepository $flightRepository): Response
    {
        //dd($flightRepository->findAll());
        return $this->render('flight_type/index.html.twig', [
            'flights' => $flightRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="flight_type_new", methods={"GET","POST"})
     */
    public function new(Request $request, FlightService $flightService): Response
    {
        $flight = new Flight();
        $flight->setNumero($flightService->getFlightNumber());

        $form = $this->createForm(FlightType::class, $flight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($flight);
            $this->em->flush();

            return $this->redirectToRoute('flight_type_index');
        }

        return $this->render('flight_type/new.html.twig', [
            'flight' => $flight,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="flight_type_show", methods={"GET"})
     */
    public function show(Flight $flight): Response
    {
        return $this->render('flight_type/show.html.twig', [
            'flight' => $flight,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="flight_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Flight $flight, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(FlightType::class, $flight);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash(
                'success',
                'Modifictation enregistrée avec succés!'
            );

            return $this->redirectToRoute('flight_type_edit', ['id' => $flight->getId()]);
        }

        return $this->render('flight_type/edit.html.twig', [
            'flight' => $flight,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="flight_type_delete", methods={"POST"})
     */
    public function delete(Request $request, Flight $flight): Response
    {
        if ($this->isCsrfTokenValid('delete'.$flight->getId(), $request->request->get('_token'))) {
            $this->em->remove($flight);
            $this->em->flush();
        }

        return $this->redirectToRoute('flight_type_index');
    }
}
