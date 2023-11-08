@extends('layouts.adminMainLayout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Adding New User</h4>





                            <form method="POST" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="name" name="username" placeholder="username" value="{{old('username')}}" >
                                    @error('username')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="first_name">Firstname</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Firstname" value="{{old('first_name')}}" >
                                    @error('first_name')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Lastname</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Lastname" value="{{old('last_name')}}" >
                                    @error('last_name')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone number"
                                           oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('phone_number')}}" >
                                    @error('phone_number')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{old('email')}}" >
                                    @error('email')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{old('password')}}" required>
                                    @error('password')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation ">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{old('password_confirmation')}}" required>
                                    @error('password_confirmation')
                                    <span class="text-danger" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="isAdmin">Is Admin</label>
                                    <input type="checkbox" id="isAdmin" name="isAdmin" value="{{old('isAdmin')}}">
                                </div>
                                <button style="float:right;" type="submit" class="btn btn-primary mr-2">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">All rights reserved.</span>
            </div>
        </footer>
    </div>
@endsection
