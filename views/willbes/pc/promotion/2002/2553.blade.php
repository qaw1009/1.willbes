@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000} */

        /************************************************************/

        .evt00 {background:#0a0a0a}

        .evt_tops {background:#9a9ca9}       

        /*타이머*/
        .time {width:100%; text-align:center; background:#4c396b;}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:25px; color:#fff; letter-spacing: -1px; text-align:left}
        .time span {color:#fff; font-size:25px;}
        .time table td:last-child,
        .time table td:last-child span {font-size:35px;color:#fff;}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2553_top_bg.jpg) no-repeat center top;}        

        .evt02 {background:#f5f5f5}

        .evt03 {background:#93a5d2}

        .evtTab {width:1120px; margin:0 auto}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; color:#9ea4aa;background:#eff2f5;font-size:25px; padding:20px 0;font-weight:bold}
        .evtTab li:first-child a {border-right:0}
        .evtTab li:last-child a {border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {background:#46557c;color:#fff;}
        .evtTab:after {content:''; display:block; clear:both}

        .evt05 {background:#f6f6f6}

        .evt06 {background:#66429a}

        /*이용안내*/
        .wb_ctsInfo {background:#fff; padding:100px 0}  
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

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evt_tops" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_tops.jpg" title="신광은 경찰학원">
        </div>

        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB" id="newTopDday" data-aos="fade-up">
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

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_top.jpg" title="2022 심화과정">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_01.jpg" title="일정안내">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_02.jpg" title="업그레이드">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_03.jpg" title="심화과정">
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_04.jpg" title="스페셜 패키지">
            <ul class="evtTab">
                <li><a href="#tab01">일반경찰</a></li>
                <li><a href="#tab02">경행경채</a></li>
            </ul>
            <div id="tab01">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_04_01.jpg" alt="일반경찰" />
                    <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041" title="일반경찰" target="_blank" style="position: absolute;left: 29.51%;top: 83.52%;width: 41.01%;height: 7.55%;z-index: 2;"></a>
                </div> 
            </div>
            <div id="tab02">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_04_02.jpg" alt="경행경채" />
                    <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1041" title="경행경채" target="_blank" style="position: absolute;left: 29.51%;top: 83.52%;width: 41.01%;height: 7.55%;z-index: 2;"></a>
                </div> 
            </div>
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_05.jpg" title="스페셜 이벤트">
        </div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2553_06.jpg" title="스페셜 단강좌">
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/191831" title="헌법 김원욱" target="_blank" style="position: absolute;left: 2.51%;top: 71.92%;width: 12.01%;height: 4.55%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/191832" title="헌법 이국령" target="_blank" style="position: absolute;left: 16.11%;top: 71.92%;width: 12.01%;height: 4.55%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/191838" title="경찰학 장정훈" target="_blank" style="position: absolute;left: 31.31%;top: 71.92%;width: 12.01%;height: 4.55%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/191837" title="형사법 신광은" target="_blank" style="position: absolute;left: 44.81%;top: 71.92%;width: 12.01%;height: 4.55%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/191835" title="헌법 김원욱 심화기출" target="_blank" style="position: absolute;left: 58.51%;top: 71.92%;width: 12.01%;height: 4.55%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/191836" title="헌법 이국령 심화기출" target="_blank" style="position: absolute;left: 72.21%;top: 71.92%;width: 12.01%;height: 4.55%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3011/prod-code/191839" title="범죄학 박상민 심화이론" target="_blank" style="position: absolute;left: 85.81%;top: 71.92%;width: 12.01%;height: 4.55%;z-index: 2;"></a>
           </div>     
        </div>

        <div class="wb_ctsInfo" data-aos="fade-up">
            <div>
                <h3 class="NSK-Black">3월 심화과정 패키지 학원 실강 이용안내</h3>
                <dd>
                    <dt>2022 개편과목 심화과정반 전문 교수진</dt>
                    <dl>형사법 - 신광은 교수님</dl>
                    <dl>경찰학 - 장정훈 교수님</dl>
                    <dl>헌 법 - 김원욱 교수님</dl>
                    <dl>헌 법 - 이국령 교수님</dl>
                    <dl>범죄학 - 박상민 교수님</dl>                    
                </dd>           
                <dd>
                    <dt>심화과정 패키지 안내</dt>
                    <dl>1. 심화과정  풀패키지(3/14~6/4)(인강 포함)</dl>
                    <dl>① 학원 강의 : 심화과정 풀 패키지</dl>
                    <dl>② 심화과정반 복습 동영상</dl>
                    <dl>2. 심화과정 종합반(4/4~6/4)(인강 포함)</dl>
                    <dl>① 학원 강의 : 심화과정 종합반 (단, 헌법은 이론/기출 중 택1)</dl>
                    <dl>② 심화과정반 복습 동영상</dl>            
                </dd>                 
                <dd>
                    <dt>심화과정 패키지 특별할인 안내</dt>
                    <dl>1. 신광은경찰학원 심화종합반 실강 수강이력이 있는 수험생 5만원 추가할인</dl>
                    <dl>2. 타학원 환승 인증시 사전접수가에서 10만원 추가할인</dl>
                    <dl>① 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있는 수험생</dl>
                    <dl>② 2021년 이후 자사 실강 수강이력이 없는 수험생</dl>
                </dd>
                <dd>
                    <dt>유의사항</dt>
                    <dl>1. 2022년 시험대비 개편과목 심화과정 패키지입니다.</dl>
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
      $(document).ready(function() {
        AOS.init();
      });
    </script>

    <script type="text/javascript">       
          /*디데이카운트다운*/
          $(document).ready(function() {
              dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
         /*탭*/
         $(document).ready(function(){
            $('.evtTab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).hide()
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
        });        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop