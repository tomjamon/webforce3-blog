<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(8);

        return view('admin.pages.index', [
            'pages' => $pages
        ]);
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(PageRequest $request)
    {
        $data = $request->validated();
        $page = new Page;
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        $page->content = $data['content'];
        if (isset($data['draft'])) {
            $page->draft = true;
        } else {
            $page->draft = false;
        }
        if (isset($data['active'])) {
            $page->active = true;
        } else {
            $page->active = false;
        }
        $page->save();

        Session::flash('status', 'Page bien ajoutée');
        return redirect()->route('pages.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $page = Page::find($id);

        return view('admin.pages.edit', [
            'page' => $page
        ]);
    }

    public function update(PageRequest $request, $id)
    {
        $data = $request->validated();
        $page = Page::find($id);
        $page->title = $data['title'];
        $page->slug = $data['slug'];
        $page->content = $data['content'];
        if (isset($data['draft'])) {
            $page->draft = true;
        } else {
            $page->draft = false;
        }
        if (isset($data['active'])) {
            $page->active = true;
        } else {
            $page->active = false;
        }
        $page->save();
        Session::flash('status', 'Page bien modifié');

        return redirect()->route('pages.index');
    }

    public function destroy(Request $request, $id)
    {
        $page = Page::find($id);
        $page->delete();
        Session::flash('status', 'Page bien supprimé');

        return redirect()->route('pages.index');
    }
}
