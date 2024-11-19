<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Modules\Service\Entities\Service;
use Illuminate\Contracts\Support\Renderable;
use Modules\Core\Http\Controllers\AppController;
use Modules\Service\Http\Requests\ServiceRequest;
use Modules\Service\Http\Requests\UpdateServiceRequest;

class ServiceController extends AppController
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->setMessages([
            //swal
            'swal-delete-prompt' => Lang::get('core::global.swal.swal-delete-prompt'),
            'swal-delete-prompt-single' => Lang::get('core::global.swal.swal-delete-prompt-single'),
            'swal-hard-delete-prompt' => Lang::get('core::global.swal.swal-hard-delete-prompt'),
            'swal-hard-delete-prompt-single' => Lang::get('core::global.swal.swal-hard-delete-prompt-single'),
            'swal-delete-btn-confirm' => Lang::get('core::global.swal.swal-delete-btn-confirm'),
            'swal-delete-btn-discard' => Lang::get('core::global.swal.swal-delete-btn-discard'),

            'swal-restore-prompt' => Lang::get('core::global.swal.swal-restore-prompt'),
            'swal-restore-prompt-single' => Lang::get('core::global.swal.swal-restore-prompt-single'),
            'swal-restore-btn-confirm' => Lang::get('core::global.swal.swal-restore-btn-confirm'),
            'swal-restore-btn-discard' => Lang::get('core::global.swal.swal-restore-btn-discard'),
        ]);
        return view('service::dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'POST',
            'dt_modal_submit_url' => route('service.store')
        ]);
       
        return view('service::dashboard.modals.add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ServiceRequest $request)
    {
        $data=$request->except('photo');
         
        $photo=$request->photo;

        if($photo){
        $filename=time().'-'.$photo->getClientOriginalName();
        $path=base_path().'/storage/app/public/service/img/';

        $photo->move($path,$filename);
        $data['photo_path']='/system/storage/app/public/service/img/'.$filename;
        }
        // $exp=[];
        // foreach($request->expertise as $expertise){
        //     if($expertise!=null){
        //         $exp[]=$expertise;
        //     }
        // }
        // $data['expertise']=$exp;
        $data['slug']=Str::slug($request->title_en);
        $service = Service::create($data);
        
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-added-row')],201);
    }

    
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Service $service)
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'PUT',
            'dt_modal_submit_url' => route('service.update', [$service->id]),
        ]);
            return view('service::dashboard.modals.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data=$request->except('photo');

        $photo=$request->photo;

        if($photo){
        $filename=time().'-'.$photo->getClientOriginalName();
        $path=base_path().'/storage/app/public/service/img/';

        $photo->move($path,$filename);
        $data['photo_path']='/system/storage/app/public/service/img/'.$filename;
        }

        // $exp=[];
        // foreach($request->expertise as $expertise){
        //     if($expertise!=null){
        //         $exp[]=$expertise;
        //     }
        // }
        // $data['expertise']=$exp;
        $data['slug']=Str::slug($request->title_en);

        $service->update($data);
        
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-updated-row')],200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-row')], 200);
    }


    public function destroyMany(Request $request){
        Service::destroy($request->ids);
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-rows')],200);
    }
    

}
