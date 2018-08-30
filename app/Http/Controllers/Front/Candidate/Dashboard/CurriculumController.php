<?php

namespace ReclutaTI\Http\Controllers\Front\Candidate\Dashboard;

use Auth;
use ReclutaTI\User;
use ReclutaTI\Gender;
use Illuminate\Http\Request;
use ReclutaTI\Http\Controllers\Controller;
use ReclutaTI\Http\Requests\Front\Candidate\Dashboard\Curriculum\UpdateRequest;

class CurriculumController extends Controller
{
    public function __construct()
    {
        return $this->middleware('candidate.auth');
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $genders = Gender::all();

    	return view('front.candidate.dashboard.curriculum.index', ['user' => $user, 'genders' => $genders]);
    }

    /**
     * [update description]
     * @param  UpdateRequest $request [description]
     * @param  [type]        $id      [description]
     * @return [type]                 [description]
     */
    public function update(UpdateRequest $request, $id)
    {
        $response;

        $user = User::find($id);

        if ($user != null) {
            $user->name = strtolower($request->primerNombre);

            if ($user->save()) {
                if ($request->has('segundoNombre')) {
                    $user->candidate->second_last_name = $request->segundoNombre;
                }

                if ($request->has('apellidoMaterno')) {
                    $user->candidate->second_last_name = $request->apellidoMaterno;
                }

                $user->candidate->last_name = $request->apellidoPaterno;

                if ($user->candidate->save()) {
                    $response = [
                        'errors' => false,
                        'message' => 'Se ha actualizado con éxito la información'
                    ];
                } else {
                    $response = [
                        'errors' => true,
                        'message' => 'No se ha podido actualizar la infomación',
                        'error_code' => 'u0002'
                    ];
                }

            } else {
                $response = [
                    'errors' => true,
                    'message' => 'No se ha podido actualizar la información.'
                ];
            }
        } else {
            $response = [
                'errors' => true,
                'message' => 'El candidato a actualizar no existe.',
                'error_code' => 'u0001'
            ];
        }

        return response()->json($response);

    }
}
