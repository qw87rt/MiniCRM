<?php

    namespace App\Http\Controllers;

    use App\Models\Employee;
    use App\Models\Company;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;

    class EmployeeController extends Controller
    {
        public function index(Request $request)
        {
            // Render the view for the employees list
            return view('employees.index');
        }

        public function getData(Request $request)
        {
            if ($request->ajax()) {
                $data = Employee::with('company')->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('company', function($row){
                        return $row->company->name; // Display company name instead of ID
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('employees.edit', $row->id).'" class="edit btn btn-success btn-sm">Edit</a>';
                        $btn .= ' <a href="'.route('employees.destroy', $row->id).'" class="delete btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById(\'delete-form-'.$row->id.'\').submit();">Delete</a>';
                        $btn .= '<form id="delete-form-'.$row->id.'" action="'.route('employees.destroy', $row->id).'" method="POST" style="display: none;">'.csrf_field().method_field('DELETE').'</form>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }

        public function create()
        {
            $companies = Company::all(); // Fetch companies to populate dropdown
            return view('employees.create', compact('companies'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'company_id' => 'required|exists:companies,id',
                'email' => 'nullable|email',
                'phone' => 'nullable|string',
            ]);

            Employee::create($request->all());

            return redirect()->route('employees.index');
        }

        public function show(Employee $employee)
        {
            return view('employees.show', compact('employee'));
        }

        public function edit(Employee $employee)
        {
            $companies = Company::all(); // Fetch companies to populate dropdown
            return view('employees.edit', compact('employee', 'companies'));
        }

        public function update(Request $request, Employee $employee)
        {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'company_id' => 'required|exists:companies,id',
                'email' => 'nullable|email',
                'phone' => 'nullable|string',
            ]);

            $employee->update($request->all());

            return redirect()->route('employees.index');
        }

        public function destroy(Employee $employee)
        {
            $employee->delete();

            return redirect()->route('employees.index');
        }
    }
