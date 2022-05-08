<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::select( 'id', 'nombre', 'apellido', 'edad' )
            ->orderBy( 'id', 'desc' )
            ->paginate( 10, ['*'], 'usuarios' );

        return response()->json( $usuarios );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @return \Illuminate\Http\Response
     */
    public function store( UsuarioRequest $request )
    {
        $data = $request->validated();

        $usuario = User::create( $data );

        return response()->json( $usuario );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User            $user
     * @return \Illuminate\Http\Response
     */
    public function show( User $user )
    {
        return response()->json( $user );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request    $request
     * @param  \App\Models\User            $user
     * @return \Illuminate\Http\Response
     */
    public function update(
        UsuarioRequest $request,
        User $user
    ) {
        $data = $request->validated();

        $user->update( $data );

        return response()->json( $user );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User            $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user )
    {
        $user->delete();

        return response()->json( $user );
    }
}
