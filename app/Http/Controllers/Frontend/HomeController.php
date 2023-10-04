<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\BlogCategory;
use App\Models\BlogList;
use App\Models\BlogSetting;
use App\Models\Category;
use App\Models\ContactSetting;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSectionSetting;
use App\Models\Hero;
use App\Models\PortfolioItem;
use App\Models\PortfolioSectionSetting;
use App\Models\Service;
use App\Models\SkillItem;
use App\Models\SkillSectionSetting;
use App\Models\TyperTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {

        $hero = Hero::first();
        $typerTitles = TyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $portfolioTitle = PortfolioSectionSetting::first();
        $portfolioCategories = Category::all();
        $portfolioItems = PortfolioItem::all();
        $skillSetting = SkillSectionSetting::first();
        $skill = SkillItem::all();
        $experience = Experience::first();
        $feedbackSetting = FeedbackSectionSetting::first();
        $feedbacks = Feedback::all();
        $blogs = BlogList::all();
        $blogSetting = BlogSetting::first();
        $contact = ContactSetting::first();
        return view('frontend.home',
            compact(
                'hero',
                'typerTitles',
                'services',
                'about',
                'portfolioTitle',
                'portfolioCategories',
                'portfolioItems',
                'skillSetting',
                'skill',
                'experience',
                'feedbackSetting',
                'feedbacks',
                'blogs',
                'blogSetting',
                'contact'
            )
        );
    }

    public function showPortfolio($id)
    {
        $portfolio = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('portfolio'));
    }

    public function showBlog($id)
    {
        $blog = BlogList::findOrFail($id);
        $previousPost = BlogList::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $nextPost = BlogList::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        return view('frontend.blog-details', compact('blog', 'previousPost', 'nextPost'));
    }

    public function blog()
    {
        $blogs = BlogList::latest()->paginate(3);

        return view('frontend.blog', compact('blogs'));
    }

    public function contact(Request $request){
      $request->validate([

        'name' => 'required|max:200',
        'subject' => 'required|max:300',
        'email' => 'required|email',
        'message' => 'required|max:2000',
      ]);

    Mail::send(new ContactMail($request->all()));

      return response(['status' => 'success', 'message' => 'Mail Sended Successfully!']);
    }
}
