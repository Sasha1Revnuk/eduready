<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'title' => 'Контакти',
            'breadCrumbs' => [
                'Головна' => '/',
                'Контакти' => '/contacts'
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,

        ];

        return view('contact.index')->with($data);
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/contacts')
                ->withErrors($validator)
                ->withInput();
        }

        $data = array('text'=>$request->input('message'));
        Mail::send('mail', $data, function($message) use ($request)
        {
            $message->from($request->input('email'), $request->input('name'));
            $message->to('petersheffield017@gmail.com', 'Eduready')->subject($request->input('subject') );
        });

        return redirect('/contacts');

    }
}
