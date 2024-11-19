<?php

namespace Modules\Why\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Modules\Core\Http\Controllers\AppController;
use Modules\Why\Entities\Why;
use Modules\Why\Http\Requests\UpdateWhyRequest;
use Modules\Why\Http\Requests\WhyRequest;

class WhyController extends AppController
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
        return view('why::dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'POST',
            'dt_modal_submit_url' => route('why.store')
        ]);
       
        return view('why::dashboard.modals.add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(WhyRequest $request)
    {
        $data=$request->except('photo');

        $photo=$request->photo;
        $photoname=time().'-'.$photo->getClientOriginalName();
        $path=base_path().'/storage/app/public/why/img/';
        $photo->move($path,$photoname);

        $data['photo']=$photoname;
        $why = Why::create($data);
        
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-added-row')],201);
    }

    
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Why $why)
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'PUT',
            'dt_modal_submit_url' => route('why.update', [$why->id]),
        ]);
            return view('why::dashboard.modals.edit', compact('why'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateWhyRequest $request, Why $why)
    { 
        $data=$request->except('photo');

        $photo=$request->photo;
        if(!empty($photo)){
        $photo_name=time().'-'.$photo->getClientOriginalName();
        $path=base_path().'/storage/app/public/why/img/';
    
        $photo->move($path,$photo_name);
    
        $data['photo']=$photo_name;
        }

            $why->update($data);
            return response()->json(['message' => Lang::get('core::global.toastr.toastr-updated-row')],200);

    }

     
    public function destroy(Why $why)
    {
        $why->delete();
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-row')], 200);
    }


    public function destroyMany(Request $request){
        Why::destroy($request->ids);
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-rows')],200);
    }
}
