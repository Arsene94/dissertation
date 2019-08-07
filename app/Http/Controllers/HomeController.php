<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\events;
use Auth;
use App\User;
use DB;
use App\teamEvents;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Auth::check())
            return view('home.welcome');
        else {
            function crypto_rand_secure($min, $max)
            {
                $range = $max - $min;
                if ($range < 1) return $min; // not so random...
                $log = ceil(log($range, 2));
                $bytes = (int) ($log / 8) + 1; // length in bytes
                $bits = (int) $log + 1; // length in bits
                $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
                do {
                    $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
                    $rnd = $rnd & $filter; // discard irrelevant bits
                } while ($rnd > $range);
                return $min + $rnd;
            }

            function getToken($length)
            {
                $token = "";
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $codeAlphabet.= "0123456789";
                $max = strlen($codeAlphabet); // edited

                for ($i=0; $i < $length; $i++) {
                    $token .= $codeAlphabet[crypto_rand_secure(1, $max-1)];
                }

                return $token;
            }
            $eve = DB::table('events')->where('user_id', '=', Auth::id())->get();

            $var = [
                'eventCodes' => getToken(rand(5,8)),
                'events' => $eve
            ];
            return view('home')->with($var);
        }
            
    }

    public function eventCreate(Request $request) {
        $this->validate($request, [
            'eventName' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'eventCode' => 'required', 'unique:users'
            ]);
             
            $data = $request->all();
            if(!$request->compTime && !$request->compPcts)
            {
                $compTime = "'competitionTime' => ".$request->compTime;
                $compPcts = "'competitionPoints' => ".$request->compPcts;
            } else {
                $compTime = "";
                $compPcts = "";
            }

            if (strtotime($request->endDate) < strtotime($request->startDate)) {
                echo 'The End date can\'t be less than Start date';
                exit;
            }

            $ev = new events([
                'eventName' => $request->input('eventName'),
                'user_id' => $request->input('createdBy'),
                'eventCode' => $request->input('eventCode'),
                $compTime,
                $compPcts,
            ]);

            
            $arr = array('msg' => 'Something goes to wrong. Please try again lator', 'status' => false);
            if($ev->save()){ 
                $arr = array('msg' => 'Event created!', 'status' => true);
            }
            return route('poll.home', ['id' => $ev->id]);
    }

    public function createTeams(Request $request) {
        $messages = [
            'evNa.required' => "Please select an event."
        ];
        $validator = Validator::make($request->all(), [
            'evNa' => 'required'
        ], $messages);

        $number = count($request->input('team'));

        for($i=0; $i<$number; $i++)
        {
            if(trim($request->input('team')[$i] != ''))
            {
                $teamEv = new teamEvents([
                    'eventID' => $request->input('evNa'),
                    'teamName' => $request->input('team')[$i],
                    'membersNumber' => $request->input('membersNumber'),
                ]);

                $teamEv->save();
            }
        }
        $set = DB::table('events')->where('id', $request->input('evNa'))->update(['teamEvent' =>  1]);
        if ($validator->fails())
        {
            $message = $validator->errors();
        } else $message = "Succes!";
            return response()->json(['success'=> $message]);
        
    }
}
