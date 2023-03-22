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
                                <form action="{{route('update',[$data->id])}}" method="POST" id="getQuoteForm">
                                    @csrf

                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <input placeholder="Your name" type="text" name="name" class="form-control-input" value="{{ old('name',$data->name) }}" id="gname">
                                        <div class="text-danger">
                                            @error("name")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="email" type="email" name="email" class="form-control-input" value="{{ old('email',$data->email) }}" id="gemail">
                                        <div class="text-danger float-start">
                                            @error("email")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="phone" type="text" name="phone" class="form-control-input" value="{{ old('phone',$data->phone) }}" id="gphone">
                                        <div class="text-danger float-start">
                                            @error("phone")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="address" class="form-control-select" id="gselect">
                                            <option class="select-option" value="" disabled selected>Select Address</option>
                                            <option class="select-option" value="Yangon" @if($data->address == 'Yangon') selected @endif>Yangon</option>
                                            <option class="select-option" value="Mandalay"  @if($data->address == 'Mandalay') selected @endif>Madalay</option>
                                            <option class="select-option" value="Shan"  @if($data->address == 'Shan') selected @endif>Shan State</option>
                                            <option class="select-option" value="Kachin"  @if($data->address == 'Kachin') selected @endif>Kachin</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        <div class="text-danger float-start">
                                            @error("address")
                                                {{ $message }}
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control-submit-button">Update Customer</button>
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
