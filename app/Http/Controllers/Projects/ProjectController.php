<?php
	
	namespace App\Http\Controllers\Projects;
	
	use App\Http\Controllers\Controller;
	use App\Models\Customer;
	use App\Models\Project;
	use App\Models\ProjectStatus;
	use Carbon\Carbon;
	use Illuminate\Http\Request;
	
	class ProjectController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			$projects = Project::all();
			$projectStatuses = ProjectStatus::all();
			
			return view('pages.projects.index', compact('projects', 'projectStatuses'));
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			//
			
			$projectStatuses = ProjectStatus::all();
			$customers = Customer::orderBy('company', 'asc')->orderBy('first_name', 'asc')->orderBy('last_name', 'asc')->get();
			return view('pages.projects.create', compact('projectStatuses', 'customers'));
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			$project = Project::create([
				'name'              => $request['name'],
				'customer_id'       => $request['customer_id'],
				'description'       => $request['description'],
				'due_date'          => $request['due_date'],
				'project_status_id' => 1,
			]);
			
			// Redirect
			if ($request['save'] == "new")
				$redirect = redirect()->back()->with('success', sprintf("%s ( %s ) Created Successfully", $project->name, $project->id));
			else
				$redirect = redirect()->route('projects.index')->with('success', sprintf("%s ( %s ) Created Successfully", $project->name, $project->id));
			
			return $redirect;
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  \App\Models\Project $project
		 * @return \Illuminate\Http\Response
		 */
		public function show(Project $project)
		{
			$transactions = [];
			
			foreach ($project->estimates as $record) {
				$record->balance = null;
				$transactions[] = $record;
			}
			foreach ($project->invoices as $record) {
				$record->balance = $record->balance();
				$transactions[] = $record;
			}
			foreach ($project->payments as $record) {
				$record->balance = null;
				$transactions[] = $record;
			}
			foreach ($project->purchases as $record) {
				$record->balance = null;
				$transactions[] = $record;
			}
			foreach ($project->bills as $record) {
				$record->balance = null;
				$transactions[] = $record;
			}
			foreach ($project->checks as $record) {
				$record->balance = null;
				$transactions[] = $record;
			}
			
			$projectStatuses = ProjectStatus::all();
			return view('pages.projects.show', compact('project', 'transactions','projectStatuses'));
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\Models\Project $project
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Project $project)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  \App\Models\Project $project
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Project $project)
		{
			//
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Models\Project $project
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Project $project)
		{
			//
		}
		
		public function status(Project $project, ProjectStatus $status)
		{
			$project->project_status_id = $status->id;
			$project->save();
			return redirect()->back()->with('success', 'Updated Project Status');
		}
		
		public function chart()
		{
			$projectCounts = Project::select('id', 'due_date')
				->whereYear('due_date', date("Y"))
				->get()
				->groupBy(function ($date) {
					//return Carbon::parse($date->created_at)->format('Y'); // grouping by years
					return Carbon::parse($date->due_date)->format('m'); // grouping by months
				});
			
			$projectmcount = [];
			$currentYear = [];
			
			foreach ($projectCounts as $key => $value) {
				$projectmcount[(int)$key] = count($value);
			}
			
			for ($i = 1; $i <= 12; $i++) {
				if (!empty($projectmcount[$i])) {
					$currentYear[$i] = $projectmcount[$i];
				} else {
					$currentYear[$i] = 0;
				}
			}
			
			
			$projectCounts = Project::select('id', 'due_date')
				->whereYear('due_date', date("Y") - 1)
				->get()
				->groupBy(function ($date) {
					//return Carbon::parse($date->created_at)->format('Y'); // grouping by years
					return Carbon::parse($date->due_date)->format('m'); // grouping by months
				});
			
			$projectmcount = [];
			$lastYear = [];
			
			foreach ($projectCounts as $key => $value) {
				$projectmcount[(int)$key] = count($value);
			}
			
			for ($i = 1; $i <= 12; $i++) {
				if (!empty($projectmcount[$i])) {
					$lastYear[$i] = $projectmcount[$i];
				} else {
					$lastYear[$i] = 0;
				}
			}
			
			$arr = [
				$lastYear,
				$currentYear,
			];
			return $arr;
		}
	}
