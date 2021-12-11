<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use App\Services\ExerciseService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ExerciseController extends Controller
{
    protected $exerciseService;
    public function __construct(ExerciseService $exerciseService){
        $this->exerciseService = $exerciseService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = $this->exerciseService->getAll();

        return view('pages.exercises.index',compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('exercises/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->exerciseService->store($request->all());

            return redirect()->route('exercises.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('exercises.index');
        }
    }

    public function show(Exercise $exercise)
    {
        return view('pages.exercises.show',compact('exercise'));
    }

    public function edit($id ,Exercise $exercise)
    {
        $exercise = Exercise::find($id);
        return view('pages.exercises.edit', compact('exercise'));
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('exercises/editExercise/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->exerciseService->update($request->id, $request->all());

            return redirect()->route('exercises.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('exercises.index');
        }
    }


    public function destroy($id)
    {
        $item = Exercise::find($id);
        $item->delete();
        return redirect()->route('exercises.index')->with('message','Item delete successfully !');

    }
}
