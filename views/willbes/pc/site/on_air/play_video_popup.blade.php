@extends('willbes.pc.layouts.master_popup')

@section('content')
    <script src="/public/vendor/jwplayer/jwplayer.js"></script>
    <div class="embedWrap">
        <div class="embed" id="jw-player" style="margin:5px;">
            <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
            <script type="text/javascript">
                jwplayer("jw-player").setup({
                    width: '100%',
                    //image: "",
                    aspectratio: "16:9",
                    autostart: true,
                    file: "{{$video_route}}"
                });

                $(document).ready(function() {
                    //팝업오픈 제한 스크립트
                    /*var cnt = 1;
                    var counter = setInterval(function () {
                        if (cnt <= 3) {
                            cnt++;
                        } else {
                            alert('맛보기플레이어가 종료됩니다.');
                            window.close();
                        }
                    },1000);*/
                });
            </script>
        </div>
    </div>
@stop