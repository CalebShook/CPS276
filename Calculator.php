<?

class Calculator {

    public function calc($operator, $operand1=null, $operand2=null) {
        if($operand1===null or $operand2===null or $operator===null){
            return "Arguements must be String, number, number <br>";
        }
        switch($operator) {
        case "+": return $operand1 + $operand2 . "<br>";
        case "-": return $operand1 - $operand2 . "<br>";
        case "*"; return $operand1 * $operand2 . "<br>";
        case "/": 
            if($operand2 == 0) {
                return "Cannot divide by zero <br>";
            }
            return $operand1 / $operand2 . "<br>";
        default: return "Invalid operator <br>";
        }
    }
}

