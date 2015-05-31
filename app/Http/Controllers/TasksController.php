<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Task;

use Session;

use App\Libraries\Repositories\TaskRepository as Tasks;

class TasksController extends Controller {

	/**
     * @var tasks
     */
    private $tasks;
 
    public function __construct(Tasks $tasks) {
 
        $this->tasks = $tasks;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tasks = $this->tasks->all();
 
    	return view('tasks.index')->withTasks($tasks);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tasks.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
		    'title' => 'required',
		    'description' => 'required'
		]);
		//dd($request->all());
		$input = $request->all();
    	//Task::create($input);
    	$this->tasks->create($input);

    	Session::flash('flash_message', 'Task successfully added!');
 
    	return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = $this->tasks->find($id);
		//$task = Task::findOrFail($id);
 
    	return view('tasks.show')->withTask($task);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
