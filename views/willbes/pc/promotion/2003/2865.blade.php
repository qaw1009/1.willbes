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

        /*타이머*/
        .time {background:#e4e4e4; width:100%; padding:15px 0 40px;}
        .time {text-align:center; padding:20px 0}
        .time table {width:1000px; margin:0 auto}
        .time table td {line-height:1.2; color:#000;}        
        .time table td img {width:65%}
        .time .time_txt {font-size:30px;  letter-spacing: -1px; text-align:right}
        .time span {color:#ffda39; font-size:30px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:30px;}
        @@keyframes upDown{
            from{color:#555}
            50%{color:#ff3837}
            to{color:#555}
        }
        @@-webkit-keyframes upDown{
            from{color:#555}
            50%{color:#ff3837}
            to{color:#555}
        }

        .sky {position:fixed; top:150px; right:10px;z-index:1;}
        .sky a {display:block; margin-bottom:10px;}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/01/2865_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#F3F4F6}

        .evt_02 {background:#418EF6}

        .evt_03 {background:#e5e1d6;padding-bottom:50px}
        .evt_03 > div a {margin:0 7px}
        .evt_03 .wrap > a {display:block; margin:45px 0 0}

        .evt_04 {background:#e5e1d6;}

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#f4f4f4; color:#363636; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px;}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dl{color:#555;font-size:15px;}
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
        <div class="evtCtnsBox time NSK-Black" id="newTopDday" data-aos="fade-down">
            <div>
                <table>
                    <tr>                    
                        <td class="time_txt">이벤트 마감일<br><span> 1/10(화)</span>까지</td>
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
                        <td>남았습니다.</td>
                    </tr>
                </table>                
            </div>
        </div>
        {{--
        <div class="sky" id="QuickMenu">          
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2021/12/2160_sky01.png"  title="12월의기적" /></a>
        </div>
        --}}
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2865_top.jpg" alt="신년 이벤트"/>        
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2865_01.jpg" alt="복많이 받아가세요" />
        </div>
        
        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2865_02.jpg" alt="쿠폰 내려온다" />
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx1'] or ''}}'); return false;" title="단과 할인 쿠폰 다운로드" style="position: absolute;left: 2.98%;top: 67.24%;width: 31.01%;height: 7.98%;z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx2'] or ''}}'); return false;" title="패키지 할인 쿠폰 다운로드" style="position: absolute;left: 34.58%;top: 67.24%;width: 31.01%;height: 7.98%;z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx3'] or ''}}'); return false;" title="pass 할인 쿠폰 다운로드" style="position: absolute;left: 65.78%;top: 67.24%;width: 31.01%;height: 7.98%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt_03" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2865_03.jpg" alt="여러분의 합격"/>
                <div>
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/201798" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/01/2865_03_01.png" alt="9급"/></a>
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3022/pack/648001/prod-code/201800" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/01/2865_03_02.png" alt="세무직"/></a>
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/204192" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/01/2865_03_03.png" alt="농업직"/></a>
                </div>
                <div class="mt40">
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3024/pack/648001/prod-code/204389" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/01/2865_03_04.png" alt="군무원"/></a>
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/204388" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/01/2865_03_05.png" alt="소방"/></a>
                </div>               
            </div>
        </div>

        <div class="evtCtnsBox evt_04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2865_04.jpg" alt="최우영/장사원" />
                <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/204384" title="통신직 이론" target="_blank" style="position: absolute;left: 39.68%;top: 12.24%;width: 20.51%;height: 3.68%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/204193" title="9급 전기직 이론" target="_blank" style="position: absolute;left: 39.68%;top: 21.44%;width: 20.51%;height: 3.68%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/204382" title="7/9급 전기직 이론" target="_blank" style="position: absolute;left: 39.68%;top: 30.77%;width: 20.51%;height: 3.68%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/204383" title="전작직 이론" target="_blank" style="position: absolute;left: 39.68%;top: 40.04%;width: 20.51%;height: 3.68%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/204385" title="농업직 9급 전과목" target="_blank" style="position: absolute;left: 39.68%;top: 65.64%;width: 20.51%;height: 3.68%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/203596" title="농업직 9급 문제풀이" target="_blank" style="position: absolute;left: 39.68%;top: 78.44%;width: 20.51%;height: 3.68%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 <span>2023년 신년 할인 </span>EVENT</h2>
                <dl>
                    <dt>이용안내</dt>
                    <dd>
                        <ol>
                            <li>이벤트 기간 : 2023.1.2.(월)~2023.1.10.(화)</li>
                            <li>
                                본 이벤트 안내된 9급/세무/농업/군무/소방 PASS 과정은 즉시할인 + 쿠폰적용 추가 할인(다운로드 후 적용) + 수강지원 3만포인트 제공됩니다.<br>
                                단, 최우영 /장사원 교수 T-PASS과정은 쿠폰적용 추가 5만원 할인(다운로드 후 적용)만 제공됩니다.
                            </li>
                            <li>본 이벤트 진행 기간 내에는 발급받으신 이벤트 쿠폰이 추가로 적용 가능합니다.</li>
                            <li>2024 9급 행정/세무 0원 패스, 군무원/소방직 패스, 농업직패스, 최우영 이론 티패스/장사원 농업직 전과목 티패스는  이벤트 기간 내 판매되는 특별 기획 상품이므로 이벤트 기간 종료 후 수강료 인상 예정입니다.</li>                        
                            <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>                   
                        </ol>
                    </dd>
                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>9급/세무/농업/군무/소방 패스 구매시 자동지급 되는 (3만 포인트 교재구매시 활용가능)수강지원 포인트 사용 유무와 관계없이 환불 시에는 수강지원 포인트를 제한 후 기준으로 사용일수 만큼 차감하고 환불됩니다.<br>
                            · 결제금액 - 지급된 수강지원 포인트 - (강좌 정상가의 1일 이용대금X이용일수)</li>          
                        </ol>
                    </dd>
                </dl>
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

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

        {{--쿠폰발급--}}
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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop