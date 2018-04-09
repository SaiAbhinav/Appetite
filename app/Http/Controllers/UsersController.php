<?php

namespace App\Http\Controllers;

use App\User;
use App\Proof;
use App\Role;
use App\SocialNetwork;
use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        $roles = Role::all();

        return view('users.index', ['users' => $users, 'roles' => $roles]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        if($user->id == Auth::user()->id) {
            $user = User::find($user->id);
            return view('users.show', ['user' => $user]);
        }else {
            return view('error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //        
        if($user->id == Auth::user()->id) {
            $user = User::find($user->id);
            return view('users.edit', ['user' => $user]); 
        }else {
            return view('error');
        }       
              
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //        
        if($user->id == Auth::user()->id) {
            $userUpdate = User::where('id', $user->id)
                ->update([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'date_of_birth' => $request->input('date_of_birth'),
                    'gender' => $request->input('gender'),
                    'phone_no' => $request->input('phone_no'),
                    'area' => $request->input('area'),
                    'pin_code' => $request->input('pin_code'),
                    'city' => $request->input('city'),
                    'state' => $request->input('state'),
                    'country' => $request->input('country')
                ]); 
            
            if($userUpdate) {        
                return redirect()->route('users.show', ['user' => $user->id])->with('success', 'Profile Successfully Updated!');
            }else {
                return back()->withInput()->with('error', 'Error ! Please try again !');
            }                
        }else {
            return view('error');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $findUser = User::find($user->id);

        $findUser->proof()->delete();
        $findUser->wallet()->delete();
        $findUser->delete();        

        if($findUser) {
            return back()->with('success', 'User is successfully deleted !');
        }else {
            return back()->with('error', 'Error ! Please try again !');
        }        
    }

    public function updateprofile(Request $request) {
    
        //
        if($request->input('user_id') == Auth::user()->id) {
            $user = $request->input('user_id');

            $this->validate($request, [
                'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $avatar = $request->file('avatar');

            $destinationPath = public_path('/images/avatars');
            $avatar->move($destinationPath, $avatar->getClientOriginalName());

            $updateavatar = User::where('id', $user)->update([
                'avatar' => $avatar->getClientOriginalName()
            ]);

            if($updateavatar) {
                return redirect()->route('users.show', ['user' => $user])->with('success', 'Profile Image Successfully Updated!');
            }else {
                return back()->withInput()->with('error', 'Error ! Please try again !');
            }               
        }else {
            return view('error');
        }
    }

    public function uploadproof(Request $request) {

        //
        if($request->input('user_id') == Auth::user()->id) {
            $user = $request->input('user_id');

            $proof = $request->file('proof');
            
            $proofname = $proof->getClientOriginalName();
            $proofext = $proof->getClientOriginalExtension();                 

            $destinationProofPath = public_path('/proofs');
            $proof->move($destinationProofPath, $proof->getClientOriginalName());

            $uploadproof = Proof::where('user_id' , '=', $user)->first();

            $status = "Pending...";

            if($uploadproof) {
                $result = Proof::where('user_id', $user)->update([
                    'user_id' => $user,
                    'proof_type' => $proofname,
                    'status' => $status,
                ]);
            }else {
                $result = Proof::create([
                    'user_id' => $user,
                    'proof_type' => $proofname,
                    'status' => $status,
                ]);
            }

            if($result) {
                return redirect()->route('users.show', ['user' => $user])->with('success', 'Document Successfully Uploaded!');
            }else {
                return back()->withInput()->with('error', 'Error ! Please try again !');
            }        
        }else {
            return view('error');
        }
    }

    public function approve(Request $request) {
        
        $user = $request->input('user_id');

        $proofstatus = "Approved";

        $approval = Proof::where('user_id', $user)->update([
            'status' => $proofstatus
        ]);

        if($approval) {            
            return back()->with('success', 'KYC is approved successfully !');
        }else {
            return back()->withInput()->with('error', 'Error ! Please try again !');
        }        
    }

    public function upgraderole(Request $request) {

        $user = $request->input('user_id');

        $upgradeRole = "manager";

        $upgradeRoletemp = Role::where('name', $upgradeRole)->first();
        $upgradeRoleID = $upgradeRoletemp->id;

        $upgrade = User::where('id', $user)->update([
            'role_id' => $upgradeRoleID
        ]);

        if($upgrade) {
            return back()->with('success', 'User\'s role updated successfully !');
        }else {
            return back()->withInput()->with('error', 'Error ! Please try again !');
        }        
    }

    public function changepassword(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);        
        
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
    }
}
