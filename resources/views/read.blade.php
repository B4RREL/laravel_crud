@extends("layouts.master");

@section("title")
<title>Customer List</title>
@endsection
@section("body")
        <!-- Header -->
        <header class="ex-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <h1>Customer List</h1>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </header> <!-- end of ex-header -->
        <!-- end of header -->

        <div class="text-center text-success">
            @if (session("createSuccess"))
                {{ session("createSuccess") }}
            @endif

            @if (session("updateSuccess"))
            {{ session("updateSuccess") }}
            @endif
        </div>
        <div class="text-center text-danger">
            @if (session("deleteSuccess"))
            {{ session("deleteSuccess") }}
        @endif
        </div>
        <!-- Basic -->
        <div class="ex-basic-1 pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1">
                        <h3> {{"Total list : " . $datas->total()}} </h3>
                        @foreach ($datas as $data)
                        <h2 class="mt-5 mb-3">{{ $data->id }} . {{ $data->name }} <a class="ms-1 btn btn-outline-dark" href="{{route('update#page',[$data->id])}}">update</a><a class=" ms-1 btn btn-outline-danger" href="{{route('delete',[$data->id])}}">delete</a></h2>
                        <p class="mb-1">
                        <ul>

                            <li><b>Email:</b>{{ $data->email }}</li>
                            <li><b>Phone:</b>{{ $data->phone }}</li>
                            <li><b>Address:</b>{{ $data->address }}</li>
                            <li><b>Created_at:</b>{{ $data->created_at->format("d-M-y") }}</li>
                            <li><b>Updated_at:</b>{{  $data->updated_at->format("d-M-y") }}</li>
                        </ul>
                         </p>
                        @endforeach

                        {{-- <h3>1.1. Aenean euismod elementum nisi quis rampis de</h3>
                        <p class="mb-5">Mauris a diam maecenas sed enim. Amet commodo nulla facilisi nullam vehicula ipsum a. Morbi tristique senectus et netus et. Lobortis feugiat vivamus at augue eget arcu. Amet aliquam id diam maecenas ultricies mi eget. Nisl purus in mollis nunc sed id semper risus. In dictum non consectetur a erat nam. Et tortor consequat id.</p>
                        <h3>1.2. Porta nibh venenatis rhoncus mattis rhoncus</h3>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Senectus et netus et malesuada fames. Malesuada nunc vel risus commodo. Eget egestas purus viverra accumsan in nisl nisi. Pellentesque elit ullamcorper dignissim cras tincidunt lobortis.</p> --}}

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                {{ $datas->links() }}
            </div> <!-- end of container -->
        </div> <!-- end of ex-basic-1 -->
        <!-- end of basic -->
@endsection
