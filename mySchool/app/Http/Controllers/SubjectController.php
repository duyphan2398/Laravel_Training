<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Teacher;
use App\Transformers\SubjectTransformer;
use Illuminate\Http\Request;
class SubjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkRole')->except('index');
    }
    public function getSubjects(){
        return responder()->success(Subject::all(), new SubjectTransformer())->respond();
    }
    public function index(){
        $subjects = Subject::orderBy('id','desc')->paginate(15);
        return view('subject.subject',compact('subjects'));
    }
    public function  destroy(Subject $subject){
        if ($subject->delete()) {
            $result = '';
            $subjects = Subject::orderBy('id','desc')->get();
            $count = 0;
            foreach ($subjects as $subject) {
                $result .=
                    '<tr>
                    <td>'.++$count.'</td>
                    <td>'.$subject->name.'</td>
                    <td>'.$subject->id.'</td>
                    <td>'.$subject->credit.'</td>
                    <td>
                        <button type="button" class="btn btn-warning ">
                            <a href="'.route('subjects.edit',$subject).'" class="text-decoration-none text-white"> Edit </a>
                        </button>
                        <button type="button" class="btn btn-danger " onclick="destroy_confirm(\''.route('subjects.destroy',$subject).'\')">
                        Delete
                        </button>
                    </td>
                    <td></td>
                    <td></td>
                </tr> ';
            }
            return response()->json([
                'response' => $result
            ]);
        }
        else {
            return response()->json([
                'msg'=>'Can not Delete',
            ],422);
        }
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

        if (Subject::create($request->all())) {
            return redirect()->route('subjects.index')->with('alert', 'Created');
        }
        return redirect()->back()->with('alert', 'Can not Create');
    }

    public function edit(Subject $subject){
        return view('subject.edit',compact('subject'));
    }

    public function update(Request $request, Subject $subject){
        if ($subject->update($request->all())) {
            $request->session()->flash('status', 'Updated !');
            return redirect('/subjects');;
        }
        $request->session()->flash('status', 'Con not update !');
        return redirect()->back();

    }
    public function search(Request $request) {
        $result ='';
        $count = 0;
        if ($request->searchInput == null){
            $subjects = Subject::orderBy('id','desc')->get();

            foreach ($subjects as $subject) {
                $result .=
                    '<tr>
                     <td>'.++$count.'</td>
                    <td>'.$subject->name.'</td>
                    <td>'.$subject->id.'</td>
                    <td>'.$subject->credit.'</td>
                    <td>
                        <button type="button" class="btn btn-warning ">
                            <a href="'.route('subjects.edit',$subject).'" class="text-decoration-none text-white"> Edit </a>
                        </button>
                        <button type="button" class="btn btn-danger " onclick="destroy_confirm(\''.route('subjects.destroy',$subject).'\')">
                        Delete
                        </button>
                    </td>
                    <td></td>
                    <td></td>
                </tr>';
            }
        }
        else {
            $subjects = Subject::find($request->searchInput);
            $result .=
                '<tr>
                    <td>'.++$count.'</td>
                    <td>'.$subjects->name.'</td>
                    <td>'.$subjects->id.'</td>
                    <td>'.$subjects->credit.'</td>
                    <td>
                         <button type="button" class="btn btn-warning ">
                            <a href="'.route('subjects.edit',$subjects).'" class="text-decoration-none text-white"> Edit </a>
                        </button>
                        <button type="button" class="btn btn-danger " onclick="destroy_confirm(\''.route('subjects.destroy',$subjects).'\')">
                        Delete
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
}


