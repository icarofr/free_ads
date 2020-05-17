@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/tachyons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inbox ({{$unreadCount}} unread)</div>

                <div class="card-body">
                    <?php $currentUser = ""?>
                    @foreach ($msg as $msgItem)
                    @if ($currentUser == $msgItem->name)
                    @else
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">@ {{$msgItem->name}}</label>

                        <div class="col-md-6">
                            <div class="form-control @if ($msgItem->read == false) ba b--red bg-washed-red @endif">{{$msgItem->content}}</div>
                            <div style="float: left;">{{$msgItem->created_at}}</div><a href="/user/{{$msgItem->id}}/chat" class="btn btn-primary" style="float: right;">Reply</a>

                        </div>
                    </div>
                    <?php $currentUser = $msgItem->name; ?>
                    @endif
                    @endforeach
                    <a href="/chat/create" class="btn btn-success">New message</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection