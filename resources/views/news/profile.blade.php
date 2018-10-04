@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="profiles col-md-8 mx-auto mt-3">
                @foreach($profiles as $profile)
                    <div class="profile">
                        <div class="row">
                            <div class="text col-md-12">
                                <div class="date">
                                    {{ $profile->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    名前: {{ $profile->name }}
                                </div>
                                <div class="gender">
                                    性別: {{ $profile->gender }}
                                </div>
                                <div class="hobby">
                                    趣味: {{ $profile->hobby }}
                                </div>
                                <div class="introduction">
                                    自己紹介: {{ str_limit($profile->introduction, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
