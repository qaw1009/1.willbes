{{-- 레이어팝업 레이아웃 --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
    <title>윌비스 통합 사이트</title>
</head>
<body>
    <div class="modal-header bg-green">
    </div>
    <div class="modal-body">
        <!-- jwplayer -->
        <script src="/public/vendor/jwplayer/jwplayer.js"></script>
        <div class="embedWrap">
            <div class="embed" id="myElement" style="margin:auto;">
                <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                <script type="text/javascript">
                    jwplayer("myElement").setup({
                        width: '100%',
                        //image: "",
                        aspectratio: "16:9",
                        autostart: true,
                        file: "{{$video_route}}"
                    });
                </script>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        {{-- 동적 이벤트 바인딩 --}}
        $(document).ready(function() {
            init_iCheck();
            init_datatable();
        });
    </script>
</body>
</html>
