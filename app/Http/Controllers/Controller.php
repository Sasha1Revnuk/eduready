<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function renderMainMenu()
    {
        $categories = Category::all();
        $cat = [];
        foreach ($categories as $category) {
            $cat[$category['id']] = $category['title'];
        }

        $mainMenu = [
            'Головна' => route('main'),
            'Про нас' => '#',
            'Курси' => ['hard' => '#', 'soft' => $cat],
            'Контакти' => '#'
        ];
        return $mainMenu;
    }
}
