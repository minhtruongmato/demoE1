<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\AboutRepositoryInterface;
use App\Repositories\Contracts\TeamsRepositoryInterface;

class AboutApiController extends Controller
{
	protected $aboutRepository;
    protected $teamsRepository;

	public function __construct(
        AboutRepositoryInterface $aboutRepository,
        TeamsRepositoryInterface $teamsRepository
    )
    {
        $this->aboutRepository = $aboutRepository;
        $this->teamsRepository = $teamsRepository;
    }
    
    public function index()
    {
    	$teams = $this->teamsRepository->paginate(10);
    	$detailAbout = $this->aboutRepository->paginate(1)->first();
    	return response()->json([
    		'teams' => $teams,
    		'detailAbout' => $detailAbout
    	]);
    }
}
