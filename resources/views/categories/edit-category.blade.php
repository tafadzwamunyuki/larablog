@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection

@section('main')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">Edit Category!</h1>
            @include('includes.flash-message')

            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{route('categories.update', $category)}}" method="post">
                    @method('put')
                    @csrf
                    <!-- Name -->
                    @error('name')
                    <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                    <label for="name"><span>Name</span></label>
                    <input type="text" id="name" name="name" value="{{ $category->name }}" />

                    <!-- Button -->
                    <input type="submit" value="submit" />
                </form>
            </div>
            <div class="create-categories">
                <a href="{{route('categories.index')}}">Categories List<span>&#8594;</span></a>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
<script>
    CKEDITOR.replace('body');
</script>
@endsection
