@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$ad->title}}</div>

                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right">Author ID:</label>

                        <div class="col-md-6">
                            {{$ad->author}}
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 text-md-right">Description</label>

                        <div class="col-md-6">
                            {{$ad->description}}

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo" class="col-md-4 text-md-right">Picture</label>

                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" required autofocus>

                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 text-md-right">Price (€)</label>

                        <div class="col-md-6">
                            {{$ad->price}}€

                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tags" class="col-md-4 text-md-right">Tags (CSV)</label>

                        <div class="col-md-6">
                            <?php
                            $tags = explode(",", $ad->tags);
                            $tags = implode("<br>", $tags);
                            echo $tags;
                            ?>

                            @error('tags')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection