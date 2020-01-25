<?php 

namespace App\Service;

class countDeveloperPrice 
{
    public function returnPrice($experience)
    {
        switch($experience)
        {
            case 1 : 
            return "10 euros / heure";
            break;

            case 2 : 
            return "15 euros / heure";
            break;

            case 3 : 
            return "20 euros / heure";
            break;

            case 4 : 
            return "30 euros / heure";
            break;

            case 5 : 
            return "40 euros / heure";
            break;

            default :
            throw new \Exception('veuillez rentrer un int entre 1 et 5 svp');
        }
    }
}