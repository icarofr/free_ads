@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View user #{{$user->id}}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right">ID:</label>

                        <div class="col-md-6">
                            {{$user->email}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right">Name:</label>

                        <div class="col-md-6">
                            {{$user->name}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right">E-mail:</label>

                        <div class="col-md-6">
                            {{$user->email}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right">E-mail verified at:</label>

                        <div class="col-md-6">
                            {{$user->email_verified_at}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right">Created at:</label>

                        <div class="col-md-6">
                            {{$user->created_at}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 text-md-right">Updated at:</label>

                        <div class="col-md-6">
                            {{$user->updated_at}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection