<x-layouts.mini xmlns:x-slot="http://www.w3.org/1999/xlink">

    <x-slot:title>
        NotifiCation
    </x-slot:title>

    <!-- Page Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5">
            <div class="row align-items-center py-4">
                <div class="col-md-6 text-center text-md-left">
                    <h1 class="display-4 mb-4 mb-md-0 text-secondary text-uppercase">NotifiCation</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Latest Blog</h6>

                </div>

            </div>


                @foreach($notifications as $notification)
                    <div class="border mb-5 p-4 rounded">
                        <div class="position-relative mb-4">
                            @if($notification->read_at == null)
                                <div class="blog-date">
                                    <h4 class="font-weight-bold mb-n1">new</h4>
                                    {{--                            <small class="text-white text-uppercase">Jan</small>--}}
                                </div>
                            @endif

                        </div>
                        <div class="d-flex mb-2">
                            <a class="text-secondary text-uppercase font-weight-medium" href="">Admin</a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-secondary text-uppercase font-weight-medium" href="">Cleaning</a>
                        </div>
                        <div class="d-flex mb-2">
                            <h3 class="text-white bg-danger py-1 px-1 text-center rounded">{{$notification->data['created_at']}}</h3>
                        </div>

                        <h5 class="font-weight-medium mb-2">{{$notification->data ['title']}}</h5>
                        <p class="mb-4">{{$notification->data['id']}}</p>
                        @if($notification->read_at == null)
                        <a class="btn btn-sm btn-primary py-2" href="{{route('notification.read',['notification'=>$notification->id])}}">Read</a>
                        @endif
                        
{{--                        <div class="">--}}
{{--                            <a href="{{route('notification.delete',['notification'=>$notification->id])}}">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="50px" stroke="currentColor" class="size-6">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />--}}
{{--                            </svg>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        
                    </div>
                @endforeach



                <div class="col-12">
                    <nav aria-label="Page navigation">
                        {{$notifications->links()}}
                    </nav>
                </div>

        </div>
    </div>
    <!-- Blog End -->






</x-layouts.mini>
