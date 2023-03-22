@extends("layouts.master");

@section("title")
<title>Home Page</title>
@endsection
@section("body")
            <!-- Header -->
            <header id="header" class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-container">
                                <h1 class="h1-large">CRUD Project with Laravel</h1>
                                <p class="p-large">This is creating customers list for project offered by Run Free Education IT Department which warmly welcomes all learners who join CDM movement.</p>
                            </div> <!-- end of text-container -->
                        </div> <!-- end of col -->
                        <div class="col-lg-6">

                            <!-- Get Quote Form -->
                            <div class="form-container">
                                <form action="{{route('create')}}" method="POST" id="getQuoteForm">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control-input" id="gname" >
                                        <label class="label-control" for="gname">Name</label>
                                      <div class="text-danger float-start">
                                        @error("name")
                                            {{ $message }}
                                        @enderror
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control-input" id="gemail" >
                                        <label class="label-control" for="gemail">Email</label>
                                        <div class="text-danger float-start">
                                            @error("email")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control-input" id="gphone" >
                                        <label class="label-control" for="gphone">Phone</label>
                                        <div class="text-danger float-start">
                                            @error("phone")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="address" class="form-control-select" id="gselect" >
                                            <option class="select-option" value="" disabled selected>Select Address</option>
                                            <option class="select-option" value="Yangon">Yangon</option>
                                            <option class="select-option" value="Mandalay">Madalay</option>
                                            <option class="select-option" value="Shan">Shan State</option>
                                            <option class="select-option" value="Kachin">Kachin</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        <div class="text-danger float-start">
                                            @error("address")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control-submit-button">Create Customer</button>
                                    </div>
                                </form>
                            </div> <!-- end of form-container -->
                            <!-- end of get quote form -->

                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </header> <!-- end of header -->
            <!-- end of header -->
@endsection
