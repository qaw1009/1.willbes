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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}

        /************************************************************/     
        .skybanner{position:fixed; top:220px; right:5px; z-index:1;}
        .skybanner li {margin-bottom:5px}
        .skybannerB{position: fixed; bottom:0; text-align:center; z-index: 1; background:#51d68e; width:100%}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/11/1408_top_bg.jpg) no-repeat center top;}     
        
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1408_02_bg.jpg) no-repeat center top;}

        .evt03 {background:#f9f9f9;padding-bottom:100px;}

         /* 슬라이드배너 */
        .slide_con {position:relative; width:900px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px;}
        .slide_con p.rightBtn {right:-100px;}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4 li img {width:100%}
        #slidesImg4:after {content::""; display:block; clear:both}           

        .evt04 {background:#eeede9;}  
        .evt04_1 {background:#51d68e;}  
        .evt04_1 ul {width:940px; margin:0 auto;} 
        .evt04_1 li {display:inline; float:left; width:50%} 
        .evt04_1 li a {display:block; padding:20px 0; font-size:20px; font-weight:bold; color:#fff; background:#52d58f; border:3px solid #fff; text-align:center;}    
        .evt04_1 li a:hover,
        .evt04_1 li a.active {background:#fff; color:#52d58f}
        .evt04_1 li:last-child a {margin-left:10px}   
        
        /* tip */
        .wb_cts05 {background:#fff; text-align:left; padding:100px 0}
        .wb_tipBox {width:980px; margin:0 auto; line-height:1.5;}
        .wb_tipBox > strong {font-size:16px !important; font-weight:bold; color:#333; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-3px; margin:30px 0 10px; color:#111}	
        .wb_tipBox ol li {margin-bottom:10px; list-style:decimal; margin-left:15px}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec;}	
        .wb_tip_orange {font-size:12px; color:#c03011;}
        .tabCts {padding:0 20px}

        /*TAB_tip*/
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:50%;}
        .tab02 li a { display:block; text-align:center; font-size:14px; font-weight:bold; background:#323232; color:#fff; padding:14px 0; border:1px solid #323232; margin-right:2px}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #666; border-bottom:1px solid #fff}
        .tab02 li:last-child a {margin:0}
        .tab02:after {content:""; display:block; clear:both}
  
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <div class="p_re evtContent NGR" id="evtContainer"> 
        <ul class="skybanner">
            <li><a href="https://pass.willbes.net/pass/consultManagement/index" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_s2.jpg"/></a></li>
            <li><a href="https://pf.kakao.com/_kcZIu" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_s3.jpg"/></a></li>
            <li><a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1101" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_s4.jpg"/></a></li>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1408_top.gif" title="올백 모의고사"  />
        </div>    

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_02.jpg" title="고퀄리티 문항"  />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_03.jpg" title="올백모의 고사반"  />
            <div class="slide_con">
                <ul id="slidesImg4">                    
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con1.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con2.jpg" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con3.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con4.jpg" /></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con5.jpg" /></li>                 
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2019/09/arr_l.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2019/09/arr_r.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt04">           
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1408_04.jpg" title="올백모의 고사반"  />
        </div>

        <div class="evtCtnsBox evt04_1">           
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1408_04_1.jpg" usemap="#Map1408B" title="올백모의 고사반" border="0"  />
            <map name="Map1408B" id="Map1408B">
                <area shape="rect" coords="163,521,491,585" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="9급" />
                <area shape="rect" coords="165,586,488,647" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3050&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="소방공채" />
                <area shape="rect" coords="634,526,963,583" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="군무원" />
                <area shape="rect" coords="637,584,958,646" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3050&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="소방특채" />
                <area shape="rect" coords="164,903,492,966" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="7급" />
                <area shape="rect" coords="634,906,962,965" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="7급 외무영사직" />
                <area shape="rect" coords="166,1233,489,1295" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="9급 공통" />
                <area shape="rect" coords="634,1235,959,1293" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="7급공통" />
            </map>
        </div>

         <!--유의사항-->
        <div class="evtCtnsBox wb_cts05 NGR">
            <div class="wb_tipBox">
                <ul class="tab02">
                    <li><a href="#txt1">수강료 환불규정</a></li>
                    <li><a href="#txt2">기타</a></li>
                </ul>
                <div id="txt1" class="tabCts">
                    <p>수강료 환불규정</p>
                    <ol>
                    <li><strong>수강료 환불규정<span class="wb_tip_gray"> (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</span></strong><br />
                        <br />
                        <table>
                        <col />
                        <col />
                        <col />
                        <tr>
                            <th>수강료징수기간</th>
                            <th>반환 사유발생일</th>
                            <th>반환금액</th>
                        </tr>
                        <tr>
                            <td rowspan="4">1개월 이내인 경우</td>
                            <td>교습개시 이전</td>
                            <td>이미 납부한 수강료 전액</td>
                        </tr>
                        <tr>
                            <td>총 교습 시간의 1/3 경과 전</td>
                            <td>이미 납부한수강료의 2/3 해당</td>
                        </tr>
                        <tr>
                            <td>총 교습 시간의 1/2 경과 후</td>
                            <td>이미 납부한수강료의 1/2 해당</td>
                        </tr>
                        <tr>
                            <td>총 교습 시간의 1/2 경과 수</td>
                            <td>반환하지아니함</td>
                        </tr>
                        <tr>
                            <td rowspan="2">1개월 초과인 경우</td>
                            <td>교습 개시 이전</td>
                            <td>이미 납부한 수강료 전액</td>
                        </tr>
                        <tr>
                            <td>교습 개시 이후</td>
                            <td>반환 사유가발생한 당해 월의 반환대상 수강료와</br />
                            나머지 월의 수강료 전액을 합산한 금액</td>
                        </tr>
                        </table>
                        <br />
                        ▷ 총 교습 시간은 개강월로부터 종강월까지의 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.</br />
                        ▷ 환불 접수는 학원 방문 접수만 가능하며, 수강증을 필히 제출하여야 합니다.</br />
                        ▷ 카드로 결제하신 경우 결제 하셨던 카드를 지참하셔야 하며, 현금/계좌이체로 결제하신 경우 수강생 본인 명의의 통장으로만 환불금 입금 처리됩니다.</br />
                        ▷ 환불 기준일은 실제 수강 여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다.</br />
                        ▷ 자습실, 사물함, 동영상 강좌, 단과 강좌 등 수강 혜택으로 제공된 모든 서비스는 환불 즉시 이용 정지 및 회수되며, 사용 여부와 상관없이 환불신청일까지 사용료를 산정하여 환불금액에서 공제합니다. </br />
                        <span class="wb_tip_orange">
                        - 사물함 사용료: 1개월-5,000원</br />
                        - 동영상 강좌: 1개월-35,000원</br />
                        - 단과 강좌: 해당 강좌 수강료</br />
                        - 그 외: 해당 물품 및 서비스의 판매가</br />
                        </span>
                        ▷ 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록 하셔야 합니다.</br />
                        ▷ 친구추천할인 이벤트 적용 대상자의 경우, 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결제 해야 환불이 진행됩니다.</br />
                    </li>
                    </ol>
                </div>
                <div id="txt2" class="tabCts">
                    <p>기타</p>
                    <ol>
                        <li><strong>커리큘럼</strong><br />
                        ▷ 커리큘럼은 시험일정이나 학원/강사의 사정에 따라 일부 수정될 수 있습니다.<br />
                        </li>
                        <li><strong>강사진</strong><br />
                        ▷ 강사진은 강사 개인사정이나 학원사정에 따라 변경될 수 있습니다.<br />
                        </li>
                        <li><strong>자습실 및 학원 운영시간</strong><br />
                        ▷ 학원 운영 시간: <span class="wb_tip_orange">월 ~ 금 06:30 ~ 22:50, 토 07:30 ~ 22:00, 일 08:00 ~ 21:00  </span> (자습실 운영시간은 학원 운영 시간과 동일합니다.)<br />
                        ▷ 데스크 운영 시간: <span class="wb_tip_orange"> 평일 08:30 ~ 20:00, 토요일 08:30 ~ 18:00 </span><br />
                        ▷ 사물함 등록/연장/반납, 교재구매, 수강환불 관련 업무시간 : <span class="wb_tip_orange"> 평일 09:00 ~ 18:00 </span><br />
                        ▷ 연휴 당일은 건물 휴무로 운영되지 않습니다.<br />
                        ▷ 기술직 강의는 남강빌딩에서 진행 됩니다.<br />
                        </li>
                        <li><strong>모의고사 프로그램</strong><br />
                        ▷ 본문 일정표와 동일하게 진행되나, 강사 혹은 학원사정에 따라 변경될 수 있습니다.<br />
                        ▷해설지는 시험종료 후 받아 볼 수 있으며, 성적표는 다음주 시험일에 확인 할 수 있습니다. <br />
                        ▷ 올백모의고사는 회당 결제가 불가능하며, 한 달에서 2~3개월 단위로 수강이 가능합니다.<br />
                        ▷ 개강 후 중도에 들어 올 시 지난 시험에 대한 시험지와 해설지는 제공되나 수강료차감은 없습니다.<br />
                        </li>
                        <li><strong>강의 수강</strong><br />
                        ▷ 수강 신청한 강의만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원 상품 등록이 불가할 수 있습니다.<br />
                        ▷ 등록하신 강좌는 본인만 수강이 가능하며, 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다. <br />
                        ▷ 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다. <br />
                        ▷ 강의는 학원/강사 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다. <br />(폐강 시, 환불 규정에 의거 환불 처리됩니다.)<br />
                        ▷ 개인 사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
                        ▷ 수강 확인은 수강증 검사가 수시로 진행되니 꼭 지참하시고 수강하시기 바랍니다.  (수강증 분실 및 미지참 등으로 강의 수강에 불편함이 발생할 수 있습니다.)<br />
                        </li>
                    </ol>
                </div>
            
            </div>
        </div>
        <!--wb_tip//-->

    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $regi_form = $('#regi_form');
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
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
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });

        });

        $(document).ready(function(){
            $('.tab02').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        ); 

        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var give_idx = $('input:radio[name="register_data1"]:checked').data('giveidx');

            if(!give_idx){
                alert('쿠폰을 선택하지 않아서 발급에 실패하였습니다.');
                return;
            }

            //다건 쿠폰 중복 발급 체크
            //arr_give_idx_chk: 콤마(,)를 붙여서 생성
            var arr_give_idx_chk = '';
            var give_overlap_chk = '';
            @if(empty($arr_promotion_params['give_type']) === false && $arr_promotion_params['give_type'] == 'coupons')
                arr_give_idx_chk = '&arr_give_idx_chk={{$arr_promotion_params['give_idx']}},{{$arr_promotion_params['give_idx2']}}';
            @endif
            @if(empty($arr_promotion_params['give_overlap_chk']) === false)
                give_overlap_chk = '&give_overlap_chk={{$arr_promotion_params['give_overlap_chk']}}';
            @endif


    var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&give_idx='+give_idx+'&event_code={{$data['ElIdx']}}'+arr_give_idx_chk;
    ajaxSubmit($regi_form, _check_url, function (ret) {
        if (ret.ret_cd) {
            alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
            location.reload();
            {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
        }
    }, showValidateError, null, false, 'alert');
    @else
    alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
    @endif
}
</script>

@stop