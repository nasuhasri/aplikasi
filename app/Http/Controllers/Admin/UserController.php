<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = [
            [
                'name' => 'Nasuha',
                'email' => 'nasuhasri00@gmail.com',
                'course' => 'Laravel 101'
            ],

            [
                'name' => 'Amirah',
                'email' => 'nasuhasri00@gmail.com',
                'course' => 'Laravel 101'
            ],

            [
                'name' => 'Aliah',
                'email' => 'nasuhasri00@gmail.com',
                'course' => 'Laravel 101'
            ]
        ];

        $html_content = '<h1>Hello Selamat Datang</h1>';
        // $user = null;

        // pass html content pd html content
        return view('admin.user', [
            'users' => [],
            'html_content' => $html_content
        ]);
        // return view('admin.user');
        // return view('admin.user.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
