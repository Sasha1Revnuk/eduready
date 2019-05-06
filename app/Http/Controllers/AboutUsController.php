<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Advantage;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->take(config('settings.feedbacksOnPage'))->get();
        $feedbacks->load('course');
        $feedbacks->load('user');
        foreach ($feedbacks as $feedback) {
            $feedback->text = mb_substr($feedback->text, 0, 100) . '...';
        }

        $data = [
            'title' => 'Про нас',
            'breadCrumbs' => [
                'Головна' => '/',
                'Про нас' => '/about-us'
            ],
            'menu' => $this->mainMenu,
            'categories'=> $this->categories,
            'advantages' => Advantage::all(),
            'feedbacks' => $feedbacks,
            'aboutUs' => AboutUs::first(),
        ];

        return view('about_us.index')->with($data);
    }
}
