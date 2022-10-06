<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('home',compact('todos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_todo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=> 'required|string|max:255',
            'description'=> 'nullable|string',
            'completed'=> 'nullable'
        ]);

        $todo = new Todo;
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');

        if ($request->has('completed')){
            $todo->completed = 1;
        }

        $todo->user_id = Auth::user()->id;

        $todo->save();

        return back()->with('success', 'Item Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $todo = Todo::where('id', $id)->where('user_id',Auth::user()->id)->first();
        if(!$todo){
            abort(404);
        }
        return view('delete_todo', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $todo = Todo::where('id', $id)->where('user_id',Auth::user()->id)->first();
        if(!$todo){
            abort(404);
        }
        return view('edit_todo', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'title'=> 'required|string|max:255',
            'description'=> 'nullable|string',
            'completed'=> 'nullable'
        ]);

        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');

        if ($request->has('completed')){
            $todo->completed = 1;
        }
        else{
            $todo->completed = 0;
        }

        $todo->user_id = Auth::user()->id;

        $todo->save();

        return back()->with('success', 'Item Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todo.index')->with('success2', 'Item deleted successfully');
    }
}
