@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; position:relative; font-size:14px; line-height:1.3; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;} 

    /************************************************************/
    .dday {font-size:2.4vh !important; padding:1vh; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#cf1425; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:1.4vh !important;}  

    .evt_apply {margin-bottom:5vh;}
    .evt_apply .tabs {display:flex}
    .evt_apply .tabs a {font-size:1.6vh; text-align:center; display:block; width:25%; background:#333; color:#fff; padding:2vh 0; letter-spacing:-1px}
    .evt_apply .tabs a.active {background:#fff; color:#fff;}
    .evt_apply .tabs a.active {background:#1d6751; color:#fff;}
    .evt_apply .tabs a strong {color:#cf1425}

    /* 이용안내 */
    .evtInfo {padding:5vh 0 10vh; background:#fff; color:#000; line-height:1.5; font-size:1.6vh;}
    .guide_box{margin:0 auto; padding:5vh; text-align:left; word-break:keep-all;border:2px solid #000;}
    .guide_box h2 {font-size:3vh; margin-bottom:3vh;}
    .guide_box dt{margin-bottom:1vh; color:#fff; background:#333; display:inline-block; padding:0.5vh 1vh; font-weight:bold; margin-right:1vh; font-size:1.6vh;}        
    .guide_box dd{margin-bottom:5vh;}
    .guide_box dd li{margin-bottom:0.5px; list-style:decimal; margin-left:2vh;}
    .guide_box dd li.none {list-style:none; margin-left:0}
    .guide_box dd span {color:#FF1D1D;vertical-align:top;font-weight:bold;}
    .guide_box dd:last-child {margin:0}
       
      /* 폰 가로, 태블릿 세로*/     
      @@media only screen and (max-width: 374px)  {
 
    }
    /* 태블릿 세로 */
        @@media only screen and (min-width: 375px) and (max-width: 640px) {     

        }
    /* 태블릿 가로, PC */
        @@media only screen and (min-width: 641px) {    

        } 

    </style>

    <div id="Container" class="Container NSK c_both">

        <div class="evtCtnsBox dday NSK-Thin" data-aos="fade-down">
            <strong class="NSK-Black">이벤트 마감 <span id="ddayCountText"></span> </strong>
            <a href="#apply">수강신청 ></a>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2551_mtop.jpg" alt="새봄맞이 이벤트">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2551_m01.jpg" alt="원하는 강의 자유선택">
        </div>     

        <div class="evtCtnsBox mb50 evt_apply" data-aos="fade-up" id="apply">
            <div class="tabs">
                <a href="#tab01" class="active">5급/외교원<br>예비순환</a>
                <a href="#tab02">5급/외교원<br>GS1순환</strong></a>
                <a href="#tab03">5급/외교원<br>GS2순환</strong></a>
                <a href="#tab04">PSAT/5급<br>헌법</strong></a>              
            </div>

            <div id="tab01" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
                @endif 
            </div> 

            <div id="tab02" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
                @endif 
            </div> 

            <div id="tab03" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.m.promotion.display_product_partial',array('group_num'=>3))
                @endif 
            </div> 

            <div id="tab04" class="tabContents">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.m.promotion.display_product_partial',array('group_num'=>4))
                @endif 
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">새로운 시작! 새봄맞이 동영상 이벤트 </h2>
                <dl>
                    <dt>이벤트내용 : 이벤트기간 결제시 자동적용</dt>
                    <dd>
                        <ol>    
                            <li>예비순환 :<br>
                                - 이벤트기간 결제시 : 20%할인<br>
                                - 2강좌이상결제시 : 약25%할인<br>
                                - 3강좌이상결제시 약30%할인</li>
                            <li>GS1순환<br>
                            - 이벤트기간 결제시 : 20%할인<br>
                            - 2강좌이상결제시 : 약25%할인<br>
                            - 3강좌이상결제시 약30%할인</li>
                            <li>GS2순환<br>
                            - 이벤트기간 결제시 : 40%할인</li>
                            <li>PSAT<br>
                            - 이벤트기간 결제시 : 15%할인<br>
                            - 2강좌이상결제시 : 약20%할인<br>
                            - 3강좌이상결제시 약30%할인</li>
                            <li>5급헌법<br>
                            - 이벤트기간 : 40%할인
                            </li>
                        </ol>
                    </dd>
                    <dt>환불관련</dt>
                    <dd>
                        <ol>
                            <li>본상품은 이벤트 진행강의로 강의환불시 동영상 단가 정가금액과 원수강일수기준으로 수강한 횟차를 제외한 수강하지 않은 강의 횟차에 대해 환불이 진행됩니다.<br>
                            다만, 원수강일수가 지난 강의는 환불이 되지 않습니다. 기타 환불규정은 약관의 규정에 따릅니다.</li>
                            <li>본 이벤트는 복지할인쿠폰 등 다른 쿠폰과 중복적용되지 않습니다.</li>                                       
                        </ol>
                    </dd>
                    <dt>수강 시작일</dt>
                    <dd>
                        <ol>
                            <li>수강시작일은 30일 범위내에서 설정 가능하시며, 수강시작일 변경을 원하실 경우 동영상 게시판에 글을 남겨주시면 90일 범위내에서 변경하여 드리겠습니다. 본 이벤트는 내부사정에 의해 사전공지없이 종료 또는 변경될 수 있습니다.</li>                                  
                        </ol>
                    </dd>
                    <dt>기기대수 제한 및 배수 제한</dt>
                    <dd>
                        <ol>
                            <li>새봄맞이 이벤트 강의는 아래와 같이 기기대수제한 및 강의배수제한규정이 적용됩니다.</li>
                            <li><span>기기대수제한 2대</span> (PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대)<br>
                            * PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능)
                            </li>
                            <li>강의배수제한 : <span>GS2순환 강의는 강의배수 1.2배수 제한규정이 적용</span>됩니다.</li>
                        </ol>
                    </dd>                   
                </dl>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();

            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabs a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabs a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });

            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop