<x-layouts.mini xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>
        Adit-Post
    </x-slot:title>



    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="display-4 mb-4 mb-md-0 text-secondary text-uppercase"> AAD Post-{{$post->id}}</h1>
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
                <form action="{{route("posts.update",['post'=>$post->id])}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col-sm-6 control-group">
                            <input type="text" class="form-control p-4" name="title" placeholder="Your Name"  value="{{ $post->title }}" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-sm-6 control-group">
                            <input type="file" name="photo" class="form-control p-4" id="file" placeholder="Photo"/>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control p-4" rows="3" name="short_content" placeholder="Message-text" >{{ $post->short_content }}</textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group p-2">
                        <textarea class="form-control p-4" rows="6" name="contents" placeholder="Message"  >{{ $post->contents }}</textarea>
                        <p class="help-block text-danger"></p>
                    </div>


                        <button class="btn btn-success py-3 px-5" type="submit" id="sendMessageButton">Saqlash</button>


                        <a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-danger py-3 px-5"  id="sendMessageButton">Bekorqilish</a>

                </form>
            </div>
        </div>
    </div>





</x-layouts.mini>
