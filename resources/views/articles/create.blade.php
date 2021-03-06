@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
            <form action="{{route('article.store')}}" method="POST">
                @csrf
                <div class="filed">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        {{--<input type="text" class="input {{$errors->has('title') ? 'is-danger' : ''}}" name="title" id="title">--}}
                        {{-- it's the same--}}
                        <input
                                type="text"
                               class="input @error('title') is-danger @enderror"
                               name="title"
                               id="title"
                                value="{{ old('title') }}"
                        >

                        {{--@if($errors->has('title'))
                            <p class="help is-danger">{{$errors->first('title')}}</p>
                        @endif--}}

                        @error('title')
                            <p class="help is-danger">{{$errors->first('title')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>
                    <div class="control">
                        <textarea
                            class="textarea @error('excerpt') is-danger @enderror"
                            name="excerpt"
                            id="excerpt"
                        >{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">Body</label>
                    <div class="control">
                        <textarea
                            class="textarea @error('body') is-danger @enderror"
                            name="body"
                            id="body"
                        >{{ old('body') }}</textarea>
                        @error('body')
                            <p class="help is-danger">{{$errors->first('body')}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="tags" class="label">Tags</label>
                    <div class="control select is-multiple">
                        <select name="tags[]" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>

                        @error('tags')
                            <p class="help is-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-link">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
