<?php

namespace App\Entity;

/**
 * Removed due to redundancy.
    use App\Entity\Operation\Addition;
    use App\Entity\Operation\Substraction;
    use App\Entity\Operation\Multiplication;
    use App\Entity\Operation\Division;
 */

class Calculator
{
    /**
     * Private variables which 'configure' the class behaviour.
     */
    private array $order = ["*"=>3,"/"=>4,"-"=>2,"+"=>1];
    private array $operation = ["*"=>"Multiplication","/"=>"Division","-"=>"Substraction","+"=>"Addition"];
    private string $numRegex = '/(?:(?<!\d)-)?\d+(?:\.\d+)?/';
    private string $opRegex = '/(?<![-+*\/])[-+*\/]/';
    private string $validateRegex = '/^(?:-?\d+(?:\.\d+)?[-+\/*])+-?\d+(?:\.\d+)?$/';
    
    /**
     * @param string $expr
     * @return bool
     */
    private function validateExpression(string $expr) : bool {
        return preg_match($this->validateRegex, $expr);
    }
    
    /**
     * @param string $expr
     * @return float
     */
    public function eval(string $expr) : ?float {
        if(!$this->validateExpression($expr))
            return null;
        
        preg_match_all($this->numRegex, $expr, $numbers);
        preg_match_all($this->opRegex, $expr, $operations);
        
        if(count($numbers[0]) !== count($operations[0])+1) 
            return 0;
            
        return $this->subEval($numbers[0], $operations[0]);
    }
    
    /**
     * @param array $operations
     * @return integer
     */
    private function determinePriority(array $operations) : int {
        $top = 0;
        for($i=0; $i<count($operations); ++$i) {
            if($this->order[$operations[$top]]<$this->order[$operations[$i]]) {
                $top=$i;
                // If we've found a top priority operator, break the cycle.
                // Reason is there is no better candiate.
                if($this->order[$operations[$i]]==4) break;
            }
        }
        
        return $top;
    }
    
    /**
     * @param array $numbers
     * @param array $operations
     * @return float
     */
    private function subEval(array $numbers, array $operations) : float {
        // If we have exhausted the operations list, we've reached a result.
        if(count($operations) == 0)
            return $numbers[0];
            
        $top = $this->determinePriority($operations);
        $subResultClass = 'App\\Entity\\Operation\\'.$this->operation[$operations[$top]];
        $subResultObj = new $subResultClass();
        $subResultValue = $subResultObj->calc($numbers[$top],$numbers[$top+1]);
        $numbers[$top] = $subResultValue;
        \array_splice($numbers,$top+1,1);
        \array_splice($operations,$top,1);
        
        return $this->subEval($numbers,$operations);
    }
}
