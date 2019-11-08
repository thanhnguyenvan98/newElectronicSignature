<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\teacher;
use App\dean;
use App\leader;
use App\Events\MessageEvent;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $teachers = teacher::where('user_id','!=',session()->get('userId'))->get();
            $deans = dean::all();
            $leaders = leader::all();
            return view('message',compact('teachers','deans','leaders'));
        }
    }

    public function sendMessage(Request $request,$id) {
        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $message = new Message;
            $message->message_fromUserId = session()->get('userId');
            $message->message_toUserId = $id;
            $message->message_content = $request->content;
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $message->message_createdDate = date('Y-d-m H:i:s');
            $message->save();
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        if (Session()->has('login') && Session()->get('login') == false) {
        # code...
        return redirect()->route('loginView');
        }
        else if (!Session()->has('login')) {
            return redirect()->route('loginView');
        }
        else {
            $messagesFromMe = Message::where('message_fromUserId',session()->get('userId'))->where('message_toUserId',$id)->get();
            $messagesToMe = Message::where('message_fromUserId',$id)->where('message_toUserId',session()->get('userId'))->get();
            $messageList = [];
            $i = 0 ;
            foreach ($messagesFromMe as $messageFromMe) {
               $messageList[$i] = ['from'=>$messageFromMe->message_fromUserId , 'to'=>$messageFromMe->message_toUserId, 'content' =>$messageFromMe->message_content, 'date'=>$messageFromMe->message_createdDate];
               $i++;
            }
            foreach ($messagesToMe as $messageToMe) {
               $messageList[$i] = ['from'=>$messageToMe->message_fromUserId , 'to'=>$messageToMe->message_toUserId, 'content' =>$messageToMe->message_content, 'date'=>$messageToMe->message_createdDate];
               $i++;
            }
            for($i = 0 ; $i < count($messageList) ; $i++){
                
                for ($j= $i+1; $j < count($messageList) ; $j++) { 
                    $timeDate1 = date('Ydm',strtotime($messageList[$i]['date']));
                    $timeDate2 = date('Ydm',strtotime($messageList[$j]['date']));

                    $time1 = date('His',strtotime($messageList[$i]['date']));
                    $time2 = date('His',strtotime($messageList[$j]['date']));

                    if($timeDate1 > $timeDate2){
                        $tg = $messageList[$i];
                        $messageList[$i] = $messageList[$j];
                        $messageList[$j] = $tg;
                    }
                    if($timeDate1 == $timeDate2){
                        if ($time1 > $time2) {
                            $tg = $messageList[$i];
                        $messageList[$i] = $messageList[$j];
                        $messageList[$j] = $tg;
                        }
                    }
                }
                
            }
            //redirect()->route('messageInfor',['messageList' => $messageList, 'id'=>$id]) 
            return view('messageInfor',compact('messageList','id'));    
        }
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
    }
}
