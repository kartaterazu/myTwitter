@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4"></div>
        <div class="col-sm-12 col-md-4 form-twitter">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif
            @if ($message = Session('failed'))

                <div class="alert alert-danger">

                    <p>{{ $message }}</p>

                </div>

            @endif
            <h4 class="text-grey">LOGIN</h4>
            <form action="{{ URL::to('login') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email"></label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-info">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12" id="divider"></div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4"></div>
        <div class="col-sm-12 col-md-4 form-twitter">
            <h4>REGISTER</h4>
            <form action="{{ URL::to('register') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email"></label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label for="name"></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" aria-describedby="basic-addon1">
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-info">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function(){
        
    });
</script>
@endsection