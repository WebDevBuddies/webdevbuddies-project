<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(Project::all(array('id', 'name', 'description', 'status', 'created_at')));
    }

    public function show($id)
    {
        return response()->json(Project::all()->findOrFail($id));
    }

    public function store(Request $request)
    {
        return response()->json(Project::create($request->all()));
    }

    public function update($id)
    {
        // return response()->json(Project::)
    }

    public function destroy($id)
    {

    }
}
