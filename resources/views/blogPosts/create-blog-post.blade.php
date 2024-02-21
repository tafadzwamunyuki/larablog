@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection

@section('main')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">Create New Post!</h1>
            @include('includes.flash-message')

            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    @error('title')
                    <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                    <label for="title"><span>Title</span></label>
                    <input type="text" id="title" name="title" value="{{old('title')}}" />

                    <!-- Image -->
                    <label for="image"><span>Image</span></label>
                    <input type="file" id="image" name="image" />
                    @error('image')
                    <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror

                    <label for="categories"><span>Choose a Category</span></label>
                    <select name="category id" id="categories">
                        <option selected disabled>Select Option</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror

                    <!-- Body -->
                    <label for="body"><span>Body</span></label>
                    <textarea id="body" name="body">{{ old('body')}}</textarea>
                    @error('body')
                    <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror

                    <!-- Button -->
                    <input type="submit" value="submit" />
                </form>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
<script>
    CKEDITOR.replace('body');
</script>
@endsection
