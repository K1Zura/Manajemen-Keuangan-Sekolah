<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if ($request->ajax()) {
                $data = faq::latest()->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                       $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editFaq"><i class="mdi mdi-table-edit"></i></a>';
                       $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteFaq"><i class="mdi mdi-delete"></i></a>';
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
                }
            }
        return view('/faq');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        faq::updateOrCreate([
            'id' => $request->faq_id,
        ],
        [
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);
        return response()->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = faq::findOrFail($id);
        return response()->json($faq);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = faq::findOrFail($id)->delete();
        return response()->json();
    }
}
