@extends('master.master')

@section('title','Message')

@section('content')
	<div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-folder icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Tin nhắn
                    </div>
                </div>    
            </div>
        </div>            
        
        <div class="row">
            <div class="col-md-12">
                <div class="main-card col-md-12 card">
                    <div class="card-header">Danh sách tin nhắn</div>
                    <div class="card-body">
                        <h5 class="card-title">Tin nhắn</h5>
                        <div class="scroll-area-md">
                            <div class="scrollbar-container ps--active-y ps" >
                                <!--message view-->
                                
	                            @foreach($messageList as $message)
	                            	@if($message['from'] == session()->get('userId'))
	                            		<div style="float: left; width: 100%">
		                                    <p style="float: right;width: 70%; background-color:#DADDE1 ;text-align: right; border-radius: 5px; border: 1px solid black ; padding: 10px ; margin-bottom: 10px">{{$message['content']}}</p>
		                                    <small style="float: right;margin: 10px;">{{$message['date']}}</small>
		                                </div>
	                            	@endif
	                            	@if($message['from'] != session()->get('userId'))
	                            		<div style="float: left; width: 100%">
		                                    <p style="float: left;width: 70%;text-align: left; border-radius: 5px; border: 1px solid black ; padding: 10px ; margin-bottom: 10px; background-color: #1877F2; color: white">{{$message['content']}}</p>
		                                    <small style="float: left;margin: 10px;">{{$message['date']}}</small>
		                                </div>
	                            	@endif
	                            @endforeach

                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 300px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 125px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card col-md-12 card" style="padding-top: 20px ; padding-bottom: 20px">
                        <form action="sendMessage/{{$id}}" method="post">
                           	@csrf
                            <div class="position-relative row form-group">
                                <div class="col-md-12"><textarea name="content" id="exampleText" class="form-control"></textarea></div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-secondary" style="float: right;">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
        </div>
    </div>
@endSection