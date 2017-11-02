@extends('layout')

@section('title', 'Post')

@section('content')
<div class="col-sm-12 col-md-12 input-status">
    {{ csrf_field() }}
    <div class="form-group">
        <input type="text" class="form-control" name="post" id="post" placeholder="Update Status..." />
    </div>
    <div class="form-group">
        <button class="btn btn-info pull-right" id="update">Update</button>
    </div>
</div>
<div class="col-sm-12 col-md-12 user-post">
    <div class="post-body">
        <ul class="chat">
            @foreach ($posts as $key => $post)
                <?php 
                $users = $post->getUser($post->user_id); ?>

                @if(Session('id') == $post->user_id)
                    <li class="right clearfix">
                        <span class="pull-right">
                            <img src="{{ URL::asset('img/profile/'.$users->image) }}" alt="{{ $users->name }}" class="img-circle chat-img">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">                            
                                <strong class="pull-right">
                                    {{ $post->firstName($users->name) }}
                                    <small class="text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </strong>
                            </div>
                            <br/>
                            <div class="pull-right">{{ $post->post }}</div>
                        </div>
                    </li>
                @else
                    <li class="left clearfix">
                        <span class="pull-left">
                            <img src="{{ URL::asset('img/profile/'.$users->image) }}" alt="{{ $users->name }}" class="img-circle chat-img">
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">                            
                                <strong class="pull-left">
                                    {{ $post->firstName($users->name) }}
                                    <small class="text-muted">
                                        <i class="fa fa-clock-o fa-fw"></i>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </strong>
                            </div>
                            <br/>
                            <div class="pull-left">{{ $post->post }}</div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(function(){
        $("#update").click(function(event) {
            event.preventDefault();

            
                var post = $("#post").val();
                var _token = $("input[name=_token]").val();

                $.ajax({
                    url: '{{ URL::to("posting") }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {posting: post, _token: _token},
                    beforeSend: function(){
                        $(".loading_twitter").fadeIn('slow');
                    },
                    success: function (data) {
                        var new_post = '<li class="right clearfix">'+
                                            '<span class="pull-right">'+
                                                '<img src="img/profile/'+data.image+'" alt="'+data.name+'" class="img-circle chat-img">'+
                                            '</span>'+
                                            '<div class="chat-body clearfix">'+
                                                '<div class="header">'+                    
                                                    '<strong class="pull-right">'+
                                                        '<small class="text-muted">'+
                                                            '<i class="fa fa-clock-o fa-fw"></i>'+
                                                            data.time+
                                                        '</small> '+
                                                        data.name+
                                                    '</strong>'+
                                                '</div>'+
                                                '<br/>'+
                                                '<div class="pull-right">'+data.post+'</div>'+
                                            '</div>'+
                                        '</li>';

                        $("ul.chat").prepend(new_post);
                        $("#post").val('');
                        $(".loading_twitter").fadeOut('slow');
                    }
                });
            
        });

        $("#post").bind('keypress', function(event) {
            if (event.keyCode == 13)
            {
                $("#update").trigger('click');
            }
        });
    });
</script>
@endsection