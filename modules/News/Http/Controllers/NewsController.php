<?php

namespace Modules\News\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\News\Entities\News;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Modules\News\Http\Requests\NewsRequest;
use Illuminate\Contracts\Support\Renderable;
use Modules\Core\Http\Controllers\AppController;
use Modules\News\Http\Requests\UpdateNewsRequest;

class NewsController extends AppController
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
        return view('news::dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'POST',
            'dt_modal_submit_url' => route('news.store')
        ]);
       
        return view('news::dashboard.modals.add');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(NewsRequest $request)
    {
        $data=$request->all();
        
        $photo=$request->photo;
        
        $filename=$photo->getClientOriginalName();
        $path=base_path().'/storage/app/public/news/img/';

        $img = Image::make($photo->getRealPath());
        $img->resize(516,516, function ($constraint){
            $constraint->aspectRatio();
        })->save($path.$filename);

        $data['photo']='system/storage/app/public/news/img/'.$filename;
        
        $data['slug']=Str::slug($request->title_en);

        $news=News::create($data);
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-added-row')],201);
    }

    
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(News $news)
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'PUT',
            'dt_modal_submit_url' => route('news.update', [$news->id]),
        ]);
            return view('news::dashboard.modals.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $data=$request->all();
        $photo=$request->photo;

        if(!empty($photo)){

            $filename=$photo->getClientOriginalName();
            $path=base_path().'/storage/app/public/news/img/';
    
            $img = Image::make($photo->getRealPath());
            $img->resize(516,516, function ($constraint){
                $constraint->aspectRatio();
            })->save($path.$filename);
    
            $data['photo']='system/storage/app/public/news/img/'.$filename;

        }
        $data['slug']=Str::slug($request->title_en);

        $news->update($data);
  

        return response()->json(['message' => Lang::get('core::global.toastr.toastr-updated-row')],200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-row')], 200);
    }


    public function destroyMany(Request $request){
        News::destroy($request->ids);
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-rows')],200);
    }
    

    public function upload_photo(Request $request){
        $photo=$request->upload;
        $photoname=time().'-'.$photo->getClientOriginalName();
        $path=base_path().'/storage/app/public/news/img/';
        $photo->move($path,$photoname);
    
        return response()->json(['fileName' => $photoname, 'uploaded'=> 1, 'url' => url('/system/storage/app/public/news/img/'.$photoname)]);

    }

}
