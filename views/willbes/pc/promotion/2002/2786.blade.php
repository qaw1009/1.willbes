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

        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:15px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li .mock_test {font-size:16px;font-weight:400;line-height:1.75;}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none;padding-right:10px; padding-top:10px;width:30%;}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .evt_top {background:#a07c57; overflow: hidden;}
        .evt_top .ani{position:absolute; left:50%; top:-75px; margin-left:-75px; z-index: 1;}

        .wb_01 {background:#121212}          
        .wb_02 {background:#f7f7f7;} 
        .wb_04 {background:#707070;} 


        /*이용안내*/        
        .wb_ctsInfo {background:#333; padding:100px 0}  
        .wb_ctsInfo div {
            width:980px; margin:0 auto; color:#fff; font-size:16px; line-height:1.5;
            font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#fff;} 
        .wb_ctsInfo div dt {font-size:19px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
            text-decoration:underline;color:#fff; font-weight:500}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
            color:#fff;
        }
        .wb_ctsInfo div dl:before{
            background: #fff none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2022/09/2786_sky01.png" alt="일정안내" ></a>
            <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2022/09/2786_sky02.png" alt="신청하기" ></a>
        </div>        

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        <span class="mock_test">2023년 전국모의고사</span><br>접수마감까지
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
        
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2786_top.jpg" alt="전국모의고사">
            <div class="ani">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2786_top_omr.png" alt="5월" data-aos="zoom-in">
            </div>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2786_01.jpg"  alt="과목개편"/>           
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2786_02.jpg"  alt="출제비율"/>           
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up" id="evt_01" >
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2786_03.jpg"  alt="출제비율"/>  
                <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=355437&" target="_blank" title="응시방법 안내" style="position: absolute; left: 20.09%; top: 86.71%; width: 29.29%; height: 6.47%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/mockTestNew/apply/cate/" target="_blank" title="신청하기" style="position: absolute; left: 50.8%; top: 86.65%; width: 29.29%; height: 6.47%;  z-index: 2;"></a>  
            </div>       
		</div>

        <div class="evtCtnsBox wb_04" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/09/2786_04.jpg"  alt="지금 응시하세요"/>           
		</div>

     
        <div class="evtCtnsBox wb_05" data-aos="fade-up" id="evt_02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2786_05.jpg"  alt="시간표 및 장소" />
                <a href="javascript:void(0)" onclick="giveCheck()" title="할인쿠폰 받기" style="position: absolute; left: 29.91%; top: 48.2%; width: 39.82%; height: 4.7%; z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute; left: 57.14%; top: 66.24%; width: 29.29%; height: 6.26%; z-index: 2;"></a> 
            </div>
		</div>    


        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="wb_ctsInfo" id="ctsInfo" data-aos="fade-up">
            <div>
                <h3 class="NSK-Black">응시자 유의사항</h3>
                <dd>
                    <dt>유의사항</dt>
                    <dl>학원 실강패스 수강생은 응시 지역별 학원 상담실 문의해 주시기 바랍니다. 모든 고사장 주차 불가합니다.</dl> 
                    <dl>시험 응시생이 많아 혼잡이 예상되오니 대중교통을 이용해 주시기 바랍니다. 반드시 본인이 응시할 학원으로 신청 바랍니다.</dl>                   
                </dd>                
                <dd>
                    <dt>고사장 입실</dt>
                    <dl>교시험당일 09:40까지 해당 고사장으로 반드시 입실해야합니다.</dl>
                    <dl>시험 종료 후 시험감독관의 지시가 있을때까지 퇴실할 수 없으며, 모든 답안지는 반드시 제출하여 주십시오.</dl>
                    <dl>본인이 신청한 학원에서만 응시할 수 있습니다.</dl>
                </dd>
                <dd>
                    <dt>신분증 지참</dt>
                    <dl>본인 확인을 위해 응시표(응시 전 발송 된 문자 메시지 확인 가능)와 공공기관이 발행한 
                    신분증(주민등록증, 여권, 운전면허증, 주민등록번호가 포함된 장애인등록증(복지카드 중 하나)을 반드시 소지하여야 합니다.</dl>
                </dd>
                <dd>
                    <dt>기타사항</dt>
                    <dl>모의고사문의 : 각 학원에 문의</dl>
                    <dl>성적공지일 추후공지</dl>
                </dd>
            </div>
        </div>
       
	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('전국 모의고사 할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop