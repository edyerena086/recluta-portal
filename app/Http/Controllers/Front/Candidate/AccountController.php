<?php

namespace ReclutaTI\Http\Controllers\Front\Candidate;

use Auth;
use ReclutaTI\User;
use ReclutaTI\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use ReclutaTI\Http\Controllers\Controller;
use ReclutaTI\Mail\Front\Candidate\Account\Welcome;
use ReclutaTI\Http\Requests\Front\Candidate\Account\StoreRequest;
use ReclutaTI\Http\Requests\Front\Candidate\Account\LoginRequest;

class AccountController extends Controller
{
	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		return $this->middleware('guest')->except(['logout']);
	}

    /**
     * [index description]
     * @return [type] [description]
     */
    public function  index()
    {
        return view('front.candidate.account.index');
    }

    /**
     * [login description]
     * @param  LoginRequest $request [description]
     * @return [type]                [description]
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->correoElectronico,
            'password' => $request->password,
            'role_id' => 1
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('candidate/dashboard');
        } else {
            return back()->withErrors(['login_error' => true]);
        }
    }

    public function create()
    {
        return view('front.candidate.account.create');
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

            //Autolog to new candidate
            $credentials = [
                'email' => $request->correoElectronico,
                'password' => $request->password,
                'role_id' => 1
            ];

            Auth::attempt($credentials);

            //Mail::to($request->correoElectronico)->send(new Welcome());

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

    public function logout()
    {
        Auth::logout();

        return redirect()->intended('candidate');
    }
}
