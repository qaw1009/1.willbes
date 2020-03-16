@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            margin-left: 140px !important;
            padding:0 !important;
            background:#fff;
        }
    </style>
    {!! csrf_field() !!}
    <div class="NSK" id="evtContainer">
        <div class="sgr-live-view" style="min-height: 600px; text-align: center; margin-top: 100px;">
            <img id="sgr_live_thumb" src="" style="display:none; width:854px; height:480px; cursor: pointer; margin-left: 10px;">
            {{--        <iframe src="https://willbes.sgrsoft.com/w/lecture_player/15" frameborder="0" allowfullscreen style="display:block; width:99vw; height: 98vh"></iframe>--}}
{{--            <iframe src="https://willbes.sgrsoft.com/w/lecture_player/15" frameborder="0" allowfullscreen style="display:block; width:1200px; height: 800px;"></iframe>--}}
            <iframe id="sgr_live_frame" src="" frameborder="0" allowfullscreen style="display:none; width:854px; height:480px;"></iframe>
        </div>
    </div>

    <script type="text/javascript">

        var live_url = '';
        var onair = false;
        var $sgr_frame = $('#sgr_live_frame');
        var $sgr_thumb = $('#sgr_live_thumb');
        var live_prod_code = '159332';      {{-- TODO --}}

        $(document).ready(function() {
            readyLecPlayer();
        });

        {{-- 라이브 강의상품 정보 얻어오기 --}}
        function readyLecPlayer() {
            $.ajax({
                type : 'POST',
                url: '/sgrLive/lecPlayer',
                data:{
                    '{{ csrf_token_name() }}' : $('input[name="{{ csrf_token_name() }}"]').val(),
                    prod_code : live_prod_code
                },
                dataType: 'json',
                success: function(res, status) {
                    if(res.code == 200){
                        if(res.result && res.result.posts){
                            if(!onair) {
                                onair = true;
                                live_url = res.result.posts[0].player_url_ssl;
                                $sgr_thumb.prop('src', res.result.posts[0].thumb_url);
                                $sgr_thumb.click(authMember);
                                $sgr_thumb.show();
                            }
                        }else{
                            onair = false;
                            alert('라이브 방송이 준비중입니다.');
                        }
                    } else {
                        alert(res.message);
                    }
                },
                error: function(res, status, error) {
                    if(res.responseJSON && res.responseJSON.ret_msg) {
                        alert(res.responseJSON.ret_msg);
                    } else if(res.responseText) {
                        alert(res.responseText);
                    }
                }
            });
        }

        {{-- 사용자 인증 --}}
        function authMember() {
            $.ajax({
                type : 'POST',
                url: '/sgrLive/authMember',
                data:{
                    '{{ csrf_token_name() }}' : $('input[name="{{ csrf_token_name() }}"]').val(),
                    prod_code : live_prod_code
                },
                dataType: 'json',
                success: function(res, status) {
                    {{-- 서버에 회원정보를 등록 후 리턴 --}}
                    if(res.code == 200) {
                        {{-- 유저 토큰키를 이용한 플레이어 오픈 --}}
                        if(res.result && res.result.user_key){
                            // var win = window.open(live_url+'?key='+res.result.user_key, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes");
                            $sgr_thumb.hide();
                            $sgr_frame.prop('src', live_url + '?key='+res.result.user_key);
                            $sgr_frame.show();
                        } else {
                            alert('라이브 방송이 준비중입니다.');
                        }
                    }else{
                        alert(res.message);
                    }
                },
                error: function(res, status, error) {
                    if(res.responseJSON && res.responseJSON.ret_msg) {
                        alert(res.responseJSON.ret_msg);
                    } else if(res.responseText) {
                        alert(res.responseText);
                    }
                }
            });
        }


    </script>
@stop
