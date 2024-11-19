<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Modules\Project\Entities\Project;
use Modules\Category\Entities\Category;
use Illuminate\Contracts\Support\Renderable;
use Modules\Core\Http\Controllers\AppController;
use Modules\Project\Entities\ProjectOption;
use Modules\Project\Http\Requests\ProjectRequest;
use Modules\Project\Http\Requests\UploadPhotosRequest;
use Modules\Project\Http\Requests\UpdateProjectRequest;

class ProjectController extends AppController
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
        return view('project::dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'POST',
            'dt_modal_submit_url' => route('project.store')
        ]);   
        $categories=Category::get();
        return view('project::dashboard.modals.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProjectRequest $request)
    {
        $data = $request->except('photos');
        $data['slug']=Str::slug($request->title_en);

        $project = Project::create($data);

        if($request->color_en){


    foreach($request->color_en as $index=>$color_en){
        $option=ProjectOption::create([
            'project_id'=>$project->id,

            'color_en'=>$color_en,
            'color_ar'=>$request->color_ar[$index],
            'color_fr'=>$request->color_fr[$index],
            'color_ja'=>$request->color_ja[$index],

            'name_en'=>$request->name_en[$index],
            'name_ar'=>$request->name_ar[$index],
            'name_fr'=>$request->name_fr[$index],
            'name_ja'=>$request->name_ja[$index],
            
            'description_en'=>$request->option_description_en[$index],
            'description_ar'=>$request->option_description_ar[$index],
            'description_fr'=>$request->option_description_fr[$index],
            'description_ja'=>$request->option_description_ja[$index],

        ]);
    }


    }
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-added-row')], 201);
    }


    // main_photo
    public function upload_mainphoto(UploadPhotosRequest $request)
    {

        $photos = $request->photos;
        $photoname = $photos->getClientOriginalName();
        $path = base_path() . '/storage/app/public/project/img/';
        
        $img = Image::make($photos->getRealPath());
        $img->resize(510, 600, function ($constraint){
            $constraint->aspectRatio();
        })->save($path.$photoname);

    }


    public function delete_mainphoto(Request $request)
    {

        $photos = $request->filename;
        File::delete(base_path() . '/storage/app/public/project/img/' . $photos);
    }


    public function get_mainphoto(Request $request)
    {
        $project = Project::find($request->project_id);

        $image = $project->main_photo;
        
            $obj['name'] = $image;
            $file_path = base_path() . '/storage/app/public/project/img/' . $image;
            $obj['size'] = filesize($file_path);
            $obj['path'] = url('/system/storage/app/public/project/img/' . $image);
            $data[] = $obj;
        //dd($data);
        return $data;

    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Project $project)
    {
        $this->setAjaxParams([
            'dt_modal_request_type' => 'PUT',
            'dt_modal_submit_url' => route('project.update', [$project->id]),
        ]);

        $categories=Category::get();

        return view('project::dashboard.modals.edit', compact('project','categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->except('photos');
        $data['slug']=Str::slug($request->title_en);

        $project->update($data);

        ProjectOption::where('project_id',$project->id)->delete();
        
        if($request->color_en){
           foreach($request->color_en as $index=>$color_en){
        $option=ProjectOption::create([
            'project_id'=>$project->id,
            'color_en'=>$color_en,
            'color_ar'=>$request->color_ar[$index],
            'color_fr'=>$request->color_fr[$index],
            'color_ja'=>$request->color_ja[$index],

            'name_en'=>$request->name_en[$index],
            'name_ar'=>$request->name_ar[$index],
            'name_fr'=>$request->name_fr[$index],
            'name_ja'=>$request->name_ja[$index],
            
            'description_en'=>$request->option_description_en[$index],
            'description_ar'=>$request->option_description_ar[$index],
            'description_fr'=>$request->option_description_fr[$index],
            'description_ja'=>$request->option_description_ja[$index],

        ]);
    }

    }
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-updated-row')], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-row')], 200);
    }


    public function destroyMany(Request $request)
    {
        Project::destroy($request->ids);
        return response()->json(['message' => Lang::get('core::global.toastr.toastr-deleted-rows')], 200);
    }
}
