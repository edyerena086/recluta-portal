<?php

namespace ReclutaTI\Http\Controllers\Front\Candidate\Curriculum;

use Auth;
use Illuminate\Http\Request;
use ReclutaTI\CandidateLanguage;
use ReclutaTI\Http\Controllers\Controller;

class CandidateLanguageController extends Controller
{
	private $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index()
    {
    	$response;

    	//Get all the users languages
    	$candidateLanguages = CandidateLanguage::where('candidate_id', $this->user->candidate->id)
    							->orderBy('created_at', 'ASC')
    							->get();

    	$response =[
    		'length' => $candidateLanguages->count(),
    		'data' => $candidateLanguages
    	];

    	return response()->json($response);
    }

    /**
     * [store description]
     * @param  StoreRequest $request [description]
     * @return [type]                [description]
     */
    public function store(StoreRequest $request)
    {
    	$response;

    	$candidateLanguage = new CandidateLanguage();
    	$candidateLanguage->language_id = $request->idioma;
    	$candidateLanguage->candidate_id = $this->user->candidate->id;
    	$candidateLanguage->percent = $request->procentaje;

    	if ($candidateLanguage->save()) {
    		$response = [
    			'errors' => false,
    			'messages' => 'Se ha guardado con éxito el idioma.'
    		];
    	} else {
    		$response = [
    			'errors' => true,
    			'message' => 'No se ha podido guardar el idioma.',
    			'error_code' => 's0001'
    		];
    	}

    	return response()->json($response);
    }

    /**
     * [update description]
     * @param  CommonRequest $request [description]
     * @param  [type]        $id      [description]
     * @return [type]                 [description]
     */
    public function update(CommonRequest $request, $id)
    {
    	$response;

    	$candidateLanguage = CandidateLanguage::find($id);

    	if ($candidateLanguage != null) {
    		$candidateLanguage->language_id = $request->idioma;
	    	$candidateLanguage->candidate_id = $this->user->candidate->id;
	    	$candidateLanguage->percent = $request->procentaje;

	    	if ($candidateLanguage->save()) {
	    		$response = [
	    			'errors' => false,
	    			'message' => 'Se ha actualizado con éxito el idioma.'
	    		];
	    	} else {
	    		$response = [
	    			'errors' => true,
	    			'message' => 'No se ha podido actualizar el idioma.',
	    			'error_code' => 'u0002'
	    		];
	    	}
    	} else {
    		$response = [
    			'errors' => true,
    			'message' => 'El idioma a editar no esta registrado.',
    			'error_code' => 'u0001'
    		];
    	}

    	return response()->json($response);
    }

    /**
     * [destroy description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
    	$response;

    	$candidateLanguage = CandidateLanguage::find($id);

    	if ($candidateLanguage != null) {
    		if ($candidateLanguage->delete()) {
    			$response = [
    				'errors' => false,
    				'message' => 'Se ha eliminado con éxito el idioma.'
    			];
    		} else {
    			$response = [
    				'errors' => false,
    				'message' => 'No se ha podido eliminar el idioma.',
    				'error_code' => 'd0002'
    			];
    		}
    	} else {
    		$response = [
    			'errors' => true,
    			'message' => 'El idioma a eliminar no esta registrado.',
    			'error_code' => 'd0001'
    		];
    	}
    }
}
