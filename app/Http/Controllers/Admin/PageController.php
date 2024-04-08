<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PageDataTable;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Podcast\PodcastVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class PageController extends Controller
{    
    /**
     * Method index
     *
     * @return void
     */
    public function index(PageDataTable $dataTable)
    {
        // if (Auth::user()->can('manage-pages')) {
            return $dataTable->render('pages.index');
        // } else {
        //     return redirect()->back()->with('error', 'Permission denied.');
        // }
    }
    
    /**
     * Method create
     *
     * @return void
     */
    public function create()
    {
        return view('pages.create');
    }

        
    /**
     * Method store
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function store(Request $request)
    {
            $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required'
        ]);
      
        Page::create(
            [
                'title'     => $request['title'],
                'slug'      => $request['slug'],
                'content'   => $request['content']
            ]
        );

        return redirect()->route('pages.index')
            ->with('success', __('Page created successfully'));
    }

    public function show(Page $page)
    {
        return view ('pages.show', compact('page'));
    } 

    // // //testimonial video edit
      public function edit($id)
    {
        $page = Page::where('id', $id)->first();
        return view('pages.edit', compact('page'));

    }
     public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $input = $request->all();
        $page->fill($input)->save();
        return redirect()->route('pages.index')
             ->with('success', __('page updated successfully'));
    }
    public function destroy($id)
    {
            $page = Page::find($id);
            $page->delete();
            return redirect()->route('pages.index')->with('success', __('page delete successfully.'));
    }
}
