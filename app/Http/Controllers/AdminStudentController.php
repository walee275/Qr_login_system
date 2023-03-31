<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Company;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('user')->get();
        // dd($students);
        $data = [
            'students' => $students
        ];
        return view('admin.students.index', $data);
    }
    public function user_scan(Request $request){

        $user = User::where('qr_code', $request->QrCode)->first();
        return json_encode(['success' => true, 'user' => $user]);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'companies' => Company::all(),
        ];

        return view('admin.students.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "hello user";
        $request->validate([
            'f_name' => ['required'],
            'l_name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'gender' => ['required'],
            // 'city' => ['required'],
        ]);
        // dd($request->all());

        if (!empty($request->picture)) {
            $request->validate([
                'picture' => ['mimes:png,jpg,jpeg']
            ]);

            $file = $request['picture'];
            $file_name = time() . '-' . $file->getClientOriginalName();
            // $file->storeAs('public/student_uploads', $file_name);
        } else {
            $file_name = 'avatar.png';
        }
        $full_name = $request->f_name . ' ' . $request->l_name;
        $data = [
            'name' => $full_name,
            'email' => $request->email,
            'phone_no' => $request->phone,
            'cnic' => $request->cnic,
            'password' => Hash::make('12345'),
            'qr_code' => Hash::make('12345'),
            'profile_picture' => $file_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'user_type' => 'Employee',
            'status' => 1,
        ];

        $is_user_created = User::create($data);

            if ($is_user_created) {
                if ($file) {
                    $is_file_uploaded = $file->move(public_path('student_uploads'), $file_name);
                    Auth::login($is_user_created);
                    return redirect()->route('admin.registeration_success', $is_user_created);
                }else{
                return back()->with('error', 'Profile Picture has failed to upload!');

                }
            } else {
                return back()->with('error', 'student has failed to register!');
            }

    }

    public function registeration_success(User $user){
        // dd($user);
        $data = [
            'user' => $user,
        ];
        return view('admin.students.registered', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, $id)

    {
        // dd($student, $id);
        $student = User::with('company', 'student')->where('id', $id)->first();

        $data = [
            'student' => $student,
        ];
        // dd($data);

        return view('admin.students.show_profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        // dd($student);
        if ($student->basic_computer_knowledge == '1') {
            $basic_computer_knowledge = 'Yes';
        } else {
            $basic_computer_knowledge = 'No';
        }
        // return dd($basic_computer_knowledge);
        $data = [
            'student' => $student,
            'basic_computer_knowledge' => $basic_computer_knowledge
        ];

        return view('admin.students.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $student->user_id . ',id'],
            'phone' => ['required', 'unique:users,phone_no,' . $student->user_id . ',id'],
            'cnic' => ['required', 'unique:users,cnic,' . $student->user_id . ',id'],
            'gender' => ['required'],
        ]);
        // return ($request->all());

        $file = $request['picture'];
        $file_name = '';
        $old_file_name = '';

        if ($file) {
            $file_name = $file->getClientOriginalName();

            $file_name = 'S-' . time() . '-' . $file_name;
            $old_file_name = $student->user->profile_picture;
        } else {
            $file_name = $student->user->profile_picture;
        }

        if ($request->status) {
            $status = 1;
        } else {
            $status = 0;
        }

        // return dd($request->qualification);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone,
            'cnic' => $request->cnic,
            'password' => Hash::make('12345'),
            'profile_picture' => $file_name,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'user_type' => 'Student',
        ];
        // dd(User::find($student->user_id)->update($data));
        $is_user_updated = User::find($student->user_id)->update($data);

        if ($is_user_updated) {

            // $is_file_uploaded = $file->move(public_path('student_uploads'), $file_name);
            if ($file) {
                if ($old_file_name == 'avatar.png') {
                } else {
                    File::delete(public_path('student_uploads/' . $old_file_name));
                }


                $is_file_uploaded = $file->move(public_path('student_uploads'), $file_name);
                if ($is_file_uploaded) {
                    return back()->with('success', 'Student has been successfully updated');
                } else {
                    return back()->with('error', 'Student has failed to update');
                }
            }


            $data = [
                'user_id' => $student->user_id,
            ];

            $is_student_updated = Student::find($student->id)->update($data);

            if ($is_student_updated) {
                return back()->with('success', 'Student has been successfully updated');
            } else {
                return back()->with('error', 'Student has failed to update');
            }
        } else {
            return back()->with('error', 'student has failed to update');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
