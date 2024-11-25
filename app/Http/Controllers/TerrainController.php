<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TerrainController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
				// Fetch all terrains
        $terrains = Terrain::all();

        // Pass terrains to Inertia
        return Inertia::render('Terrains', [
            'terrains' => $terrains,
        ]);
		}
}
