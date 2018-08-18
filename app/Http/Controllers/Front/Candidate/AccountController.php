<?php

namespace ReclutaTI\Http\Controllers\Front\Candidate;

use ReclutaTI\User;
use ReclutaTI\Candidate;
use Illuminate\Http\Request;
use ReclutaTI\Http\Controllers\Controller;
use ReclutaTI\Http\Requests\Front\Candidate\Account\StoreRequest;

class AccountController extends Controller
{
	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		return $this->middleware('guest');
	}

	/**
	 * [store description]
	 * @param  StoreRequest $request [description]
	 * @return [type]                [description]
	 */
    public function store(StoreRequest $request)
    {
    	$response;

    	$user = new User();
    	$user->name = strtolower($request->nombre);
    	$user->email = $request->correoElectronico;
    	$user->password = bcrypt($request->password);

    	if ($user->save()) {
    		$candidate = new Candidate();
    		$candidate->user_id = $user->id;
    		$candidate->last_name = $request->apellidoPaterno;

    		if ($candidate->save()) {
    			$response = [
    				'errors' => false,
    				'message' => 'Se creado tu cuenta con éxito.',
    				'callback_url' => url('candidate/dashboard')
    			];
    		} else {
    			$response = [
    				'errors' => true,
    				'message' => 'No se ha podido crear tu cuenta.',
    				'error_code' => 's0002'
    			];
    		}
    	} else {
    		$response = [
    			'errors' => true,
    			'message' => 'No se ha podido crear tu cuenta.',
    			'error_code' => 's0001'
    		];
    	}

    	return response()->json($response);
    }
}
