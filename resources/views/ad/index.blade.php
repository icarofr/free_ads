@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($ad as $adItem)
            <div class="card">
                <div class="card-header">{{$adItem->title}}</div>

                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-md-4 text-md-right">Author ID:</label>

                        <div class="col-md-6">
                            {{$adItem->author}}
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-4 text-md-right">Description:</label>

                        <div class="col-md-6">
                            {{$adItem->description}}
                        </div>
                    </div>

                    <div class="form-group row">
                        @foreach (["photo", "photo2", "photo3", "photo4"] as $key => $photo)
                        <label for="photo" class="col-md-4 text-md-right">{{$key == 0 ? "View:" : ""}}</label>
                        @if (!is_null($adItem->$photo))
                        <div class="col-md-6">
                            <img class="img-fluid img-thumbnail" src="{{asset('/storage/ads/' . $adItem->$photo)}}" alt="Ad #{{$adItem->id}}">
                        </div>
                        @endif
                        @endforeach
                        
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 text-md-right">Price:</label>

                        <div class="col-md-6">
                            {{$adItem->price}}€
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="createdAt" class="col-md-4 text-md-right">Created at:</label>

                        <div class="col-md-6">{{$adItem->created_at}}</div>
                    </div>

                    <div class="form-group row">
                        <label for="updatedAt" class="col-md-4 text-md-right">Updated at:</label>

                        <div class="col-md-6">{{$adItem->updated_at}}</div>
                    </div>

                    <div class="form-group row">
                        <label for="tags" class="col-md-4 text-md-right">Tags:</label>

                        <div class="col-md-6">
                            <?php
                            $tags = explode(",", $adItem->tags);
                            $tags = implode("<br>", $tags);
                            echo $tags;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection