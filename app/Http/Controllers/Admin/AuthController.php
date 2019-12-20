<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\Admin\AdminController;
use Validator;
use Auth;
use DB;
use View;
use Hash;
use Mail;

class AuthController extends AdminController
{
    //login view
    public function loginView()
    {
        Auth::logout();
    	return view('admin.auth.login');
    }

    //logged in to panel
    public function doLogin(Request $request)
    {   
        $data = $request->all();

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try
        {
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
            {
                //auth success
                $user = auth()->user();   
                return response()->json(['status'=>true,'role'=>$user->role]);
            }
            else
            {
                session()->flash('msg','Only Authorized person to login hear.');
                return response()->json(['status'=>false]);
            }
        }
        catch(\Exception $e)
        {
    		return $this->debugLog($e);
    	}
    }

    public function dashboard()
    {   
        $role = $this->Role->get();
        return view('dashboard',compact('role'));
    }

    public function doLogout()
    {
        Auth::logout();
        
        return redirect('login');
    }

    public function verifyPerson($id)
    {
        $user = $this->User->where('token',$id)->first();
        $password = decrypt($id);
        if($user){
            if(Auth::attempt(['email' => $user['email'], 'password' => $password])){
                $this->User->where('id',$user->id)->update(['verify'=>'true']);
                if(Auth::user()->hasRole('admin') ){
                    return redirect('admin/dashboard');
                }
                else{
                    return redirect('admin/users');
                }
            }
        }
        
    }
    public function registerView()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'profile_image' => 'required',
        ]);

        try {

            $data = request()->all();
            unset($data['confirm_password']);
            $data['role'] = 'user';
            $data['token'] = encrypt($data['password']);
            $data['password'] = Hash::make($data['password']);
            if($request->hasfile('profile_image'))
            {
                $destinationPath = public_path().'/'. \Config::get('admin.image.user_image');
                // Create directory if it does not exist
                if(!is_dir($destinationPath)) {
                    mkdir($destinationPath,0777,true);
                }

                $file = $request->file('profile_image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =time().'.'.$extension;
                $file->move($destinationPath, $filename);
                $data['profile_image'] = $filename;
            }

            $user = $this->User->create($data);
            $role_user = $this->RoleUser->insertGetId(['role_id'=>'1','user_id'=>$user->id]);
            $email = $data['email'];

            Mail::send('email.activation_link', $data, function ($message) use ($email) {

                $message->from('info@otfCOder.com','Registration Activation Link')->subject('Activation Link');
                $message->to($email);
            });

            return redirect('thankyou');

            
        } catch (Exception $e) {

           return $this->debugLog($e); 
        }
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
