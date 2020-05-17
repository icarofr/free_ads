@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/tachyons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search an ad</div>

                <div class="card-body">
                    <form method="POST" action="/ad/search" role="search">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">By title</label>

                            <div class="col-md-6">
                                <input value="" id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">By description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description"></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="minPrice" class="col-md-4 col-form-label text-md-right">Starting price (€)</label>

                            <div class="col-md-6">
                                <input id="minPrice" value="" type="number" class="form-control @error('minPrice') is-invalid @enderror" name="minPrice" autofocus>

                                @error('minPrice')
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="maxPrice" class="col-md-4 col-form-label text-md-right">Max price (€)</label>

                            <div class="col-md-6">
                                <input id="maxPrice" value="" type="number" class="form-control @error('maxPrice') is-invalid @enderror" name="maxPrice" autofocus>

                                @error('maxPrice')
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">Tags (CSV)</label>

                            <div class="col-md-6">
                                <input id="tags" value="" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" autofocus>

                                @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="orderBy" class="col-md-4 col-form-label text-md-right">Order by</label>

                            <div class="col-md-6">
                                <select id="orderBy" value="" type="text" class="form-control @error('orderBy') is-invalid @enderror" name="orderBy" autofocus>
                                    <option value="id">ID</option>
                                    <option value="title">Title</option>
                                    <option value="updated_at">Date</option>
                                    <option value="author">User</option>
                                </select>
                                <div style="float: right;" class="pa2">
                                    <label for="direction" class="pa2">Descending</label><input type="checkbox" name="direction" id="direction">
                                </div>
                                @error('orderBy')
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection