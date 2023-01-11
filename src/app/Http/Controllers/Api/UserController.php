<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Favorite;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statusHttp=500;
        try{
            if (!$request->user()->tokenCan('is-admin')) {
                $statusHttp = 403;
                throw new Exception("You don't have permission.");
            }
            $perPage = $request->query('per_page');
            $paginateUsers = User::paginate($perPage);
            $paginateUsers->appends([
                'per_page'=>$perPage
            ]);
            return response()->json($paginateUsers);
        }catch(\Exception $e){
            return response()->json([
                'error'=>$e->getMessage()
            ],$statusHttp);
        }

    }

    public function toggleFavorite(Request $request, $serie_id) {
        $statusHttp = 500;
        try {
            $favoritedSerie = Favorite::create([
                'serie_id'=>$serie_id,
                'user_id'=>$request->user()->id
            ]);
            if (!$favoritedSerie) {
                throw new \Exception("Could not favorite this serie.");
                return response()->json([
                    'message'=>'Serie added to favorites.',
                    'favorite'=>$favoritedSerie
                ]);
            }
        } catch(\Exception $e) {
            return response()->json([
                'message'=>'Try again later.',
                'error'=>$e->getMessage()
            ], $statusHttp);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $statusHttp = 500;
        try{

            $userParams = $request->all();
            $userParams['password']  = Hash::make($request->password);
            $createdUser = User::create($userParams);
            if(!$createdUser)
                throw new \Exception("Error while creating user.");
            return response()->json([
                'message'=>'User created.',
                'user'=>$createdUser
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message'=>'Error. Try again later.',
                'erro'=>$e->getMessage()
            ],$statusHttp);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // return response()->json(compact('user'));
        return response()->json(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $statusHttp = 500;
        try {
            if(!$request->user()->tokenCan('is-admin')) {
                $statusHttp = 403;
                throw new \Exception("You don't have permission to do that.");
            }
            $data = $request->all();
            $user->update($data);
            return response()->json([
                'message'=> 'User updated.',
                'User'=> $user
            ]);
        } catch(\Exception $error) {
            $message = [
                "Error:"=> "Error while updating.",
                "Exception"=> $error->getMessage()
            ];
            return response()->json($message, $statusHttp);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        try {
            if(!$user->delete()) {
                throw new \Exception("Unknown error. Try again later.");
            }
            return response()->json([
                "message"=> "User deleted.",
                "user"=> $user
            ]);
        } catch(\Exception $error) {
            $responseError = [
                "Error:"=> "Error while deleting user.",
                "Exception"=> $error->getMessage()
            ];
            $statusHttp = 404;
            return response()->json($responseError, $statusHttp);
        }
    }
}
