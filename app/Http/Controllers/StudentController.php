<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request; 
use App\Traits\ApiResponser;
use App\Models\User; 

class StudentController extends Controller
{
    use ApiResponser;

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function browseAllStudents()
    {
        $users = User::all();

        return $this->successResponse($users);
    }

    public function searchStudentID($id)
    { 
        $user = User::where('studid', $id)->first();
        if($user){
            return $this->successResponse($user);
        }
        {
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
    }

    public function insertStudent(Request $request)
    {
        $rules = [
            $this->validate($request, [
                'lastname' => 'required|alpha:max:50',
                'firstname' => 'required|alpha:max:50',
                'middlename' => 'required|alpha:max:50',
                'bday' => 'date',
                'age' => 'required|int:lt:50 years'
            ])  
        ];
        $this->validate($request, $rules);
        $user = User::create($request->all());
        
        return $this->successResponse($user, Response::HTTP_CREATED);
    }
}