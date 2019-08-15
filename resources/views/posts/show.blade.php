@extends('layouts.app')

@section('content')
<div class="container pr-5 pl-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row m-0">
                        <div class="col-md-8 p-0">
                            <img src="/storage/{{ $post->image }}" class="w-100" style="border-right: 1px solid #cccccc57;"/>
                        </div>
                        <div class="col-md-4 p-0">
                            <div class="card-header pt-3 pb-3"
                            style="
                                background: #fff;
                            ">
                                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle" style="width:30px"/>                                      
                                <strong class="justify-content-between align-items-baseline pl-2">
                                    <a href="/profile/{{ $post->user->id }}">
                                        {{ $post->user->username }}
                                    </a> 
                                    <a href="" style="
                                        float: right;
                                        vertical-align: middle;
                                        border: 1px solid #eee;
                                        padding: 2px 10px;
                                    ">Follow</a>
                                </strong>
                            </div>
                            <p class="p-3"><strong><a href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a></strong> {{ $post->caption }}</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection