<x-layouts.mini xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>
        Create Post
    </x-slot:title>

    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="display-4 mb-4 mb-md-0 text-secondary text-uppercase">  Create Post</h1>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="btn btn-sm btn-outline-light" href="">Home</a>
                        <i class="fas fa-angle-double-right text-light mx-2"></i>
                        <a class="btn btn-sm btn-outline-light disabled" href="">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-sm-6 control-group">
                        <input type="text" class="form-control p-4" name="title" placeholder="Your Name"  value="{{ old('title') }}" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group mb-4">
                        <select name="category_id" class="custom-select custom-select-lg " >
                            @foreach( $categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                                <p class="help-block text-danger"></p>
                        </select>

                    </div>

                    <div class="control-group mb-4">
                        <select name="tags[]" class="custom-select custom-select-lg " multiple >
                            @foreach( $tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                                <p class="help-block text-danger"></p>
                        </select>

                    </div>


                    <div class="col-sm-6 control-group">
                        <input type="file" name="photo" class="form-control p-4" id="file" placeholder="Photo"/>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <textarea class="form-control p-4" rows="3" name="short_content" placeholder="Message-text" >{{ old('short_content') }}</textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group p-2">
                    <textarea class="form-control p-4" rows="6" name="contents" placeholder="Message"  >{{ old('contents') }}</textarea>
                    <p class="help-block text-danger"></p>
                </div>

                <div>
                    <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="sendMessageButton">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
</div>





</x-layouts.mini>
