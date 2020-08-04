<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\{User, Log};
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    protected $model;
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->model = new UserRepository($user);
        $this->middleware(['role:Administrator|Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Administrator')) {
            $role = Role::orderBy('name', 'asc')->get();
            $user = User::orderBy('first_name', 'asc')->get();
            return view("dashboard.users.index")->with([
                "role" => $role, "user" => $user
            ]);
        } else {
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A User",
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('Administrator')) {

            $this->validate($request, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:4', 'max:8', 'confirmed'],
                'phone_number' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'role' => ['required', 'string', 'max:255'],
            ]);

            $data = new User([

                "first_name" => $request->input("first_name"),
                "last_name" => $request->input("last_name"),
                "phone_number" => $request->input("phone_number"),
                "email" => $request->input("email"),
                "role" => $request->input("role"),
                "password" => Hash::make($request->input("password")),
                "status" => 1,
            ]);

            $log = new Log([
                "email" => $request->input("email"),
                "activities" => 'Added ' . $request->input("email") . ' as ' . $request->input('role'),
            ]);

            if ($data->save() AND ($log->save())) {
                $data->assignRole($request->input("role"));
                $message = "You Have Added ". $request->input("email") . " as ".$request->input("role") . " Successfully";

                return redirect()->route("user.index")->with([
                    "success" => $message
                ]);


            }else{
                return redirect()->back()->with("error", "Network Failure, Please try again later");
            }
        } else {
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A User",
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
        if (Auth::user()->hasRole('Administrator')) {
            $see = User::where('email', $email)->first();
            $user_id = $see->id;

            if(User::where('email', $email)->exists()){

                $use = $this->model->show($user_id);
                $roles = Role::pluck('name', 'name')->all();
                $userRole = $use->roles->pluck('name', 'name')->all();
                $role = Role::orderBy('name', 'asc')->get();
                $user = User::orderBy('first_name', 'asc')->get();

                return view('dashboard.users.edit')->with([
                    "user" => $user,
                    "use" => $use,
                    "userRole" => $userRole,
                    "roles" => $roles,
                    'role' => $role
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => $email. " does not exits for any user",
                ]);
            }
        } else {
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A User",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        if(User::where('email', $email)->exists()){
            $user = User::where('email', $email)->first();
            if ((Auth::user()->role == 'Administrator') OR (Auth::user()->role == 'Admin')) {

                $this->validate($request, [
                    'first_name' => ['required', 'string', 'max:255'],
                    'last_name' => ['required', 'string', 'max:255'],
                    'phone_number' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'role' => ['required', 'string', 'max:255'],
                ]);
                $id = $request->input("user_id");

                if(empty($request->input("password"))){

                    $password = $user->password;
                }else{
                    $password = Hash::make($request->input("password"));
                }

                $data = ([
                    "user" => $this->model->show($id),
                    "email" => $request->input("email"),
                    "first_name" => $request->input("first_name"),
                    "last_name" => $request->input("last_name"),
                    "password" => $password,
                    "role" => $request->input("role"),
                    "phone_number" => $request->input("phone_number"),
                    "status" => 1,
                ]);

                $log = new Log([
                    "email" => $request->input("email"),
                    "activities" => 'Updated ' . $request->input("email") . ' details as ' . $request->input('role'),
                ]);
                if (($this->model->update($data, $id))) {
                    $message = "You Have Updated ". $request->input("email") . " details Successfully";
                    if($request->input("role") == 'User'){
                        return redirect()->route("user.index")->with([
                            "success" => $message
                        ]);
                    }elseif(($request->input("role") == 'Instructor')){
                        return redirect()->route("instructor.index")->with([
                            "success" => $message
                        ]);
                    }elseif(($request->input("role") == 'Student')){
                        return redirect()->route("student.index")->with([
                            "success" => $message
                        ]);
                    }else{

                        //Incluemcer Page
                        // return redirect()->route("student.index")->with([
                        //     "success" => $message
                        // ]);
                    }

                }else{
                    return redirect()->back()->with("error", "Network Failure, Please try again later");
                }
            } else {
                return redirect()->back()->with([
                    'error' => "You Dont have Access To Update A User",
                ]);
            }
        }else{
            return redirect()->back()->with([
                'error' => $email. " does not exits for any user",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        if (Auth::user()->hasRole('Administrator')) {
            $use = User::where(["email" => $email])->first();
            $user =  $this->model->show($use->id);
            if (($user->delete($user->id)) and ($user->trashed())) {
                $log = new Log(["email" => Auth::user()->email,"activities" => 'Deleted  $email Account',]);
                $log->save();
                return redirect()->back()->with([
                    'success' => "You Have Deleted  $email From The User Details Successfully",
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => "Network failure, Please try again later",
                ]);
            }
        } else {
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A User",
            ]);
        }
    }

    public function suspend($email)
    {
        if (Gate::allows('Administrator', auth()->user())) {
            $use = User::where(["email" => $email ])->first();
            $user =  $this->model->show($use->id);

            $updat = User::where('email', $email)->update(["status" => 0,]);
            $log = new Log(["email" => Auth::user()->email,"activities" => 'Suspend  $email Account',]);
            $log->save();

            if ($updat) {
                return redirect()->back()->with([
                    'success' => "You Have Suspend  $email Account Successfully",
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => "Network failure, Please try again later",
                ]);
            }
        } else {
            return redirect()->back()->with([
                'error' => "You Dont have Access To Suspend A User",
            ]);
        }
    }

    public function unsuspend($email)
    {
        if (Gate::allows('Administrator', auth()->user())) {
            $use = User::where(["email" => $email,])->first();
            $user =  $this->model->show($use->id);

            $updat = User::where('email', $email)->update(["status" => 1,]);
            $log = new Log(["email" => Auth::user()->email, "activities" => 'Un Suspended  $email Account',]);
            $log->save();
            if ($updat) {
                return redirect()->back()->with([
                    'success' => "You Have Un Suspend  $email Account Successfully",
                ]);
            }
        } else {
            return redirect()->back()->with([
                'error' => "You Dont have Access To Un Suspend A User",
            ]);
        }
    }
}
