@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
      
        .sky {position:fixed;top:150px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:15px}
       
        .evt00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2496_top_bg.jpg) no-repeat center top;}
        .evtTop span {position: absolute; left:50%; z-index: 2;}
        .evtTop .img01 {width:428px; top:585px; margin-left:-800px}

        .evtTops {background:#005B3A}
        .evtTops span {position: absolute; left:50%; z-index: 2;}        
        .evtTops .img02 {width:356px; top:100px; margin-left:450px}
      
        .evt01 {background:#fff}

        .evt02 {background:#FAFAFC;position:relative;}
        .youtube {position:absolute; top:1215px; left:50%; width:860px; z-index:1;margin-left:-430px}
        .youtube iframe {width:860px; height:485px;}

        .evt03 {background:#fff}

        .evt_tab{background:#fafafb} 

        /*탭*/   
        .evtTab {width:780px; margin:0 auto}
        .evtTab li {display:inline; float:left; width:50%}
        .evtTab li a {display:block; color:#000; font-size:24px; padding:20px 0; border:5px solid #000;font-weight:bold}
        .evtTab li:first-child a {border-right:0}
        .evtTab li:last-child a {border-left:0}
        .evtTab li a:hover,
        .evtTab li a.active {color:#fff; border:5px solid #000;background:#101010;}
        .evtTab:after {content:''; display:block; clear:both}

        .evt_tab_again {background:#fafafb;}

        .evt05 {background:#ECEBF0}

        /*이용안내*/        
        .evtInfo {padding:80px 0; background:#242424; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:10px; color:#c4feff}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style: none; margin-left:20px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">      

        <div class="sky" id="QuickMenu">
            <a href="#event01">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2496_sky01.png" alt="선접수 할인"/>
            </a>
            <a href="#event02">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_sky02.png" alt="추가할인 이벤트"/>
            </a>           
        </div>    

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2496_top.jpg" alt="2022 슈퍼 pass" />
            <span class="img01" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/02/2496_top_img01.png" alt="" /></span>           
        </div>

        <div class="evtCtnsBox evtTops" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2496_tops.jpg" alt="2022 슈퍼 pass" />
            <span class="img02" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/02/2496_top_img02.png" alt="" /></span>           
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_01.jpg" alt="슈퍼패스를 말하다"  />
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2496_02.jpg" alt="2022년을 준비하다"  />
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" title="영상이 궁금하다면?" target="_blank" style="position: absolute; left: 23.21%; top: 89.85%; width: 53.75%; height: 3.94%; z-index: 2;"></a>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qkIw507IPpM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2496_03.jpg" alt="합격 커리큘럼"  />   
        </div>

        <div class="evtCtnsBox evt_tab" data-aos="fade-up">   
            <div class="wrap" id="event01" >
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2496_04_03.jpg" alt="3월 개강반" />               
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/show/78?board_idx=385719" title="심화형" target="_blank" style="position: absolute; left: 33.66%; top: 88.24%; width: 32.77%; height: 6.35%; z-index: 2;"></a>              
            </div>      
        </div>

        <div class="evtCtnsBox evt_tab_again" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2496_04_again.jpg" alt="다시한번 합격을 위해" id="event02" />
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" title="super pass 신청하기" target="_blank" style="position: absolute; left: 27.59%; top: 82.24%; width: 44.82%; height: 5.74%; z-index: 2;"></a>
            </div> 
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_05.jpg" alt="특별혜택"  /> 
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">

			<div class="evtInfoBox">
				<h4 class="NSK-Black">유의사항</h4>
				<div class="infoTit"><strong>2022 슈퍼패스 경찰 전문 교수진</strong></div>
				<ul>
					<li>형사법 - 신광은 교수님</li>
                    <li>경찰학 - 장정훈 교수님</li>
                    <li>헌 법 - 김원욱 교수님 & 이국령 교수님(택1)</li>
                    <li>범죄학 - 박상민 교수님</li>
                    <li>G-TELP - 김준기 교수님</li>
                    <li>한능검 - 오태진 교수님</li>                      
				</ul>

                <div class="infoTit"><strong>[심화형] 5개월 슈퍼패스 유의사항</strong></div>
                <ul>
                    <li>① [심화형] 5개월 슈퍼패스는 2022년 4월 4일부터 2022년 8월 20일까지 책정된 수강료로 시험 일정에 따라 추가 수강료가 부과될 수 있습니다.<br>
                    (1개월 연장 시 - 실강 10만원, 인강 5만원)<br>
                    * 정규과정 : 2022년 과목개편대비 기본이론,심화과정,문제풀이,마무리 특강</li>
                    <li>② 국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 이로 인한 해당기간 환불은 불가합니다.</li>
                    <li>③ G-TELP 특강은 수강기간 내에, 실강 1회에 한하여 50% 할인 적용됩니다.</li>
                    <li>④ 인강패스와 정규과정 외 특강 및 모의고사는 슈퍼패스 등록생에게 제공되는 무료 혜택입니다.</li>
                    <li>⑤ 일부 특강은 유료로 결제할 수 있습니다.</li>
                    <li>⑥ 중도 환불 시 수강기간만큼 차감 후, 무료 혜택 금액을 차감하여 환불됩니다.</li>
                </ul>

                <div class="infoTit"><strong>슈퍼패스 환승/ 재등록 이벤트</strong></div>
                <ul>
                    <li>환승 <br>
                    - 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있는 수험생<br>
                    - 2021년 이후 자사 실강 수강이력이 없는 수험생</li>	
                    <li>재등록<br>
                    - 신광은 경찰팀 슈퍼패스를 1년 이내 재등록 하는 수강생</li>		
				</ul>
				<div class="strong">
					* 학원사정으로 이벤트 기간 및 금액변동이 있을 수 있습니다.<br>
					* 학원사정으로 강의 추가 및 변경이 있을수 있습니다.<br>
                    * 학원접수 문의 : 1544-0336
				</div>
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