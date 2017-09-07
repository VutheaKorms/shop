<?php

namespace App\Http\Controllers;
use App\Models\Picture;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function index(Request $request)
    {
        $input = $request->all();
        if($request->get('search')){
            $users = User::with('picture')->where("name", "LIKE", "%{$request->get('search')}%")
                ->orWhere('created_at','LIKE',"%{$request->get('search')}%")
                ->paginate(5);
        }else{
            $users = User::paginate(5);
        }
        //$users = User::get();
        return response($users);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return response($user);
    }

    public function show($id = null)
    {
        $userId = $id ?: auth()->user()->id;

        $user = User::findOrFail($userId);

        return response($user);

        // return the the view with the user
    }

    public function edit($id)
    {
        $item = User::find($id);
        return response($item);
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

        } else {
            $user = new User();
            $user->name = $request['name'];
            $user->email = $request['email'];
            if ($request->has('password'))  {
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();
            return response($user);
        }

    }

    public  function update(Request $request , $id)
    {
        $rules = array(
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

        }

        $user = User::findOrFail($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        if ($request->has('password'))  {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();
        Session::put('user_session_id', $user->id);
        return response($user);
    }

    public function resizeImagePost(Request $request)
    {
        $user_id = $request->session()->get('user_session_id');

        $tempPath = $_FILES['file']['tmp_name'];
        $uploadPath = 'pictures/' . $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];

        move_uploaded_file($tempPath, $uploadPath);

        $picture = new Picture();
        $picture->name = "$uploadPath";
        $picture->size = "$size";
        $picture->type = "$type";
        $picture->user_id = $user_id;
        $picture->status = 1;

        $picture->save();
        return response($picture);

    }

    public function userLogIn() {
        //$user = Auth::user();
        $me = Auth::user();
        $me->load('picture');
        //$allUsersWithPersons = $user->with('picture')->get();
        //return response($allUsersWithPersons);
        return response($me);
    }

    public function showPicture($id)
    {
        $picture = Picture::where("user_id", "=" , $id)->get();
        return response($picture);

        return response($picture);

    }

    public function destroy($id)
    {
        //return User::where('id',$id)->delete();
        $user = DB::delete('delete from users where id = ?',[$id]);
        return response($user);
    }

    public function deletePic($id)
    {
        $pic = DB::delete('delete from pictures where user_id = ?',[$id]);
        return response($pic);
    }

    public  function disable(Request $request, $id)
    {
        try {
            $users = User::findOrFail($id);
            $users->status = $request[0];
            $users->updated_at = $request['updated_at'];
            $users->save();
            return response($users);
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }

    public  function enable(Request $request, $id)
    {
        try {
            $users = User::findOrFail($id);
            $users->status = 1;
            $users->updated_at = $request['updated_at'];
            $users->save();
            return response($users);
        }
        catch(ModelNotFoundException $err){
            //Show error page
        }
    }
}
