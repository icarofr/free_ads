@extends('layouts.app')

@section('content')
<script src="/js/jquery.js"></script>
<link rel="stylesheet" href="/css/tachyons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create an ad</div>

                <div class="card-body">
                    <form method="POST" action="/ad" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Ad title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="email" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" required></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">
                                <div class="pointer f6 grow no-underline br-pill ph3 mb2 dib white bg-green" onclick="showNext()">+</div>
                            </div>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" autofocus>

                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row dn photo2">
                            <div class="col-md-4 col-form-label text-md-right">
                                <div class="pointer f6 grow no-underline br-pill ph3 mb2 dib white bg-red" onclick="removeNext()">-</div>
                            </div>

                            <div class="col-md-6">
                                <input id="photo2" type="file" class="form-control @error('photo2') is-invalid @enderror" name="photo2" autofocus>

                                @error('photo2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group photo3 row dn">
                            <div class="col-md-4 col-form-label text-md-right">
                                <div class="pointer f6 grow no-underline br-pill ph3 mb2 dib white bg-red" onclick="removeNext()">-</div>
                            </div>

                            <div class="col-md-6">
                                <input id="photo3" type="file" class="form-control @error('photo3') is-invalid @enderror" name="photo3" autofocus>

                                @error('photo3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row photo4 dn">
                            <div class="col-md-4 col-form-label text-md-right">
                                <div class="pointer f6 grow no-underline br-pill ph3 mb2 dib white bg-red" onclick="removeNext()">-</div>
                            </div>

                            <div class="col-md-6">
                                <input id="photo4" type="file" class="form-control @error('photo4') is-invalid @enderror" name="photo4" autofocus>

                                @error('photo4')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price (€)</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="email" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">Tags (CSV)</label>

                            <div class="col-md-6">
                                <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" required autocomplete="email" autofocus>

                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let counter = 1;

    function showNext() {
        counter++;
        $(".photo" + counter).removeClass("dn");
    }

    function removeNext() {
        $(".photo" + counter).addClass("dn");
        counter--;
    }
</script>
@endsection