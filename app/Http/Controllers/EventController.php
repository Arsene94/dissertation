<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\events;
use App\polls;
use App\survey;
use App\answer;
use App\correctanswer;

use Redirect;
use Validator;
use Auth;

class EventController extends Controller
{
    public function index() {
        return view('home');
    }

    protected $eveID; 
    public function eventHome($id)
    {
        $eveID = $id;
        $surv = survey::getsurveysbyuser($eveID);
        $evDet = events::geteventbyid($id, Auth::id());
        $data = [
            'eventID' => $id,
            'eventName' => $evDet->eventName,
            'survData' => $surv
        ];
        return view('events.polls')->with($data);
    }

    public function fetch_events($id)
    {
        $pols['data'] = events::geteventsbyuser($id);
        echo json_encode($pols);
    }

    public function fetch_polls($id)
    {
        $pols['data'] = polls::getpollsbyuser($id);
        if(count($pols) != 0)
        echo json_encode($pols);
        else echo "Error";
    }

    public function startPoll($eventID, $pollID) {
        $poll['data'] = polls::startPoll($pollID, Auth::id());
        echo '<div class="alert alert-success">Data updated</div>';
        return redirect()->route('poll.home', $eventID);
    }

    public function liveAnswers($pollID, $evID) {
        $pols['data'] = polls::updateLiveAnswers($pollID);
        echo '<div class="alert alert-success">Data updated</div>';
        return redirect()->route('poll.home', $evID);
    }

    public function getDeleteEvent($id) {
        $event = events::find($id);

        $event->delete();

        return redirect()->route('event.index')->with('success', 'The event with ID '.$id.' has been deleted successfully');
    }

    public function getDeletePoll($evID, $pollID) {
        $poll = polls::find($pollID);

        $poll->delete();

        return redirect()->route('poll.home', $evID)->with('success', 'The poll has been deleted successfully');
    }

    public function pollCreate(Request $request, $id, $polltype) {
        if($polltype == 1) {
            $messages = [
                'MCquestion.required' => "The 'Question' field is required."
            ];
            $validator = Validator::make($request->all(), [
                'MCquestion' => 'required'
            ], $messages);

            $data = $request->all();
            $number = count($request->input('answer'));
            $numberca = count($request->input('correct-answer'));
            /*for($i=0; $i<$number; $i++)
            {
                if(trim($request->input('answer')[$i] != ''))
                {

                }
            }*/
            $poll = new polls([
                'eventID' => $id,
                'user_id' => Auth::id(),
                'pollType' => $polltype,
                'pollQuestion' => $request->input('MCquestion'),
            ]);
            $poll->save();
            

            for($i=0; $i<$number; $i++)
            {
                if(trim($request->input('answer')[$i] != ''))
                {
                    $answer = new answer([
                        'pollID' => $poll->id,
                        'answer' => $request->input('answer')[$i],
                    ]);
                    $answer->save();
                }
            }
            
            $ans = DB::table('answers')->select('id', 'answer', 'pollID')->where('pollID', '=', $poll->id)->get();


            for($i=0; $i<$numberca; $i++)
            {
                foreach($ans as $answ)
                {
                    if($answ->answer == $request->input('correct-answer')[$i])
                    {
                        if(trim($request->input('correct-answer')[$i] != ''))
                        {
                            $correctanswer = new correctanswer([
                                'answerID' => $answ->id,
                                'pollID' => $poll->id,
                                'correctanswer' => $request->input('correct-answer')[$i],
                            ]);
                            $correctanswer->save();
                        }
                    }
                }
            }
        } elseif($polltype == 2)
        {
            $messages = [
                'Tquestion.required' => "The 'Question' field is required."
            ];
            $validator = Validator::make($request->all(), [
                'Tquestion' => 'required'
            ], $messages);

            $poll = new polls([
                'eventID' => $id,
                'user_id' => Auth::id(),
                'pollType' => $polltype,
                'pollQuestion' => $request->input('Tquestion'),
            ]);
            $poll->save();
        } elseif($polltype == 3)
        {
            $messages = [
                'WCquestion.required' => "The 'Question' field is required."
            ];

            $validator = Validator::make($request->all(), [
                'WCquestion' => 'required'
            ]);

            $poll = new polls([
                'eventID' => $id,
                'user_id' => Auth::id(),
                'pollType' => $polltype,
                'pollQuestion' => $request->input('WCquestion'),
            ]);
            $poll->save();
        } elseif($polltype == 4) {
            $messages = [
                'Rquestion.required' => "The 'Question' field is required.",
                'ratingType.required' => 'You should select a type of rating.'
            ];

            $validator = Validator::make($request->all(), [
                'Rquestion' => 'required',
                'ratingType' => 'ratingType'
            ], $messages);

            if($request->ratingType == 1 || $request->ratingType == 2)
            {
                $poll = new polls([
                    'eventID' => $id,
                    'user_id' => Auth::id(),
                    'pollType' => $polltype,
                    'ratingType' => $request->ratingTypeadd,
                    'pollQuestion' => $request->input('Rquestion'),
                ]);
                $poll->save();
            } else echo "Error";
        } elseif($polltype == 5)
        {
            if(empty($request->input('survname')))
            {
                $messages = [
                    'Squestion.required' => "The 'Question' field is required."
                ];

                $validator = Validator::make($request->all(), [
                    'Squestion' => 'required'
                ]);

                    $survey = new polls([
                        'eventID' => $id,
                        'user_id' => Auth::id(),
                        'pollType' => $polltype,
                        'pollQuestion' => $request->input('Squestion'),
                    ]);

                    $survey->save();
            }
        } else {
            $message = "Poll type not found!";
        }
        
        if ($validator->fails())
        {
            $message = $validator->errors();
        } else $message = "Succes!";
            return response()->json(['success'=> $message]);
    }

