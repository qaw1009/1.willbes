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

        .sky {position:fixed;top:250px; width:130px; right:75px;z-index:1;}        

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:24px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li .color1 {color:#2525F5;vertical-align:baseline;}
        .newTopDday ul li .color2 {color:#2525F5;vertical-align:baseline;}
        .newTopDday ul li .color3 {color:#25BAF0;vertical-align:baseline;}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; padding-right:10px; padding-top:10px; width:28%;line-height:30px;}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .skyBanner {position:fixed; bottom:20px; right:20px; width:138px; border:1px solid #000; z-index:10;}

        .evtTop {background:#5B788A url(https://static.willbes.net/public/images/promotion/2020/11/1920_top_bg.jpg) no-repeat center top; } 
        .btnSet {position:absolute;bottom:210px;  left:50%; margin-left:-375px; z-index:1}
        .btnSet:after {content:""; display:block; clear:both}

        .evt01 {background:#fff;}
        .evt02 {background:#2B3D53;}
        .evt03 {background:#2B3D53;}
        .evt04 {background:#2B3D53;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="sky">
            <a href="#winter_school"><img src="https://static.willbes.net/public/images/promotion/2020/11/1920_sky.png" alt="" ></a>
        </div>      
        
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                    <span class="color1">WILL</span>BES <span class="color2">WIN</span>TER <span class="color3">SCHOOL</span><br>접수마감까지
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>  

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1920_top.jpg" title="">
            <div class="btnSet">
                @if (empty($file_data_promotion) === false)
                    @foreach($file_data_promotion as $key => $row)
                        <a href="{{front_url('/promotion/download?file_idx=').$row['EfIdx'].'&event_idx='.$data['ElIdx'] }}">
                            <img src="https://static.willbes.net/public/images/promotion/2020/11/1920_top_btn0{{ $loop->index }}.png" title="{{ $row['FileRealName'] }}">
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1920_01.jpg" title="">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1920_02.jpg" title="">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1920_03.jpg" title="">
        </div>

        <div class="evtCtnsBox evt04" id="winter_school">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1920_04.jpg" title="">
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">

     /*디데이카운트다운*/
     $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop