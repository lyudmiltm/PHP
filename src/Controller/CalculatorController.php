<?php

namespace App\Controller;

use App\Entity\Calculator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculatorController extends AbstractController
{
    public function calculate() {
        $calculator = new Calculator();
        $expression = "";
        $result = "";
        $error = "";
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['expression']) && $_POST['expression'] !== "") {
                $expression = $_POST['expression'];
                $result = $calculator->eval($expression);
            } else {
                $error = "You must enter a valid (non empty) expression!";
            }
        }
        
        return $this->render('calculator.html.twig', [
            'expression' => $expression,
            'result' => $result,
            'error' => $error,
        ]);
    }
}
