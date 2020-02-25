@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:#e5c6ca url(https://static.willbes.net/public/images/promotion/2020/02/1532_top_bg.jpg) no-repeat center top;}

        .btnSet {position:absolute; bottom:120px; left:50%; margin-left:-390px; z-index:1}
        .btnSet a {display:block; float:left}
        .btnSet:after {content:""; display:block; clear:both}        

        .evt00 {background:#404040;}

        .evt01 {background:#fff;}    

        .evt02 {background:#276c89;}

        .btnSet2 {position:absolute; bottom:510px; left:50%; margin-left:-360px; z-index:1}
        .btnSet2 a {display:block; float:left}
        .btnSet2:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">     

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1532_top.jpg" title="신의 한수 서포터즈">
            <div class="btnSet">
                @if (empty($file_data_promotion) === false)
                    @foreach($file_data_promotion as $key => $row)
                        <a href="{{front_url('/promotion/download?file_idx=').$row['EfIdx'].'&event_idx='.$data['ElIdx'] }}">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1532_top_btn0{{ $loop->index }}.png" title="{{ $row['FileRealName'] }}">
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1532_01.jpg" title="서포터즈 선정 혜택">          
        </div>     

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1532_02.jpg" title="광은 서포터즈 어떤 활동을 하는 서포터즈인가요?">
            <div class="btnSet2">
                @if (empty($file_data_promotion) === false)
                    @foreach($file_data_promotion as $key => $row)
                        <a href="{{front_url('/promotion/download?file_idx=').$row['EfIdx'].'&event_idx='.$data['ElIdx'] }}">
                            <img src="https://static.willbes.net/public/images/promotion/2020/02/1532_02_btn0{{ $loop->index }}.png" title="{{ $row['FileRealName'] }}">
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg = $("#slidesImg").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
                });
            
                $("#imgBannerLeft").click(function (){
                    slidesImg.goToPrevSlide();
                });
            
                $("#imgBannerRight").click(function (){
                    slidesImg.goToNextSlide();
                });
        });

    </script>

@stop