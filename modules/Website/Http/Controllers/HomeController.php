<?php

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Car\Entities\Car;
use Modules\Why\Entities\Why;
use Modules\Page\Entities\Faq;
use Modules\News\Entities\News;
use Modules\Page\Entities\Page;
use Modules\Type\Entities\Type;
use Modules\Core\Entities\Option;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\App;
use Modules\Banner\Entities\Banner;
use Modules\Review\Entities\Review;
use Modules\Slider\Entities\Slider;
use Illuminate\Support\Facades\Lang;
use Modules\Partner\Entities\Partner;
use Modules\Product\Entities\Product;
use Modules\Project\Entities\Gallary;
use Modules\Project\Entities\Project;
use Modules\Service\Entities\Service;
use Modules\Category\Entities\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Notification;
use Modules\Website\Notifications\RequestNotification;
use Modules\Website\Notifications\SendMailNotification;
use Modules\Website\Notifications\SendMailJoinNotification;

class HomeController extends Controller
{

     // pages
    public function index()
    {



        $locale=App::getLocale();


        $services=Service::all();
        $products=Project::orderBy('id','desc')->take(10)->get();
        $whies=Why::get();
        $newses=News::orderBy('id','desc')->take(4)->get();
        $option['about'] = Option::getValueByKey('about_'.$locale);
        $option['video'] = Option::getValueByKey('video');
        return view('website::home',compact('services','products','option','newses','whies'));
    }



    public function page(Request $request)
    {
        $locale=App::getLocale();
        
        if($request->page=='about'){
        $content = Option::getValueByKey('about_'.$locale);
        }

        if($request->page=='mission'){
            $content = Option::getValueByKey('mission_'.$locale);
        }

        if($request->page=='vision'){
            $content = Option::getValueByKey('vision_'.$locale);
        }

        $title=$request->page;

        return view('website::about',compact('content','title'));
    }
 

    

    public function services(Request $request)
    {
        $services=Service::all();
        return view('website::services',compact('services'));
    }
    
    
    public function show_service($slug)
    {
        $service=Service::where('slug',$slug)->first();
        $services=Service::all();

        return view('website::show_service',compact('service','services'));
    }

    public function request_service(Request $request)
    {
        $data=[];
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['service']=$request->service;
        
        $email= Option::getValueByKey('email1');
        Notification::route('mail', $email)->notify(new RequestNotification($data));


        Toastr::success('success', __('Thank you for contacting us We will respond to your inquiry as soon as possible'));
   
        return redirect()->back();
    }
  
    
    public function categories(Request $request)
    {
        $categories=Category::where('parent_id',null)->get();
        return view('website::categories',compact('categories'));
    }
    
    
    public function show_category($slug,$id)
    {

        $category=Category::where('id',$id)->first();
        $categories=$category->childreen;
        return view('website::categories',compact('categories','category'));
    }

    public function products(Request $request)
    {
        if($request->search){
            $projects = Project::where('title_en','LIKE','%'.$request->search.'%')
            ->orWhere('title_ar','LIKE','%'.$request->search.'%')
            ->orWhere('title_fr','LIKE','%'.$request->search.'%')
            ->orWhere('title_ja','LIKE','%'.$request->search.'%')
            ->get();
        }else{
            $projects=Project::get();
        }
        return view('website::projects',compact('projects'));
    }
    
    
    public function show_product($category_slug,$slug,$id)
    {
        $project=Project::where('id',$id)->first();
        return view('website::show_project',compact('project'));
    }

    
    public function news(Request $request)
    {
        $news=News::orderBy('id','desc')->get();
        return view('website::news',compact('news'));
    }
    
    
    public function show_news($slug,$id)
    {
        $news=News::find($id);
        $all_news=News::orderBy('id','desc')->take(3)->get();
        $services=Service::all();

        return view('website::show_news',compact('news','all_news','services'));
    }
    

    public function gallary(Request $request)
    {
        $gallaries=slider::orderBy('id','desc')->get();
        return view('website::gallary',compact('gallaries'));
    }
    

    public function contact()
    {
        $option['email1'] = Option::getValueByKey('email1');
        $option['phone1'] = Option::getValueByKey('phone1');

        return view('website::contact',compact('option'));
    }

    public function request_quote()
    {
        $option=[];

        $option['phone1'] = Option::getValueByKey('phone1');
        $option['phone2'] = Option::getValueByKey('phone2');

        return view('website::request_quote',compact('option'));
    }
    

    public function send_mail(Request $request)
    {
        $option['email1'] = Option::getValueByKey('email1');


        if($request->type && $request->type=='touch'){

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'country' => 'required',
                'zone' => 'required',
                'subject' => 'required',
                'type_activity' => 'required',
                'message' => 'required'
            ]);
            
            // Check if validation fails
            if ($validator->fails()) {
            
                Toastr::error('Error', __('Please enter the data correctly'));
                return redirect()->back();

            }
            
                
                    // Gather form data in an array
                    $data = [
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'phone' => $request->input('phone'),
                        'country' => $request->input('country'),
                        'zone' => $request->input('zone'),
                        'subject' => $request->input('subject'),
                        'type_activity'=>$request->input('type_activity'),
                        'message' => $request->input('message')
                    ];
            
            
                    Notification::route('mail',$option['email1'])->notify(new RequestNotification($data));

        }else{
   // Define validation rules
   $validator = Validator::make($request->all(), [
    'name' => 'required',
    'email' => 'required',
    'phone' => 'required',
    'msg_qualification' => 'required',
    'msg_job' => 'required',
    'msg_city' => 'required',
    'msg_experience' => 'required',
    'msg_subject' => 'required',
    'activity_file' => 'required|file|mimes:pdf,doc,docx|max:2048',
    'message' => 'required'
]);

// Check if validation fails
if ($validator->fails()) {

    Toastr::error('Error', __('Please enter the data correctly'));
    return redirect()->back();

}

    
        // Gather form data in an array
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'qualification' => $request->input('msg_qualification'),
            'job' => $request->input('msg_job'),
            'city' => $request->input('msg_city'),
            'experience' => $request->input('msg_experience'),
            'subject' => $request->input('msg_subject'),
            'message' => $request->input('message')
        ];
    
        // Handle file upload

        $activity_file=$request->file('activity_file');
    
        if($activity_file){
            $filename=$activity_file->getClientOriginalName();
            $path=base_path().'/storage/app/public/uploads/cv/';
    
            $activity_file->move($path,$filename);

            $data['activity_file'] = $path.$filename;

        }


        Notification::route('mail',$option['email1'])->notify(new SendMailJoinNotification($data));

    }




        Toastr::success('success', __('Thank you for contacting us We will respond to your inquiry as soon as possible'));
   
        return redirect()->back();
    }
    



    public function cookies()
    {
        $locale=App::getLocale();
        
        $content=Option::getValueByKey('cookies_'.$locale);
        return view('website::cookies',compact('content'));
    }

    public function search()
    {

        return view('website::search');
    }

}
