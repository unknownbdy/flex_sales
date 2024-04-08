<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FaqsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Faqs\Faqs;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index(FaqsDataTable $dataTable)
    {
        return $dataTable->render('Faqs.index');
    }

    public function create()
    {
        return view('Faqs.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required',
            'title_arabic' => 'required',
            'description' => 'required',
            'description_arabic' => 'required'
        ]);

        $faqs = Faqs::create([
            'title' => $request->input('title'),
            'title_arabic' => $request->input('title_arabic'),
            'description' => $request->input('description'),
            'description_arabic' => $request->input('description_arabic'),
    ]);

        return redirect()->route('faqs.index')
            ->with('message', __('FAQs Added successfully.'));
    }

    public function show($id)
    {
        // Find the preference by its ID
        $faqs = Faqs::findOrFail($id);

        // You can perform additional logic here, such as fetching related data

        return view('Faqs.show', compact('faqs'));
    }

    public function edit($id)
    {
        // Find the preference by its ID
        $faqs = Faqs::findOrFail($id);

        return view('Faqs.edit', compact('faqs'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'title' => 'required',
                'title_arabic' => 'required',
                'description' => 'required',
                'description_arabic' => 'required',
            ]);

            // Find the FAQ by its ID
            $faq = Faqs::findOrFail($id);

            // Update the FAQ with the validated data
            $faq->update($validatedData);

            return redirect()->route('faqs.index')
                ->with('success', __('FAQs updated successfully.'));
        } catch (\Exception $e) {
            // Handle any exceptions, e.g., if the FAQ with the given ID is not found
            return redirect()->back()
                ->with('error', __('An error occurred while updating FAQs. Please try again.'));
        }
    }


    public function destroy($id)
    {
        // Find the preference by its ID
        $preference = Faqs::findOrFail($id);

        // Perform any additional logic or checks before deleting

        $preference->delete();

        return redirect()->route('faqs.index')
            ->with('message', __('FAQs Deleted successfully.'));
    }
}
