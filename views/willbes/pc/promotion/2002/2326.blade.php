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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2326_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#FCD8B6}   

        .wb_ctsInfo {background:#f4f4f4; padding:100px 0}  
        .wb_ctsInfo div {
            width:1000px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;
            font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#000;font-weight:bold;} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; color:#000;font-weight:bold;font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;}  
        .wb_ctsInfo div dd {margin-bottom:30px;}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
            color:#000;
            font-weight:bold;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}

        .wb_ctsInfo .original {text-decoration:line-through; color:#666} 
        .wb_ctsInfo .discount {color:#e80000;} 

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">  
            
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

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

        <div class="sky">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/08/2326_sky.png" alt="이벤트 진행중" ></a>
        </div>        
        
        <div class="evtCtnsBox evtTop" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2326_top.jpg" title="합격 전략반"> 
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank" title="신청하기" style="position: absolute;left: 20.71%;top: 85.6%;width: 58.63%;height: 7.13%;z-index: 2;"></a>	       
            </div>    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2326_01.jpg" title="모여라">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2326_02.jpg" title="스케줄">
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank" title="강의시간표 확인하기" style="position: absolute;left: 20.51%;top: 84.3%;width: 58.63%;height: 7.13%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right" id="evt_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2326_03.jpg" title="스페셜 패키지">
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank" title="신청하기" style="position: absolute;left: 20.51%;top: 84.3%;width: 58.63%;height: 7.13%;z-index: 2;"></a>	
            </div>    
        </div>   

        <div class="wb_ctsInfo" id="careful">
            <div>
                <h3 class="NSK-Black">9월 합격전략반 학원 실강 이용안내</h3>
                <dd>
                    <dt>2022 합격전략반 전문 교수진</dt>
                    <dl>형사법 - 신광은 교수님</dl>
                    <dl>경찰학(행정법) - 장정훈 교수님</dl>
                    <dl>헌 법 - 김원욱 교수님</dl>
                    <dl>헌 법 - 이국령 교수님</dl>                    
                </dd>           
                <dd>
                    <dt>2022 합격전략반 안내</dt>
                    <dl>1. 2022 합격전략반 헌법 속성반(9/6~10/29)</dl>
                    <dl>① 헌법 기본이론(9월)</dl>
                    <dl>② 헌법 심화이론(10월)</dl><br>                  
                    <dl>2. 2022 합격전략반 헌법+경찰학(행정법) (9/6~10/29)</dl>
                    <dl>① 헌법 기본이론(9월)</dl>       
                    <dl>② 헌법 심화이론(10월)</dl>
                    <dl>③경찰학(행정법) 심화이론(9월)</dl><br>
                    <dl>3. 2022 합격전략반 풀패키지 (9/6~10/29)</dl>
                    <dl>① 헌법 기본이론(9월)</dl>
                    <dl>② 헌법 심화이론(10월)</dl>
                    <dl>③경찰학(행정법) 심화이론(9월)</dl>
                    <dl>④형사법 심화이론(형법 총론) (10월 예정)</dl>
                </dd>                 
                <dd>
                    <dt>합격전략반 특별 이벤트</dt>                
                    <dl>①헌법 속성반 , 헌법+경찰학 : 타학원 환승 인증시 사전접수가에서  5만원 추가 할인</dl>
                    <dl>②합격전략 풀패키지 : 타학원 환승 인증시 사전접수가에서 10만원 추가 할인</dl>
                </dd>
                <dd>
                    <dt>환승이벤트 대상자</dt>                
                    <dl>① 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있는 수험생</dl>
                    <dl>② 2020년 이후 자사 실강 수강이력이 없는 수험생</dl>
                </dd>
                <dd>
                    <dt>유의사항</dt>
                    <dl>1. 2022년 시험대비 합격전략반입니다.</dl>
                    <dl>2. 국가재난 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의 또는 라이브 강의로 대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.</dl>
                </dd>
                <dd>
                    <dt>* 학원 문의 : 1544-0336</dt>
                </dd>
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