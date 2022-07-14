<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\BaseRepository;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $category = $this->categoryRepo->getAll();

        return view('category', ['category' => $category]);
    }

    public function show($id)
    {
        $category = $this->categoryRepo->find($id);

        return view('category', ['category' => $category]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $category = $this->categoryRepo->create($data);

        return view('category');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $category = $this->categoryRepo->update($id, $data);

        return view('home.category');
    }

    public function destroy($id)
    {
        $this->$categoryRepo->delete($id);

        return view('home.category');
    }
}
