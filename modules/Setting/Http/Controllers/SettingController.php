<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Entities\Option;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Illuminate\Contracts\Support\Renderable;
use Modules\Core\Http\Controllers\AppController;
use Modules\Setting\Http\Requests\SettingRequest;

class SettingController extends AppController
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function setting()
    {
        $this->setMessages([
            //swal
            'swal-update-prompt' => Lang::get('core::global.swal.swal-update-prompt'),
            'swal-update-prompt-single' => Lang::get('core::global.swal.swal-update-prompt-single'),
            'swal-update-btn-confirm' => Lang::get('core::global.swal.swal-update-btn-confirm'),
            'swal-update-btn-discard' => Lang::get('core::global.swal.swal-update-btn-discard'),
        ]);


        $this->setAjaxParams([
            'dt_modal_request_type' => 'POST',
            'dt_modal_submit_url' => route('setting.update'),
        ]);


        $option = [];
       

        $option['app_description_en'] = Option::getValueByKey('app_description_en');
        $option['app_description_ar'] = Option::getValueByKey('app_description_ar');
        $option['app_description_fr'] = Option::getValueByKey('app_description_fr');
        $option['app_description_ja'] = Option::getValueByKey('app_description_ja');


        $option['about_en'] = Option::getValueByKey('about_en');
        $option['about_ar'] = Option::getValueByKey('about_ar');
        $option['about_fr'] = Option::getValueByKey('about_fr');
        $option['about_ja'] = Option::getValueByKey('about_ja');


        // For Vision
        $option['vision_en'] = Option::getValueByKey('vision_en');
        $option['vision_ar'] = Option::getValueByKey('vision_ar');
        $option['vision_fr'] = Option::getValueByKey('vision_fr');
        $option['vision_ja'] = Option::getValueByKey('vision_ja');

        // For Mission
          $option['mission_en'] = Option::getValueByKey('mission_en');
          $option['mission_ar'] = Option::getValueByKey('mission_ar');
          $option['mission_fr'] = Option::getValueByKey('mission_fr');
          $option['mission_ja'] = Option::getValueByKey('mission_ja');
  
          
        

        $option['phone1'] = Option::getValueByKey('phone1');
        $option['phone2'] = Option::getValueByKey('phone2');
        $option['email1'] = Option::getValueByKey('email1');

        $option['facebook'] = Option::getValueByKey('facebook');
        $option['twitter'] = Option::getValueByKey('twitter');
        $option['instgram'] = Option::getValueByKey('instgram');
        $option['linkedin'] = Option::getValueByKey('linkedin');
        $option['whatsapp'] = Option::getValueByKey('whatsapp');
        $option['youtube'] = Option::getValueByKey('youtube');
        $option['video'] = Option::getValueByKey('video');
            


        $option['cookies_en'] = Option::getValueByKey('cookies_en');
        $option['cookies_ar'] = Option::getValueByKey('cookies_ar');
        $option['cookies_fr'] = Option::getValueByKey('cookies_fr');
        $option['cookies_ja'] = Option::getValueByKey('cookies_ja');

              
        return view('setting::dashboard.settings.index', compact('option'));
    }


    public function update_setting(SettingRequest $request)
    {
        //


        $data = $request->except('_token');

        $video=$request->video;
        if($video){
            $video_name=time().'-'.$video->getClientOriginalName();
            $video->move('system/storage/app/public/video_slider/',$video_name);
            $data['video']=$video_name;
        }
        Option::setKeyValue($data);
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-updated-row')], 200);
    }
}
