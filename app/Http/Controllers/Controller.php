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
    public $mainMenu;
    public $categories;
    public function __construct()
    {
        $this->mainMenu = $this->renderMainMenu();
        $this->categories = $this->getCategories();
    }
    public function renderMainMenu()
    {
        $categories = Category::all();
        $cat = [];
        foreach ($categories as $category) {
            $cat[$category['url']] = $category['title'];
        }

        $mainMenu = [
            'Головна' => '/',
            'Про нас' => '/about-us',
            'Курси' => ['hard' => '/courses', 'soft' => $cat],
            'Контакти' => '/contacts'
        ];
        return $mainMenu;
    }

    public function getCategories()
    {
        $categories = Category::orderBy('created_at')->take(5)->get();
        return $categories;
    }
}
