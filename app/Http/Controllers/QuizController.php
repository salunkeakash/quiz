<?php

namespace App\Http\Controllers;

use App\User;
use App\Quiz;
use App\Questions;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sector_id =  session()->get('sector');
        // print_r($sector_id);die;
        $data = Questions::where('sector_id',$sector_id)->get();
        return view('quize',['title' => 'Fill Your Details','questions'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile_no' => 'required|min:10',
            'checkbox_terms' => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 201);
        }

        $user = User::where('email' ,$request->email)->orWhere('mobile_no',  $request->mobile_no)
        ->get();


        if(count($user) == 0)
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile_no = $request->mobile_no;
            $user->terms = $request->checkbox_terms? 1 : 0;
            $user->wp_updates = $request->checkbox_update? 1 : 0;
            $user->save();
            session()->put('user', $user->id);

            $quiz = new Quiz();
            $quiz->user_id = $user->id;
            $quiz->workflow  = session()->get('gameflow');
            $quiz->sector_id = session()->get('sector');
            $quiz->correct = 0;
            $quiz->wrong = 0;
            $quiz->voucher = 0;
            $quiz->save();

            session()->put('quiz', $quiz->id);

            return response()->json(['status' => 200, 'msg' => 'created']);


        }else
        {
            session()->put('user', $user[0]->id);
            $quiz = new Quiz();
            $quiz->user_id = $user[0]->id;
            $quiz->workflow  = session()->get('gameflow');
            $quiz->sector_id = session()->get('sector');
            $quiz->correct = 0;
            $quiz->wrong = 0;
            $quiz->voucher = 0;
            $quiz->save();

            session()->put('quiz', $quiz->id);

            return response()->json(['status' => 200, 'msg' => 'created']);
        }



        $quiz = new Quiz();
        $quiz->user_id = $user->id;
        $quiz->workflow  = session()->get('gameflow');
        $quiz->sector_id = session()->get('sector');
        $quiz->correct = 0;
        $quiz->wrong = 0;
        $quiz->voucher = 0;
        $quiz->save();

        session()->put('quiz', $quiz->id);

        return response()->json(['status' => 200, 'msg' => 'created']);

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
    }

    public function show()
    {
        //
        $sector_id =  session()->get('sector');
        $workflow_id =  session()->get('gameflow');
        $user_id =  session()->get('user');
        $quiz_id =  session()->get('quiz');

        $user = User::where('id',$user_id)->get();
        $quiz = Quiz::select('quizzes.*','v.prize','v.voucher_code','v.msg')
        ->join('vouchers as v', 'v.id', '=', 'quizzes.voucher')->where('quizzes.user_id',$user_id)->where('quizzes.id',$quiz_id)->get();
        session()->flush();

        return view('result',['title' => 'Fill Your Details','user'=>$user,'quiz'=>$quiz]);

    }

    public function edit(Quiz $quiz)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'score' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 201);
        }

        $sector_id =  session()->get('sector');
        $workflow_id =  session()->get('gameflow');
        $user_id =  session()->get('user');
        $quiz_id =  session()->get('quiz');

        $voucher = Voucher::where('min_score', '<=', $request->score)
        ->where('max_score', '>=', $request->score)
        ->get();

       Quiz::where('user_id',$user_id)->where('id',$quiz_id)->update([
            'correct' => $request->score,
            'wrong' => 10 - intval($request->score ),
            'voucher' => $voucher[0]->id,
        ]);

        return response()->json(['status' => 200, 'msg' => 'submitted']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
