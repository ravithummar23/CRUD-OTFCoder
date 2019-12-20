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

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            if(request()->ajax())
            {

                $lists = $this->User;
                if(request('searchtext')){
                    $search = request()->searchtext;
                    $lists->where(function($query) use ($search)
                    {
                        $query->orWhere('first_name','like', '%' . $search. '%')
                              ->orWhere('last_name', 'like', '%' . $search. '%') 
                              ->orWhere('email', 'like', '%' . $search. '%'); 
                    });
                }

                $lists = $lists->paginate(14);
                return response()->json(
                   View::make('admin.users.raw',compact('lists'))
                   ->render()
               );
                
            }

            return view('admin.users.index');
        }
        catch(\Exception $e){

            $this->debugLog('#User'.$e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->all();
        
        $rules =[
                'first_name' => 'required',
                'last_name' => 'required',
                'email' =>  'required|email|unique:users',
                'phone' => 'numeric|digits:10',
                'role' => 'required',
              ];

        $msg=[
            'first_name.required' => 'Please enter  First name.',
            'last_name.required' => 'Please enter Last name.',
            'email.required' => 'Please enter email address.',
            'email.email' => 'Please enter valid email address.',
            'email.unique' => 'Email address already exists.',
            'password.required' => 'Please enter password.',
            'phone.numeric' => 'Please enter Numeric.',
            'phone.digits' => 'Please enter Phone number should be 10 digit.',

        ];

        $validator = Validator::make($data,$rules,$msg);

        if($validator->fails())
        {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        
        try
        {
            $user = $this->User->create($data);
            $role_user = $this->RoleUser->insertGetId(['role_id'=>'1','user_id'=>$user->id]);

            $this->success($this->created,'User');
            return redirect('admin/users');
        }
        catch(\Exception $e){

            return $this->debugLog('#User'.$e);
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
        $user = $this->User->find($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editUser = $this->User->find($id);
        return view('admin.users.edit',compact('editUser'));
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
        $data = request()->all();
        $updateUser = $this->User->where('id',$id)->first();
        
        $rules =
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email,' . $updateUser->id,
                'phone' => 'numeric|digits:10',
                'role' => 'required',
            ];

        $msg=[
            'first_name.required' => 'Please enter  First name.',
            'last_name.required' => 'Please enter Last name.',
            'email.required' => 'Please enter email address.',
            'email.email' => 'Please enter valid email address.',
            'email.unique' => 'Email address already exists.',
            'password.required' => 'Please enter password.',
            'phone.numeric' => 'Please enter Numeric.',
            'phone.digits' => 'Please enter Phone number should be 10 digit.',

        ];

        $validator = Validator::make($data,$rules,$msg);

        if($validator->fails())
        {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
       try
        {
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
            if(isset($data['password']) != null){
                $data['password']= Hash::make($data['password']);
            }
            unset($data['_token'],$data['_method']);
            $updateLead = $this->User->where('id',$id)->update($data);
            
            $this->success($this->updated,'User');
            return redirect('admin/users');
        }
        catch(\Exception $e){

            return $this->debugLog('#User'.$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $removeUser = $this->User->where('id',$id)->delete();
        $message = $this->error($this->deleted,'delete User');
        return response()->json(['message' => $message]);
    }
}
