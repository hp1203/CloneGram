@extends('layouts.app')

@section('content')
<div class="container pr-5 pl-5">
    @foreach($posts as $post)
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-0">

                    <img src="/storage/{{ $post->image }}" class="w-100"/>

                    <div class="card-header pt-3 pb-3" style="
                                    background: #fff;
                                ">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle"
                            style="width:30px" />
                        <strong class="justify-content-between align-items-baseline pl-2">
                            <a href="/profile/{{ $post->user->id }}">
                                {{ $post->user->username }}
                            </a>
                        </strong>
                    </div>
                    <p class="p-3"><strong><a
                                href="/profile/{{ $post->user->id }}">{{ $post->user->username }}</a></strong>
                        {{ $post->caption }}</p>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection