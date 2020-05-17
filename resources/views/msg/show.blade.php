@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/tachyons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@ {{$user->name}}</div>
                <div class="card-body">
                    @foreach ($msg as $msgItem)
                    <div class="form-group row">
                        <!-- <label class="col-md-4 col-form-label text-md-right" ></label> -->
                        @if ($msgItem->from == Auth::id())
                        <div class="w-50"></div>
                        <div class="w-40 btn btn-primary tr">{{$msgItem->content}}</div>
                        @else
                        <div class="w-40 ml4 btn btn-secondary tl">{{$msgItem->content}}</div>
                        <div class="w-50"></div>
                        @endif
                    </div>
                    @endforeach</div></div>
                    <form action="/chat/create" method="post">
                    @csrf
                        <input type="hidden" value="{{$user->id}}" name="email">
                        <input type="text" class="w-80 ml4" name="description">
                        <button class="btn w-15 btn-success" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection