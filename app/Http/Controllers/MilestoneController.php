<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MilestoneController extends Controller
{
    /**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
    public function index(Request $request)
    {
        // Fetch all milestones
        $milestones = Milestone::all();

        // Pass milestones to Inertia
        return Inertia::render('Milestones', [
            'milestones' => $milestones,
        ]);
    }
}
