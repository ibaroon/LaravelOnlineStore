@extends('layouts.app')

    

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">{{ __('Profile') }}</div>

    

                <div class="card-body">

                    <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">

                        @csrf

    

                        @if (session('success'))

                            <div class="alert alert-success" role="alert" class="text-danger">

                                {{ session('success') }}

                            </div>

                        @endif

  

                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label for="name" class="form-label">Image: </label>

                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image">

  

                                @error('image')

                                    <span role="alert" class="text-danger">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

  

                            <div class="mb-3 col-md-6">

                                <img src="/avatars/{{ auth()->user()->image }}" style="width:150px;margin-top: 10px; border-radius:10px">

                            </div>

  

                        </div>

  

                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label for="name" class="form-label">First Name: </label>

                                <input class="form-control" type="text" id="fname" name="fname" value="{{ auth()->user()->fname }}" autofocus="" >

                                @error('fname')

                                    <span role="alert" class="text-danger">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>
                            <div class="mb-3 col-md-6">

                                <label for="lname" class="form-label">Last Name: </label>

                                <input class="form-control" type="text" id="lname" name="lname" value="{{ auth()->user()->lname }}" autofocus="" >

                                @error('lname')

                                    <span role="alert" class="text-danger">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>
                        </div>

                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label for="email" class="form-label">Email: </label>

                                <input class="form-control" type="text" id="email" name="email" value="{{ auth()->user()->email }}" autofocus="" >

                                @error('email')

                                    <span role="alert" class="text-danger">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                            <div class="mb-3 col-md-6">

                                <label for="phone" class="form-label">Phone: </label>

                                <input class="form-control" type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" autofocus="" >

                                @error('phone')

                                    <span role="alert" class="text-danger">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-md-12">

                                <label for="address" class="form-label">Address: </label>

                                <input class="form-control" type="text" id="address" name="address" value="{{ auth()->user()->address }}" autofocus="" >

                                @error('address')

                                    <span role="alert" class="text-danger">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>  
                        

                      

                    </div>

                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label for="password" class="form-label">Password: </label>

                                <input class="form-control" type="password" id="password" name="password" autofocus="" >

                                @error('password')

                                    <span role="alert" class="text-danger">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

   

                            <div class="mb-3 col-md-6">

                                <label for="confirm_password" class="form-label">Confirm Password: </label>

                                <input class="form-control" type="password" id="confirm_password" name="confirm_password" autofocus="" >

                                @error('confirm_password')

                                    <span role="alert" class="text-danger">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                @enderror

                            </div>

                        </div>

   

                      

                        <div class="row mb-0">

                            <div class="col-md-12 offset-md-5">

                                <button type="submit" class="btn btn-primary">

                                    {{ __('Upload Profile') }}

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