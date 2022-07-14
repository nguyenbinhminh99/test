<?php

namespace App\Repository\Category;

use App\Models\Category;
use App\Repository\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Category::class;
    }

    public function getCategory()
    {
        return $category=Category::all();
    }

    public function getCategoryById($id)
    {
        return Category::where('id', $id)->first();
    }

    public function store(Request $request)
    {
        $this->formValidate($request)->validate();

        $category = (object)[
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ];

        return redirect()
            ->action('App\Http\Controllers\CategoryController@index')
            ->with('msg', 'New plugin has been inserted');
    }

    private function formValidate($request)
    {
        return Validator::make(
            $request->all(),
            [
                'plugin_name' => ['required'],
                'plugin_icon' =>['required']
            ],
            [
                //change validation message
//                'plugin_name.starts_with' => 'Plugin must start with letter a'
            ]
        );
    }
}
