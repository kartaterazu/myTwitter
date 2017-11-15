@extends('layout')

@section('title', 'Post')

@section('content')
    <div>
        @if (count($errors) > 0)
            <div class="alert alert-danger text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session('success'))

            <div class="alert alert-success text-center">

                <p>{{ $message }}</p>

            </div>

        @endif
        @if ($message = Session('failed'))

            <div class="alert alert-danger text-center">

                <p>{{ $message }}</p>

            </div>

        @endif
    </div>
    <div class="col-sm-12 col-md-3">
        <form action="{{ URL::to('profile-upload') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group text-center">
                <img src="{{ $user->image ? URL::asset('img/profile/'.$user->image) : URL::asset('img/profile/default.png') }}" alt="{{ $user->name }}" class="img-circle img-profile">
            </div>
            <div class="form-group text-center">
                <input type="file" name="image" id="upload-image" style="display:none"/>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-info">Upload</button>
            </div>
        </form>
    </div>
    <div class="col-sm-12 col-md-8 form-twitter bg-profile">
        <form action="{{ URL::to('profile-update') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name"></label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" aria-describedby="basic-addon1" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-info">Save</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(function(){
        $(".img-profile").on('click', function(event) {
            $("#upload-image").trigger('click');
        });
    });
</script>
@endsection