    public function surveyCreate(Request $request, $eventID, $pollID, $surveyType) {
        if($surveyType == 1)
        {
            $messages = [
                'MCquestions.required' => "The 'Question' field is required."
            ];
            $validator = Validator::make($request->all(), [
                'MCquestions' => 'required',
                'correct-answer' => 'required'
            ], $messages);

            $data = $request->all();
            $number = count($request->input('answer'));
            $numberca = count($request->input('correct-answer'));
            /*for($i=0; $i<$number; $i++)
            {
                if(trim($request->input('answer')[$i] != ''))
                {

                }
            }*/
            $survey = new survey([
                'pollID' => $pollID,
                'pollQuestion' => $request->input('MCquestions'),
                'pollType' => $surveyType,
            ]);
            $survey->save();

            for($i=0; $i<$number; $i++)
            {
                if(trim($request->input('answer')[$i] != ''))
                {
                    $answer = new answer([
                        'pollID' => $pollID,
                        'surveyID' => $survey->id,
                        'answer' => $request->input('answer')[$i],
                    ]);
                    $answer->save();
                }
            }
            
            $ans = DB::table('answers')->select('id', 'answer', 'pollID', 'surveyID')->where('pollID', '=', $survey->id)->get();

            for($i=0; $i<$numberca; $i++)
            {
                foreach($ans as $answ)
                {
                    if($answ->answer == $request->input('correct-answer')[$i])
                    {
                        if(trim($request->input('correct-answer')[$i] != ''))
                        {
                            $correctanswer = new correctanswer([
                                'answerID' => $answ->id,
                                'pollID' => $pollID,
                                'surveyID' => $survey->id,
                                'correctanswer' => $request->input('correct-answer')[$i],
                            ]);
                            $correctanswer->save();
                        }
                    }
                }
            }
        } elseif($surveyType == 2) {
            $messages = [
                'Tquestions.required' => "The 'Question' field is required."
            ];
            $validator = Validator::make($request->all(), [
                'Tquestions' => 'required'
            ], $messages);

            $survey = new survey([
                'pollID' => $pollID,
                'pollQuestion' => $request->input('Tquestions'),
                'pollType' => $surveyType,
            ]);
            $survey->save();
        } elseif($surveyType == 3) {
            $messages = [
                'WCquestions.required' => "The 'Question' field is required."
            ];
            $validator = Validator::make($request->all(), [
                'WCquestions' => 'required'
            ], $messages);

            $survey = new survey([
                'pollID' => $pollID,
                'pollQuestion' => $request->input('WCquestions'),
                'pollType' => $surveyType,
            ]);
            $survey->save();
        } elseif($surveyType == 4) {
            $messages = [
                'Rquestions.required' => "The 'Question' field is required.",
                'ratingTypeadd.required' => 'You should select a type of rating.'
            ];
            $validator = Validator::make($request->all(), [
                'Rquestions' => 'required',
                'ratingTypeadd' => 'required'
                
            ], $messages);

            if($request->ratingTypeadd == 1 || $request->ratingTypeadd == 2)
            {
                $survey = new survey([
                    'pollID' => $pollID,
                    'pollQuestion' => $request->input('Rquestions'),
                    'pollType' => $surveyType,
                    'ratingType' => $request->ratingTypeadd,
                ]);
                $survey->save();
            }
        }

        if ($validator->fails())
        {
            $message = $validator->errors();
        } else $message = "Succes!";
            return response()->json(['success'=> $message]);
    }
}