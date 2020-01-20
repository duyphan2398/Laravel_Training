<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all()->sortBy('id',1,true);
        return view('subject.subject',compact('subjects'));
    }

    public function  remove(Subject $subject){
        if ($subject->delete()) {
            return redirect()->back()->with("alert", "Deleted");
        }
        return redirect()->back()->with("alert", "Can not Delete");
    }

    public function create(){
        return view('subject.create');
    }

    public function store(){
        $subject = new Subject();
        $subject->name = request()->name;
        $subject->credit = request()->credit;
        if ($subject->save()) {
            return redirect('/subjects')->with('alert', 'Created');
        }
        return redirect('/subjects')->with('alert', 'Can not Create');
    }

    public function edit(Subject $subject){
        return view('subject.edit',compact('subject'));
    }

    public function update(Subject $subject){
        $subject->name = \request()->name;
        $subject->credit = \request()->credit;
        if ($subject->save()) {
            return redirect('/subjects')->with('alert', 'Updated');
        }
        return redirect('/subjects')->with('alert', 'Can Not Update');

    }
    public function search(Request $request) {
        $subject = Subject::find($request->searchString);
        if ($subject) {
            return response()->json($subject);
        }
        return response()->json([
            'error'    => true,
        ], 422);
    }


}
// Middle Where Cho URL
//

