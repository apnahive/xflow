<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Project_user;
use App\User;
use App\Task;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
    	//dd(request()->all());
    	$id1 = Auth::id();
        $checkadmin = User::find($id1);        
        $checkadmins = $checkadmin->hasRole('Admin');
    	//$columnsToSearch = ['column1', 'column2', 'column3'];
    	$searchQuery = '%' . $request->search . '%';

    	if($checkadmins)
    	{
    		$projects = Project::where('name', 'LIKE', $searchQuery)->orWhere('description', 'LIKE', $searchQuery);
			$tasks = Task::where('title', 'LIKE', $searchQuery)->orWhere('note', 'LIKE', $searchQuery);	
            $users = User::where('name', 'LIKE', $searchQuery)->orWhere('email', 'LIKE', $searchQuery)->orWhere('user_type', 'LIKE', $searchQuery)->orWhere('lastname', 'LIKE', $searchQuery)->orWhere('organization', 'LIKE', $searchQuery)->orWhere('company', 'LIKE', $searchQuery)->orWhere('phonenumber', 'LIKE', $searchQuery)->orWhere('dateofbirth', 'LIKE', $searchQuery)->get(); 
    	}
    	else
    	{
    		$projects = Project::where('name', 'LIKE', $searchQuery)->orWhere('description', 'LIKE', $searchQuery);
			$tasks = Task::where('title', 'LIKE', $searchQuery)->orWhere('note', 'LIKE', $searchQuery)->where('assignee', $id1);	
            $users = null;
    	}

		
		/*foreach($columnsToSearch as $column) {
		    $indents = $indents->orWhere($column, 'LIKE', $searchQuery);
		}*/

		$projects = $projects->get();
		$tasks = $tasks->get();

		foreach ($projects as $key => $value) {
            $poc = User::find($value->poc);
            $value->pocname = $poc->name;
            $cco = User::find($value->cco);
            $value->cconame = $cco->name;
            if($id1 == $poc->id || $checkadmins)
            {                
                $value->can_view = 1;                
            }
            elseif($id1 == $cco->id)
            {                
                $value->can_view = 1;                
            }
            else
            {
                $project_users = Project_user::where('project_id', $value->id)->get();
                foreach ($project_users as $project_userkey => $project_user) 
                {
                    if($project_user->user_id == $id1)
                    {                        
                        $value->can_view = 1;                        
                    }
                    else
                    {                        
                        $value->can_view = 0;                     
                    }
                }
            }

        }








		$count1 = count($tasks);
		$count2 = count($projects);
        $count3 = count($users);
		$count = $count1 + $count2 + $count3;
		$search = $request->search;
		//dd($users);
		return view('search', compact('projects', 'tasks', 'count', 'search', 'users'));
    }
}
