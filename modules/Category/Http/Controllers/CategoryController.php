<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Modules\Category\Entities\Category;
use Illuminate\Contracts\Support\Renderable;
use Modules\Core\Http\Controllers\AppController;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Http\Requests\UpdateCategoryRequest;

class CategoryController extends AppController
{

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
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
        if($request->category_id){
            $route_datatable=route('category.datatable',['category_id'=>$request->category_id]);
            $category_id=$request->category_id;
        }else{
            $route_datatable=route('category.datatable');
            $category_id=null;
        }
        return view('category::dashboard.index',compact('route_datatable','category_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'POST',
            'dt_modal_submit_url' => route('category.store')
        ]);

        if($request->category_id){
            $category_id=$request->category_id;
        }else{
            $category_id=null;
        }
       
        return view('category::dashboard.modals.add',compact('category_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CategoryRequest $request)
    {
        $data=$request->except('photo');
         
        $photo=$request->photo;

        if($photo){
        $filename=time().'-'.$photo->getClientOriginalName();
        $path=base_path().'/storage/app/public/category/img/';

        $img = Image::make($photo->getRealPath());
        $img->resize(305, 250, function ($constraint){
            $constraint->aspectRatio();
        })->save($path.$filename);

        $data['photo_path']='/system/storage/app/public/category/img/'.$filename;
        }
        $data['slug']=Str::slug($request->name_en);
        $category = Category::create($data);
        
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-added-row')],201);
    }

    
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Category $category)
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'PUT',
            'dt_modal_submit_url' => route('category.update', [$category->id]),
        ]);
            return view('category::dashboard.modals.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data=$request->except('photo');
        $photo=$request->photo;

        if($photo){
        $filename=$photo->getClientOriginalName();
        $path=base_path().'/storage/app/public/category/img/';

        $img = Image::make($photo->getRealPath());
        $img->resize(305, 250, function ($constraint){
            $constraint->aspectRatio();
        })->save($path.$filename);

        $data['photo_path']='/system/storage/app/public/category/img/'.$filename;
        }

        $data['slug']=Str::slug($request->name_en);


        $category->update($data);
        
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-updated-row')],200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-row')], 200);
    }


    public function destroyMany(Request $request){
        Category::destroy($request->ids);
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-rows')],200);
    }
    

}
