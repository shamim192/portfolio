<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogList;
use App\Models\Feedback;
use App\Models\PortfolioItem;
use App\Models\SkillItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $blog = BlogList::count();
        $skill =SkillItem::count();
        $portfolio = PortfolioItem::count();
        $feedbacks = Feedback::count();

        return view('admin.dashboard',compact('blog','skill','portfolio','feedbacks'));
    }
}
