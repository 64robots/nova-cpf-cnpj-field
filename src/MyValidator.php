<?php

namespace R64\NovaCpfCnpjField;

class MyValidator
{

    public static function check_cpf($cpf){

        // get only the number, in case CPF is passed with . and -
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // check length
        if(strlen($cpf) != 11) {
            return false;
        }

        // check if number is not a repeated sequence of the same number
        if(preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // calculate valid CPF
        for ($a = 9; $a < 11; $a++) {
            for ($b = 0, $c = 0; $c < $a; $c++) {
                $b += $cpf{$c} * (($a + 1) - $c);
            }
            $b = ((10 * $b) % 11) % 10;
            if ($cpf{$c} != $b) {
                return false;
            }
        }

        // passed all the tests: valid CPF!
        return true;
    }

    public static function check_cnpj($cnpj){

        // get only the number, in case CPF is passed with . and -
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        // check length
        if(strlen($cnpj) != 14) {
            return false;
        }

        // check if number is not a repeated sequence of the same number
        if(preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

    	// calculate valid CNPJ - part 1
    	for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++)
    	{
    		$sum += $cnpj{$i} * $j;
    		$j = ($j == 2) ? 9 : $j - 1;
    	}

        $rest = $sum % 11;

        if ($cnpj{12} != ($rest < 2 ? 0 : 11 - $rest)) {
            return false;
        }

    	// calculate valid CNPJ - part 2
    	for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++)
    	{
    		$sum += $cnpj{$i} * $j;
    		$j = ($j == 2) ? 9 : $j - 1;
    	}
    	$rest = $sum % 11;
    	return $cnpj{13} == ($rest < 2 ? 0 : 11 - $rest);

    }
}
