<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf('P','mm','A4');
    }

    public function getUser($id)
    {
        $id = Auth::user()->getAuthIdentifier();
        $code = DB::table("users")
            ->select("raisonSociale", "cp", "adresse", "telephone")
            ->where("users.id", "=", $id)
            ->limit(1)
            ->get();
        return $code;
    }

    public function getReservation()
    {
        $collection = DB::table('reservations')
            ->select('*')
            ->join('reservers','reservations.codeReservation','=','reservers.codeReservation')
            ->join('villes','villes.codeVille','=','reservations.codeVilleMiseDiposition')
            ->join('type_containers',function($join) {
                $join->on('type_containers.numTypeContainer','=','reservers.numTypeContainer')
                    ->where('reservations.codeReservation','=', \request('id'));
            })
            ->get();
        return $collection;
    }

    // Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->fpdf->SetY(-15);
        // Police Arial italique 8
        $this->fpdf->SetFont('Arial', 'I', 8);
    }


    public function exportPdf()
    {
        $id = Auth::user()->getAuthIdentifier();
        $collectionUtilisateur = $this->getUser($id);

        $collectionReservation = $this->getReservation();
        foreach($collectionReservation as $key)
        {
            $dateDebutReservation = $key->dateDebutReservation;
            $dateFinReservation = $key->dateFinReservation;
        }

// Instanciation de la classe dérivée
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial', 'B', 14);

        $logos = DB::table('imgDevis')
            ->select('*')
            ->get();
        $logo = null;
        foreach($logos as $key){
            $logo = $key->logo;
        }

        // Logo
        $this->fpdf->Image("$logo", 10, 6, 24);
        // Décalage à droite
        $this->fpdf->Cell(80);
        // Titre
        $this->fpdf->Cell(30, 10, 'Devis', 1, 0, 'C');
        // Saut de ligne
        $this->fpdf->Ln(20);


        $this->fpdf->Cell(1, 10, 'THOLDI ', 0, 0);

        $this->fpdf->Cell(1, 19, '48 Boulevard Haussmann ', 0, 0);

        $this->fpdf->Cell(1, 29, '75006 PARIS ', 0, 0);

        $this->fpdf->Cell(1, 39, 'https://tholdi.sami-bahij.com', 0, 0);

//Cell(width , height , text , border , end line , [align] )
        foreach($collectionUtilisateur as $user)
        {
            $this->fpdf->Cell(98, 20, '', 0, 0);
            $this->fpdf->Cell(300, 15, $user->raisonSociale, 0, 1);


            $this->fpdf->Cell(100, 6, '', 0, 0);
            $this->fpdf->Cell(300, 6, $user->cp, 0, 1);

            $this->fpdf->Cell(100, 6, '', 0, 0);
            $this->fpdf->Cell(300, 6, $user->adresse, 0, 1);

            $this->fpdf->Cell(100, 6, '', 0, 0);
            $this->fpdf->Cell(300, 6, $user->telephone, 0, 1);
        }

        $this->fpdf->Cell(30, 8, 'Reference : ', 0, 0);
        $this->fpdf->Cell(85, 8, \request('id'), 0, 1); //end of line

        $this->fpdf->Cell(18, 8, 'Date : ', 0, 0);
        $this->fpdf->Cell(85, 8, $dateDebutReservation, 0, 1); //end of line

        $this->fpdf->Cell(39, 8, 'Numero client : ', 0, 0);
        $this->fpdf->Cell(85, 8, $id, 0, 1); //end of line


//make a dummy empty cell as a vertical spacer
        $this->fpdf->Cell(189, 10, '', 0, 1); //end of line
//invoice contents
        $this->fpdf->SetFont('Arial', 'B', 12);

        $this->fpdf->Cell(20, 5, 'Jours', 1, 0);
        $this->fpdf->Cell(20, 5, 'Volume', 1, 0);
        $this->fpdf->Cell(25, 5, 'Quantite', 1, 0);
        $this->fpdf->Cell(70, 5, 'Description', 1, 0);
        $this->fpdf->Cell(30, 5, 'Prix unitaire', 1, 0);
        $this->fpdf->Cell(34, 5, 'Tarif', 1, 1); //end of line

        $this->fpdf->SetFont('Arial', '', 12);

        $total = null;
        foreach ($collectionReservation as $infos)
        {
            $prixContainer = $infos->tarif * $infos->nbJoursReserve * $infos->qteReserver;
            $total += $prixContainer;
            $this->fpdf->Cell(20, 5, $infos->nbJoursReserve, 1, 0);
            $this->fpdf->Cell(20, 5, $infos->volumeEstime, 1, 0);
            $this->fpdf->Cell(25, 5, $infos->qteReserver, 1, 0);
            $this->fpdf->Cell(70, 5, $infos->libelleTypeContainer, 1, 0);
            $this->fpdf->Cell(30, 5, $infos->tarif, 1, 0);
            $this->fpdf->Cell(34, 5, $prixContainer, 1, 1, 'R'); //end of line
        }
        //summary

        //$total = $_SESSION['total'];
        $this->fpdf->Cell(136, 1, '', 0, 0);
        $this->fpdf->Cell(29, 9, 'Montant : ', 0, 0);
        $this->fpdf->Cell(34, 9, $total . ' euros', 1, 1, 'R'); //end of line

        $this->Footer();
        //
            $this->fpdf->Output();
            exit;

}

}
