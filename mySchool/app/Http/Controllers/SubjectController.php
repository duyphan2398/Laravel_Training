<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Teacher;
use App\Transformers\SubjectTransformer;
use Illuminate\Http\Request;
class SubjectController extends Controller
{
    public function getSubjects(){

//        return  (new SubjectTransformer())->transform(Subject::all());
        return responder()->success(Subject::all(), new SubjectTransformer())->respond(201);
    }
    public function index(){
        $subjects = Subject::all()->sortBy('id',1,true);
        return view('subject.subject',compact('subjects'));
    }

    public function  apiIndex(){
        $subjects = Subject::all()->sortBy('id',1,true);
        return response()->json($subjects);
    }

    public function  remove(Subject $subject){
        if ($subject->delete()) {
            return redirect()->back()->with("alert", "Deleted");
        }
        return redirect()->back()->with("alert", "Can not Delete");
    }

    public function create(){
        $teachers = Teacher::all();
        return view('subject.create')->with('teachers', $teachers);
    }

    public function store(Request $request){
       
        $request->validate([
            'name' => 'bail|required',
            'credit' => 'required|integer'
        ]);

        $subject = new Subject();
        $subject->name = request()->name;
        $subject->credit = request()->credit;
        $subject->id_teacher = request()->id_teacher;
        if ($subject->save()) {
            return redirect()->route('index')->with('alert', 'Created');
        }
        return redirect()->route('index')->with('alert', 'Can not Create');
    }

    public function edit(Subject $subject){
        return view('subject.edit',compact('subject'));
    }

    public function update(Subject $subject){
        $subject->name = \request()->name;
        $subject->credit = \request()->credit;
        if ($subject->save()) {
            return redirect()->route('index')->with('alert', 'Updated');
        }
        return redirect()->route('index')->with('alert', 'Can Not Update');

    }
    public function search(Request $request) {
        $result ='';
        if ($request->searchInput == null){
            $subjects = Subject::all()->sortBy('id',1,true);
            foreach ($subjects as $subject) {
                $result .=
                    '<tr>
                    <td>'.$subject->id.'</td>
                    <td>'.$subject->name.'</td>
                    <td>'.$subject->id.'</td>
                    <td>'.$subject->credit.'</td>
                    <td>
                        <button type="button" class="btn btn-warning ">
                            <a href="subject/edit/'.$subject->id.'" class="text-decoration-none text-white"> Edit </a>
                        </button>
                        <button  type="button" class="btn btn-danger">
                            <a href="subject/remove/'.$subject->id.'" class="text-decoration-none text-white"> Delete </a>
                        </button>
                    </td>
                    <td></td>
                    <td></td>
                </tr> ';
            }
        }
        else {

            $subjects = Subject::find($request->searchInput);
            $result .=
                '<tr>
                    <td>'.$subjects->id.'</td>
                    <td>'.$subjects->name.'</td>
                    <td>'.$subjects->id.'</td>
                    <td>'.$subjects->credit.'</td>
                    <td>
                        <button type="button" class="btn btn-warning ">
                            <a href="subject/edit/'.$subjects->id.'" class="text-decoration-none text-white"> Edit </a>
                        </button>
                        <button  type="button" class="btn btn-danger">
                            <a href="subject/remove/'.$subjects->id.'" class="text-decoration-none text-white"> Delete </a>
                        </button>
                    </td>
                    <td></td>
                    <td></td>
                </tr> ';

        }


        if ($subjects) {
            return response()->json([
                'searchSubjects'=>$subjects,
                'searchOutput'=>$result,
                'searchInput'=>$request->searchInput
                ]);
        }
        else {
            return response()->json([
                'error'    => true,
            ], 422);
        }
    }


    public function detail($id){
        $subject = Subject::find($id);
        dd($subject);
    }
}
// Middle Where Cho URL
//

