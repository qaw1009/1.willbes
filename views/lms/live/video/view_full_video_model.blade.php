{{-- 레이어팝업 레이아웃 --}}
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


