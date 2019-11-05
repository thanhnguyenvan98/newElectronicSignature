<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

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
        return view('login');
        }
        else if (!Session()->has('login')) {
            return view('login');
        }
        else {
            $messagesFromMe = Message::where('message_fromUserId',session()->get('userId'))->get();
            $messagesToMe = Message::where('message_toUserId',session()->get('userId'))->get();
            $listMessage = [];
            $stt = 0;
            foreach ($messagesFromMe as $messageFromMe) {
                foreach ($messagesToMe as $messageToMe) {
                    if($messageFromMe->message_toUserId == $messageToMe->message_fromUserId){
                        $listMessage[$stt] = $messageFromMe->message_toUserId;
                        echo $messageFromMe->message_toUserId;
                        break;
                    }else{
                        $listMessage[$stt] = $messageToMe->message_fromUserId;
                        //echo $messageToMe->message_fromUserId;
                    }
                }
                $stt++;
            }
            var_dump($listMessage);
            exit(); 
            return view('message',compact('messagesFromMe','messagesFromMe'));
        }
    }

    public function sendMessage(Request $request) {
        
        echo $request->content;
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
        //
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
