<?php
/**
 * Created by PhpStorm.
 * User: faya
 * Date: 05/07/2019
 * Time: 14:55
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Demande;


class DemandesController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_produit' => ['required', 'integer'],
            'etat' => ['required', 'integer'],
        ]);
    }

    protected function create(array $data)
    {
        return Demande::create([
            'id_produit' => $data['id_produit'],
            'etat' => $data['etat'],
            'commentaire' => $data['commentaire'],
        ]);
    }
}
