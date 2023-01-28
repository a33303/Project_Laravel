<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OrderUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return \view('upload.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('upload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
       // dd($request->all());
        Log::debug(print_r($request->all(),1));
        $validator = Validator::make($request->all(), [
            'user' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'description' => 'required|string'
        ], [
            'user.required' => 'Нет имени пользователя',
            'user.string' => 'Имя должно быть строкой',
            'phone.required' => 'Нет номера телефона пользователя',
            'phone.string' => 'Номер телефона должно быть строкой',
            'email.required' => 'Нет почты пользователя',
            'email.string' => 'Почта должна быть строкой',
            'description.required' => 'Нет комментария',
            'description.string' => 'Комментария должен быть строкой',
        ]);

        if ($validator->fails()) {
            Log::debug($validator->errors()->first());
            return \response()->json(['success'=> false]);
        }

        $data_string = "*********\nUSER: $request->user
                        \n*******\nPHONE: $request->phone
                        \n*******\nEMAIL: $request->email
                        \nDESCRIPTION: $request->description
                        \n*******\n";
        $file = file_put_contents("upload/log_order_upload.txt", $data_string, FILE_APPEND);

        return \response()->json(['success'=> true]);//error , message
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}