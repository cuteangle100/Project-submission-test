<?php

namespace App\Http\Controllers;
use App\Project;  // model
use Illuminate\Http\Request;

class projectController extends Controller {
    
    //all projects
    function all_projects() {
        $projects = Project::orderBy('id', 'DESC')->get();
        return view('projects' , compact('projects'));
    }

    //create project form
    function create_project() {
        $services = ["Detailing","Estimating" ,"Design","Construction","Review","Inspection"];
        return view('project_submission_form' , compact('services'));
    }

    //submit project 
    function submit_project(Request $request) {

        $validations = [
            'project_name' => 'required|max:120',
            'project_type' => 'required',
            'services'=> 'required' ,
            'terms' => 'required'
        ];
        
        $this->validate($request, $validations);

        $project = new Project();

        $project->project_name = $request->project_name;
        $project->project_type = $request->project_type;

        if (isset($request->comment)) {
            $project->comment = $request->comment;
        }
        $services = null; 
        foreach ($request->services as $service){
            $services == null ? $services = $service : $services .= ",".$service;
        }
       
        $project->service = $services;
        $project->user_id = $request->user_id;
        if ($project->save()){
            return redirect('projects')->with('done_status', 'Successfully created!');
        } else {
            return redirect('create_project')->with('fail_status', 'Oopps !!! not deleted try again...');
        } 
    }
    
    //delete project
    function delete_project(Request $request) {
        $project = Project::where('id' , '=' , $request->id)->firstOrFail();
        if($project->delete()){
            return redirect('projects')->with('done_status', 'Successfully deleted!');
        } else {
            return redirect('projects')->with('fail_status', 'Oopps !!! not deleted try again...');
        } 
    }
}
