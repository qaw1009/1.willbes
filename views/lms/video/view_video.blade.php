@extends('lcms.layouts.master_modal')

@section('layer_title')
    동영상플레이
@stop

@section('layer_header')
        @endsection

        @section('layer_content')
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
        @stop

        @section('add_buttons')
        @endsection

        @section('layer_footer')
@endsection