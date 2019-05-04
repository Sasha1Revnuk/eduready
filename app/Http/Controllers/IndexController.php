<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



class IndexController extends Controller
{
    public $mainMenu;
    public function __construct()
    {
        $this->mainMenu = $this->renderMainMenu();
        //dd($this->mainMenu);
    }

    public function show()
    {


        $data = [
            'menu' => $this->mainMenu,
            'routeName' => 'main',
            'activeMenu' => '',
            'advantages' => Advantage::all()
        ];

        return view('index')->with($data);
    }
}
