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
        }
        .evtContent span {vertical-align:middle;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/    

        .sky {position:fixed;  top:250px; right:0; z-index:10;}
        .sky a {display:block; margin-bottom:15px}   

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:20px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:28px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:40px}
        @@keyframes upDown{
        from{color:#000}
        50%{color:#424ac7}
        to{color:#000}
        }
        @@-webkit-keyframes upDown{
        from{color:#000}
        50%{color:#424ac7}
        to{color:#000}
        } 

        .evt00 {background:#0a0a0a}  

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2335_top_bg.jpg) no-repeat center top;}
        .evtTop .iconNew{
            position: absolute;
            top:285px;
            left:110px;
            animation:drone 1.5s infinite;
        }
        @@keyframes drone {
            0%, 100% {animation-timing-function: ease-out;}
            from {transform: translate3d(0, 0, 0);}
            50% {transform: translate3d(0, -10px, 0);}
            to {transform: translate3d(0, 0, 0);}
        }
        .evtTop .txt{
            width: 100%;
            font-size:42px;
            text-align: center; 
            letter-spacing: -1px;
            display: flex;
            flex-wrap: wrap;
            line-height: 1.3;
            align-items: center;
            justify-content: center;
            position: absolute;
            top:1050px;
            left:50%;
            transform: translate(-50%);
            color:#fff;
        } 
        .evtTop .txt .pointColor{color:#fff600; padding-right:5px;}

        .evt02 {background:#FCD8B6}  
        .evt03{ padding-bottom: 70px;} 

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">  
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday">
           <div>
               <table>
                   <tr>                    
                   <td class="time_txt"><span>사전접수 이벤트<br>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} 까지</span></td>
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
                   <td>남았습니다!</td>
                   </tr>
               </table>                
           </div>
        </div>
        <!-- 타이머 //-->
            
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>


        <div class="sky">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/08/2335_sky.png" alt="이벤트 진행중" ></a>
        </div>        
        
        <div class="evtCtnsBox evtTop" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2335_top.jpg" title="합격 전략반"> 
                <div class="iconNew"><img src="https://static.willbes.net/public/images/promotion/2021/08/2335_icon_01.png" alt=""></div>
                <p class="txt NSK-Black">
                    <span class="pointColor">2022년 합격,</span> 합격전략반이 함께 만듭니다. <br>
                    <span class="pointColor">2021.9.6(월) 시작합니다.</span>
                </p>
            </div>    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2335_01.jpg" title="모여라">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2335_02.jpg" title="스케줄">
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank" title="강의시간표 확인하기" style="position: absolute;left: 20.51%;top: 84.3%;width:58.63%;height: 11.13%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right" id="evt_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2335_03.jpg" title="스페셜 패키지">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif  
            </div>    
        </div>   
                
	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
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