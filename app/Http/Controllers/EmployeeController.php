<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeDataRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeSingleResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        $employees = Employee::all();
        if($request->has('search')){
            $employees = Employee::where('first_name', 'like',  "%{$request->search}%")->get();
        }
        elseif($request->has('department_id')){
            $employees = Employee::orWhere('department_id', $request->department_id)->get();
        }
        return EmployeeResource::collection($employees);
    }

    public function store(EmployeeDataRequest $request, Employee $employee){
        $employee->create($request->validated());
        return response()->json($employee);
    }

    public function show(Employee $employee) {
        return new EmployeeSingleResource($employee);
    }
    public function update(EmployeeDataRequest $request, Employee $employee){

        $employee->update($request->validated());
    }
    public function destroy(Employee $employee) {
        $employee->delete();
        return response()->json('employee deleted successfully');
    }
}
