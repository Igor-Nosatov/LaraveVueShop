<?php

    namespace App\Http\Controllers;

    use Auth;
    use App\User;
    use Validator;
    use Illuminate\Http\Request;

    class UserController extends Controller
    {
        public function index()
        {
            return response()->json(User::with(['order', 'cart'])->get());
        }

        public function login(Request $request)
        {
            $status = 401;
            $response = ['error' => 'Unauthorised'];

            if (Auth::attempt($request->only(['email', 'password']))) {
                $status = 200;
                $response = [
                    'user' => Auth::user(),
                    'token' => Auth::user()->createToken('LaravelVueShop')->accessToken,
                ];
            }

            return response()->json($response, $status);
        }

        public function register(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'c_password' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $data = $request->only(['name', 'email', 'password']);
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);
            $user->is_admin = 0;

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('LaravelVueShop')->accessToken,
            ]);
        }



    }
