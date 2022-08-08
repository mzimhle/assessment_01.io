<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// Requests
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

// Extras.
use App\Form\ActionForm;
use App\DTO\ActionDTO;

class HomeController extends AbstractController
{
    /**
     * Submit the form or show it
     *
     * @Route("/", name="app_home")
     */
    public function index(Request $request): Response
    {
        // populate the DTO with default values
        $ActionDTO = new ActionDTO();

        // Incase there are properties that need to be initialized, 
        // we will have two separate methods, this one and the below.
        return $this->handleActionDTO($request, $ActionDTO);
    }
    
    /**
     * Landing page for the website
     * 
     * @param Request $request 
     * @return Response
     *	
     */
    private function handleActionDTO(Request $request, ActionDTO $ActionDTO): Response
    {
        $ActionForm = $this->createForm(ActionForm::class, $ActionDTO, []);

        $ActionForm->handleRequest($request);

        if ($ActionForm->isSubmitted()) {
            if ($ActionForm->isValid()) {
                // Deliveries 
                $healthService->setName($ActionDTO->name);
                $healthService->setFacility($ActionDTO->facility);
                $healthService->setHealthProgram($ActionDTO->healthProgram);
            }
        }

        return $this->render('index.html.twig', [
            'ActionForm' => $ActionForm->createView()
        ]);
    }

    /**
     * Display error messages from a form
     */
    private function getErrorMessages(Form $form): array
    {
        $errors = array();

        foreach ($form->getErrors() as $key => $error) {
            if ($form->isRoot()) {
                $errors[] = $error->getMessage();
            } else {
                $errors[] = $error->getMessage();
            }
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                for ($i = 0; $i < count($this->getErrorMessages($child)); $i++) {
                    $errors[] = $child->getName().' - '.$this->getErrorMessages($child)[$i];
                }
            }
        }

        return $errors;
    }
    
}