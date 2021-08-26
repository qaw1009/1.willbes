@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">    
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        .sky {position:fixed; top:225px; right:0; z-index:10;}
        .sky a {display:block; margin-bottom:5px}
       
        .evt00 {background:#0a0a0a}

        /*타이머*/
        .time {width:100%; text-align:center; background:#f5f5f5;}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:30px; color:#000; text-align:right}        
        .time span {color:#000; font-size:30px;}
        .time .time_txt span{padding-left:25px;}
        .time table td:last-child,
        .time table td:last-child span {font-size:36px}

        .evtTop {background: url(https://static.willbes.net/public/images/promotion/2021/02/1847_top_bg.jpg) no-repeat center top;}
        .evtTop span {position:absolute; top:200px; left:50%; margin-left:-500px; -webkit-animation:swing 2s linear infinite;animation:swing 2s linear infinite}
        @@keyframes swing{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,10deg);transform:rotate3d(0,0,1,10deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }

        .evt_tops {background: url(https://static.willbes.net/public/images/promotion/2021/08/1847_tops_bg.jpg) no-repeat center top;position:relative;}
        .evt_tops .youtube iframe {width:730px; height:421px} 
        .evt_tops .youtube {position:absolute; top:71px; left:52.3%; width:455px; z-index:1; margin-left:-405px; box-shadow:0 10px 20px rgba(0,0,0,.3);}  

        .evt02 {background:#fef1e0;}
        .evt03 {background:#d7e3ef;} 
        .evt04 {background:#2d395a;}  

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    
        
        <div class="sky">               
            <a href="#to_go"><img src="https://static.willbes.net/public/images/promotion/2021/08/2342_sky.png" title="올공반 1기 모집"></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox time NSK-Black" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>올.공.반<br>접수 마감까지</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><span>남았습니다.</td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->           
        
        <div class="evtCtnsBox evtTop" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2342_top.jpg" title="올공반 올케어">
            <span><img src="https://static.willbes.net/public/images/promotion/2021/08/2342_sky02.png" title="올공반 1기 모집"></span>
        </div>

        <div class="evtCtnsBox evt_tops" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2342_tops.jpg" title="올케어 시스템">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/2g2o_TPOmPY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2342_02.jpg" title="왜 올공반인가">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2342_03.jpg" title="프리미엄">                           
        </div>    
        
        <div class="evtCtnsBox evt04" id="to_go" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2342_04.jpg"  title="최종마감">                             
        </div>
      
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

    <script type="text/javascript">

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop