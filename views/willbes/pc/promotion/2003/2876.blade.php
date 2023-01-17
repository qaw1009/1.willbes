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

        .sky {position:fixed; top:150px; right:10px; z-index:2;}
        .sky a {display:block; margin-bottom:10px;}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/01/2876_top_bg.jpg) no-repeat center top;}
        .evt_top span {position:absolute; top:100px; left:50%; margin-left:-180px; z-index: 10;}

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2023/01/2876_01_bg.jpg) no-repeat center top;}
        .evt_01 span {position:absolute; left:50%; display:block; z-index:100;}
        .evt_01 span.imgL {width:431px; top:-50px; margin-left:-750px;}
        .evt_01 span.imgR {width:287px; margin-left:350px; bottom:0}

        .evt_02 {background:#f4f4f4}

        .evt_03 {padding-bottom:50px}


        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#f4f4f4; color:#363636; line-height:1.5; font-size:16px;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all}
        .guide_box .infotxt {font-size:18px; margin-bottom:20px; font-weight:bold}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:18px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dl{color:#555;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;font-size:14px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box span {color: #ca1919; vertical-align:top}
        .guide_box dd:last-child {margin:0}
    </style>


    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">          
            <a href="#evt01"><img src="https://static.willbes.net/public/images/promotion/2023/01/2876_sky1.png"  title="세뱃돈" /></a>
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2023/01/2876_sky2.png"  title="설선물" /></a>
            <a href="#evt03"><img src="https://static.willbes.net/public/images/promotion/2023/01/2876_sky3.png"  title="설다짐" /></a>
        </div>

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2876_top.jpg" alt="신년 이벤트"/> 
            <span data-aos="zoom-in" data-aos-delay="300"><img src="https://static.willbes.net/public/images/promotion/2023/01/2876_top_img.png" alt="복"/> </span>       
        </div>

        <div class="evtCtnsBox evt_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2876_01.jpg" alt="" />
                <a href="#evt01" title="세뱃돈" style="position: absolute; left: 21.07%; top: 28.81%; width: 16.07%; height: 42.15%; z-index: 2;"></a>
                <a href="#evt02" title="설선물" style="position: absolute; left: 41.61%; top: 28.81%; width: 16.07%; height: 42.15%; z-index: 2;"></a>
                <a href="#evt03" title="설다짐" style="position: absolute; left: 62.23%; top: 28.81%; width: 16.07%; height: 42.15%; z-index: 2;"></a>
            </div>
            <span data-aos="fade-right" data-aos-delay="300" class="imgL"><img src="https://static.willbes.net/public/images/promotion/2023/01/2876_01_imgL.png" alt="복"/> </span>  
            <span data-aos="fade-left" data-aos-delay="500" class="imgR"><img src="https://static.willbes.net/public/images/promotion/2023/01/2876_01_imgR.png" alt="복"/> </span> 
        </div>
        
        <div class="evtCtnsBox evt_02" data-aos="fade-up" id="evt01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2876_02.jpg" alt="쿠폰 내려온다" />
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx1'] or ''}}'); return false;" title="단과 할인 쿠폰 다운로드" style="position: absolute; left: 9.82%; top: 18.06%; width: 26.16%; height: 8.03%; z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx2'] or ''}}'); return false;" title="패키지 할인 쿠폰 다운로드" style="position: absolute; left: 36.7%; top: 18.06%; width: 26.16%; height: 8.03%; z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx3'] or ''}}'); return false;" title="pass 할인 쿠폰 다운로드" style="position: absolute; left: 63.39%; top: 18.06%; width: 26.16%; height: 8.03%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2502" target="_blank" title="9급" style="position: absolute; left: 35.63%; top: 47.62%; width: 28.21%; height: 1.92%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3023/code/2503" target="_blank" title="소방" style="position: absolute; left: 15.18%; top: 61.73%; width: 10.8%; height: 1.92%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3024/code/2721" target="_blank" title="군무" style="position: absolute; left: 34.73%; top: 61.73%; width: 10.8%; height: 1.92%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2838" target="_blank" title="농업직" style="position: absolute; left: 54.55%; top: 61.73%; width: 10.8%; height: 1.92%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2114" target="_blank" title="조경직" style="position: absolute; left: 74.02%; top: 61.73%; width: 10.8%; height: 1.92%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2433" target="_blank" title="국어 오대혁" style="position: absolute; left: 24.91%; top: 79.04%; width: 10.8%; height: 1.92%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2180" target="_blank" title="영어 한덕현" style="position: absolute; left: 44.73%; top: 79.04%; width: 10.8%; height: 1.92%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2434" target="_blank" title="한국사 김상범" style="position: absolute; left: 64.46%; top: 79.04%; width: 10.8%; height: 1.92%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2719" target="_blank" title="농업직 장사원" style="position: absolute; left: 20.36%; top: 92.68%; width: 21.52%; height: 1.92%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2256" target="_blank" title="전기통신 최우영" style="position: absolute; left: 57.68%; top: 92.68%; width: 21.52%; height: 1.92%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2876_03.jpg" alt="여러분의 합격" id="evt02"/><br> 
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2876_03_01.jpg" alt="여러분의 합격" id="evt03"/>       
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">유의사항</h2>
                <div class="infotxt">이벤트 참여 전 유의사항을 반드시 숙지해주시기 바랍니다.</div>
                <dl>
                    <dt>공통</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 윌비스 회원만 참여 가능합니다.</li>
                            <li>이벤트 기간은 2023년 01월 19일(목) - 2023년 01월 25일(수)까지 입니다.</li>
                            <li>이벤트는 당사 사정으로 별도 고지 없이 종료되거나 내용이 변경될 수 있습니다.</li>                   
                        </ol>
                    </dd>
                    <dt>계묘한 세뱃돈</dt>
                    <dd>
                        <ol>
                            <li>본 쿠폰은 계정 당 각각 최초 1회만 다운로드 가능합니다.</li>
                            <li>쿠폰은 중복 사용이 불가하며 한 상품 당 하나의 쿠폰만 적용 가능합니다.</li>
                            <li>이벤트 쿠폰의 유효 기간은 2023년 01월 25일 23시 59분까지이며 추후 재발급은 불가합니다.</li>          
                        </ol>
                    </dd>
                    <dt>계묘한 설선물</dt>
                    <dd>
                        <ol>
                            <li>이벤트 기간 내 강의 구매 시 자동으로 응모됩니다.</li>
                            <li>당첨자 발표 및 안내는 2023년 01월 27일(금) 16시 윌비스 공무원 온라인 공지사항에서 확인하실 수 있습니다.</li>
                            <li>당첨자 발표 공지사항을 통해 이벤트 경품 지급일이 안내될 예정이며, 제공되는 이벤트 경품은 파트너사의 사정에 의해 동일 금액의 유사상품으로 변경될 수 있습니다.</li>
                            <li>이미 지급된 경품에 대한 재 지급은 불가능하며 회원정보 오기입으로 인한 불이익은 당사에서 책임지지 않습니다. 이벤트 참여 후 회원정보에 등록된 전화번호를 확인해주시기 바랍니다.</li>          
                        </ol>
                    </dd>
                    <dt>계묘한 설다짐</dt>
                    <dd>
                        <ol>
                            <li>포인트는 계정 당 1회만 적립, 포인트 유효기간 30일, 해당 포인트는 댓글 작성시 자동지급 됩니다.</li>
                            <li>지나친 도배/욕설, 주제와 상관없는 댓글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</li>          
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>

    </div>
    <!-- End Container -->


    <script>
        /*쿠폰발급*/
        function giveCheck(give_idx) {
            $regi_form = $('#regi_form');

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)

            @if(strtotime(date('YmdHi')) >= strtotime($arr_promotion_params['edate']))
            alert('쿠폰발급 기간이 아닙니다.');
            return;
            @endif

            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&give_idx=' + give_idx;
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                }
            }, showValidateError, null, false, 'alert');
            @endif
        }
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">    
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
                AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop