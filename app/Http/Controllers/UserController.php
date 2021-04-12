<?php

    namespace App\Http\Controllers;

    use App\Attendence;
    use App\Overtime;
    use App\User;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Maatwebsite\Excel\Facades\Excel;
    use App\Exports\UserExport;
    use Mail;

class UserController extends Controller
{
    //view list user
    public function getList() {
        $user = User::orderBy('user_name')->paginate(15);
        return view('admin/user_manage/list',['user'=> $user]);
    }

    //view page add user
    public  function getAdd() {
        return view('admin/user_manage/add');
    }

    //add user
    public function postAdd(Request $request) {
        $this->validate($request,
            [
                'username' => array(
                    'required',
                    'unique:users,user_name',
                    'regex:/^(?=.{6,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/'
                ),
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3|max:16',
                'password_again' => 'required|same:password',
                'position' => 'required|max:50'
            ],
            [
                'username.required' => 'Please enter user name !',
                'username.regex' => "Please enter a validate username !",
                'username.unique' => "Username already exist !",
                'email.required' => 'Please enter email !',
                'email.email' => "Please enter a validate email address !",
                'email.unique' => "Email already exist !",
                'password.required'=> "Please enter your password",
                'password.min' => "Password min 3 characters",
                'password.max' => "Password max 16 characters",
                'password_again.required'=> "Please enter your password",
                'password_again.same' => "Password not match",
                'position.required' => "Please enter position",
                'position.max' => "Position max 50 characters"
            ]
        );
        $user = new User();
        $user->user_name = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->position = $request->position;
        $user->role = $request->role;
        $user->picture = "default-150x150.png";
        $user->save();
        Mail::send('admin/user_manage/mail',
            [
                'username' => $request->username,
                'password' => $request->password,
                'email' =>$request->email
            ],
            function ($message) use($request){
                $message->from('andinh.da@gmail.com');
                $message->to($request->email);
            }
        );

        return redirect('admin/user_manage/add')->with('global','User "'.$request->username.'" has been added !');
    }

    //view page edit user
    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin/user_manage/edit',['user'=> $user]);

    }

    //edit user
    public function postEdit(Request $request, $id) {
        $this->validate($request,
            [
                'username' => array(
                    'required',
                    'regex:/^(?=.{6,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/'
                ),
                'email' => 'required|email',
                'password' => 'min:3|max:16',
                'password_again' => 'same:password',
                'position' => 'required|max:50'
            ],
            [
                'username.required' => 'Please enter user name !',
                'email.required' => 'Please enter email !',
                'email.email' => "Please enter a validate email address !",
                'password.min' => "Password min 3 characters",
                'password.max' => "Password max 16 characters",
                'password_again.same' => "Password not match",
                'position.required' => "Please enter position",
                'position.max' => "Position max 50 characters",
            ]
        );
        $all = User::all();
        $user = User::find($id);
        $username = $request->username;
        $fullname = $request->fullname;
        $email = $request->email;
        $error = [];
        foreach ($all as $us) {
            if ($us->id != $id) {
                if ($us->user_name == $username) {
                   $error[] = "Username already exist !";
                }
                if (isset($fullname)) {
                    if ($us->full_name == $fullname) {
                        $error[] = "Fullname already exist !";
                    }
                }
                if ($us->email == $email) {
                    $error[] = "Email already exist !";
                }
            }
        }
        if (count($error) > 0) {
            $user['user_name'] = $username;
            $user['full_name'] = $fullname;
            $user['id'] = $id;
            $user['email'] = $email;
            return view('admin/user_manage/edit', ['user' => $user, 'error' => $error]);
        }

        $user->full_name = $fullname;
        $user->user_name = $username;
        if ($request["changePassword"] == "on") {
            $user->password = bcrypt($request->password);
        }
        $user->email = $email;
        $user->position = $request->position;
        $user->role = $request->role;
        $user->phone_number = $request->phone_number;
        if (isset($request->picture)) {
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');

                $picture = $file->getClientOriginalName();
                $user->picture = $picture;
            }
        }
        $user->save();
        return redirect('admin/user_manage/list')->with('global','User "'.$request->username.'" was changed !');
    }

    //delete user
    public function getDelete($id)
    {
        $user = User::find($id);
        $ot = Overtime::where('user_id', $id)->get();
        if (isset($ot[0]->id)) {
            Overtime::where('user_id',$id)->delete();
        }
        $off = Attendence::where('user_id', $id)->get();
        if (isset($off[0]->id)) {
            Attendence::where('user_id',$id)->delete();
        }
        $user->delete();
        return redirect('admin/user_manage/list')->with('global','User was delete !');
    }

    //export user
    public function getExport() {
        return Excel::download(new UserExport, 'user_infor.xls');
        return redirect('admin/home');
    }

}
