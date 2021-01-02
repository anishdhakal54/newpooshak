<?php

namespace App\Http\Controllers;

use App\About;
use App\Brand;
use App\Category;
use App\College;
use App\Mail\EmailVerification;
use App\Post;
use App\Slideshow;
use App\Suscriber;
use App\Testimonial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;


class WelcomeController extends Controller
{
  public function index()
  {

//
//        $enquiries = ProductEnquiry::duplicate('user_id');
//        dd($enquiries);
//       $ans=[];
//        foreach ($enquiries as $enquiry) {
//            $ans[]=[
//
//
//];
//      }


    //$cartContent = Cart::content();
    //dd($cartContent);
    $slideshows = Slideshow::orderBy(DB::raw('LENGTH(priority), priority'))->where('active', '=', 1)->get();
    //$latestProducts   = Product::orderby( 'id', 'DESC' )->take( 15 )->get();
    //$featuredProducts = Product::where( 'is_featured', 1 )->orderby( 'id', 'DESC' )->take( 15 )->get();
    //$popularProducts  = Product::orderby( 'id', 'DESC' )->take( 10 )->get();
    $testimonials = Testimonial::orderby('id', 'DESC')->take(5)->get();
    $brands = Brand::orderBy(DB::raw('LENGTH(priority), priority'))->get();
    $latestPosts = Post::orderby('id', 'DESC')->take(2)->get();
    $category = Category::where('parent_id', '=', '0')->take(8)->get();

    return view('pashmina_theme.index', compact('slideshows', 'testimonials', 'brands', 'latestPosts', 'category'));
  }

  public function about()
  {
    $about = About::all();
    return view('pages.templates.about-message', compact('about'));
  }


  public function addSuscriber(Request $request)
  {
    $request->validate([
      'newsletterEmail' => 'required | email'
    ]);
    $suscribe = new Suscriber();
    $suscribe->email = $request['newsletterEmail'];
    $suscribe->save();
    session()->flash('message', true);

    return redirect()->back()->with('success', 'Subscription successfully added!');
  }

  public function request()
  {

    return view('request');
  }

  public function get()
  {
    return view('vertification');
  }

  public function pending()
  {
    return view('pending');
  }

  public function send($email)
  {
    $user = User::where('email', $email)->first();

    $data = [
      'email_token' => $user->email_token


    ];

    Mail::to($email)->send(new EmailVerification($data));
    return redirect()->back();
  }
}
