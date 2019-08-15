@extends('layouts.app')

@section('content')
<div class="container pr-5 pl-5">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle"
                style="border: 12px solid #ececec" />
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h2">{{$user->name}}</div>
                    @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit" class="btn btn-default ml-3" style="
                            border: 1px solid #d8d8d8;
                            ">Edit Profile</a>
                    @endcan
                    @if($user->id != auth()->user()->id)
                    <follow-button user-id={{ $user->id }} follows={{ $follows }}></follow-button>
                    @endif
                    
                </div>
                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postsCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div class="">{{$user->profile->description}}</div>
            <div class="font-weight-bold"><a href="#">{{$user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-12">
            <h4 style="
                padding: 10px 0;
                border-bottom: 1px solid #eaeaea;
                border-top: 1px solid #eaeaea;
                text-align: center;
            "><i class="fas fa-th fa-sm pr-1"></i>POSTS</h4>
        </div>
    </div>
    <div class="row pt-3">

        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100" style="border: 1px solid #cccccc57;" />
            </a>
        </div>
        @endforeach
        {{-- <div class="col-4">
            <img src="https://instagram.fnag1-1.fna.fbcdn.net/vp/3f6e1184e06f146597b33764c938c3b8/5DD72B3C/t51.2885-15/sh0.08/e35/c3.0.787.787a/s640x640/60093466_2143224382642428_6246545120850214485_n.jpg?_nc_ht=instagram.fnag1-1.fna.fbcdn.net" class="w-100" style="border: 1px solid #cccccc57;"/>
        </div>
        <div class="col-4">
            <img src="https://instagram.fnag1-1.fna.fbcdn.net/vp/4841bfe4a364a33c17a1524904b385da/5DEB8536/t51.2885-15/sh0.08/e35/s640x640/61055991_302323404023084_4787475462162000150_n.jpg?_nc_ht=instagram.fnag1-1.fna.fbcdn.net" class="w-100" style="border: 1px solid #cccccc57;"/>
        </div>
        <div class="col-4">
            <img src="https://instagram.fnag1-1.fna.fbcdn.net/vp/de60f08a1a2931c15248cc3e62837ecf/5DEE1E05/t51.2885-15/e35/c191.0.421.421a/59682784_418384682328682_958612373254021883_n.jpg?_nc_ht=instagram.fnag1-1.fna.fbcdn.net" class="w-100" style="border: 1px solid #cccccc57;"/>
        </div> --}}

    </div>
</div>
@endsection