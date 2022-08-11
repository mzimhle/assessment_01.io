<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// Requests
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

// Extras.
use App\Form\ActionForm;
use App\DTO\ActionDTO;
use App\Entity\User;

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
     *	
     */
    private function handleActionDTO(Request $request, ActionDTO $ActionDTO): Response
    {
        $ActionForm = $this->createForm(ActionForm::class, $ActionDTO, []);
        $user       = null;
        
        $ActionForm->handleRequest($request);

        if ($ActionForm->isSubmitted() && $ActionForm->isValid()) {
            $user = new User($ActionDTO->name, new DateTime($ActionDTO->date));
            // Add the delivery
            $user->delivery->setQuantity($ActionDTO->delivery_quantity);
            $user->delivery->setTime($ActionDTO->delivery_time);
            // Add the ride share
            $user->rideshare->setQuantity($ActionDTO->rideshare_quantity);
            $user->rideshare->setTime($ActionDTO->rideshare_time);
            // Add the rent
            $user->rent->setQuantity($ActionDTO->rent_quantity);
            $user->rent->setTime($ActionDTO->rent_time);
        }

        return $this->render('index.html.twig', [
            'ActionForm' => $ActionForm->createView(),
            'user' => $user
        ]);
    }

    /**
     * Display error messages from a form
     * @return mixed[]
     */
    private function getErrorMessages(Form $form): array
    {
        $errors = [];

        foreach ($form->getErrors() as $key => $error) {
            $errors[] = $form->isRoot() ? $error->getMessage() : $error->getMessage();
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                $getErrorMessagesCount = count($this->getErrorMessages($child));
                for ($i = 0; $i < $getErrorMessagesCount; ++$i) {
                    $errors[] = $child->getName().' - '.$this->getErrorMessages($child)[$i];
                }
            }
        }

        return $errors;
    }
    
}