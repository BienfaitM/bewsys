<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create()
    {
        $roles = Role::pluck('name','id');
        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('users.edit',compact('user','roles','userRole'));
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
    public function display_users_scores(){
        $user_id = User::all();

        #get sum scores for each User
        foreach ($user_id as $s){
            $total_scores = $this->total_scores($s->id);
            $s['total'] = $total_scores;
        }
        #get sum of all scores
        $sum_all_scores = score::all()->sum('Values');
        
        return response()->json([$user_id,$sum_all_scores]);
        // return view('users/scores',['users'=>$user_id,'all_scores'=>$sum_all_scores]);

    }

     //get total score per Employee
     public function total_scores($user_id){
        $user_total_scores = User::find($user_id)->scores->sum('Values');
        return $user_total_scores;
    }

     #view a specific record 
     public function display_user_info($user_id){
        $user = User::find($user_id)->scores->sum('Values');

        $user_name = User::find($user_id)->name;
        $user_email = User::find($user_id)->email;
        return response()->json([$user,$user_email,$user_name]);
        // return view('users/user_info',['user'=>$user,
        // 'user_name'=>$user_name, 
        // 'user_email'=>$user_email]);
    }
    //search for a User and return Scores
    public function search_user(Request $request){

        $name = request('name');
        $user_exist = User::where('name',$name)->count();

        if($user_exist > 0){
            return $this->display_user_info($name);
        }else{
            return redirect()->with('error_message','the record doesnt exist');
        }
    }

}
