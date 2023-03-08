<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll(){

        $bands = $this->getBands();
        return response()->json($bands);
    }

    public function getById($id){

        $band = null;

        foreach($this->getBands() as $_band){
            if($_band['id'] == $id){
                $band = $_band;
            }
        }

        return $band ? response()->json($band) : abort(code: 404);

    }

    public function getBandsByGender($gender){
        $band = null;

        foreach($this->getBands() as $_band){
            if($_band['gender'] == $gender){
                $band = $_band;
            }
        }

        return $band ? response()->json($band) : abort(code: 404);
    }

    public function store(Request $request){
        //dd($request->all());

        /**
         * EXEMPLO DE VALIDAÇÃO DO LARAVEL
         */

         $validate = $request->validate([
            'name' => 'required|min:3'
         ]);

         return response()->json($request->all());
    }

    protected function getBands(){
        return [
            [
                'id' => 1, 'name' => 'dream theater', 'gender' => 'progressivo'
            ],
            [
                'id' => 2, 'name' => 'megadeth', 'gender' => 'trash metal'
            ],
            [
                'id' => 3, 'name' => 'dio', 'gender' => 'heavy metal'
            ],
            [
                'id' => 4, 'name' => 'metallica', 'gender' => 'heavy metal'
            ]
        ];
    }
}
