@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">

    <!-- Container -->
    <div class="p_re evtContent NSK-Thin" id="evtContainer">
        @include('willbes.pc.promotion.2001.1352_top')

        <div class="evtCtnsBox">
            <div class="sub_warp">
                <div class="sub4_1">
                    <h2>시험총평 및 기출해설</h2>
                    <table cellspacing="0" cellpadding="0" class="boardTypeB">
                        <col />
                        <tr>
                            <th width="15%">과목</th>
                            <th width="20%">교수 </th>
                            <th>강의명</th>
                            <th width="10%">자료</th>
                            <th width="10%">강의 </th>
                        </tr>
                        {{-- 상세설정데이터 및 WBS 마스터강의코드, WBS 마스터강의에 등록된 첨부파일 체크 --}}
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                <tr>
                                    <td>{{ $row['SubjectName'] }}</td>
                                    <td>
                                        @if(empty($row['ReferValue']) === false)<img src="{{ $row['ReferValue'] }}" title="{{ $row['ProfNickName'] }} 교수">@endif {{ $row['ProfNickName'] }} 교수
                                    </td>
                                    <td>{{ $row['OtherData2'] }}</td>
                                    <td>
                                        @if(empty($row['wUnitAttachFile']) === false)
                                            <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}" class="btn_data" target="_blank" alt="해설자료"></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(empty($row['wHD']) === false)
                                            <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');" class="btn_lec" alt="해설강의"></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">준비중 입니다.</td>
                            </tr>
                        @endif
                    </table>
                </div>

                <div class="m_section3_5">시험지 및 정답 다운로드
                    <a href="http://public.jinhakapply.com/PoliceV2/data/notice_list.aspx?ReturnSite=SC&ServiceID=19&CategoryID=3&CurrentPage=1" target="_blank">바로가기 ▶</a>
                </div>
            </div>
        </div>
        <!--evtCtnsBox//-->

    </div>
    <!-- End Container -->

    <!-- WIDERPLANET  SCRIPT START 2019.2.18 -->
    <div id="wp_tg_cts" style="display:none;"></div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mt4').addClass('active');
        });

        var wptg_tagscript_vars = wptg_tagscript_vars || [];
        wptg_tagscript_vars.push(
            (function() {
                return {
                    wp_hcuid:"",   /*고객넘버 등 Unique ID (ex. 로그인  ID, 고객넘버 등 )를 암호화하여 대입.
				*주의 : 로그인 하지 않은 사용자는 어떠한 값도 대입하지 않습니다.*/
                    ti:"30030",	/*광고주 코드 */
                    ty:"Home",	/*트래킹태그 타입 */
                    device:"web"	/*디바이스 종류  (web 또는  mobile)*/

                };
            }));
    </script>
    <!-- WIDERPLANET  SCRIPT START 2019.2.18 -->
    <div id="wp_tg_cts" style="display:none;"></div>
    <script type="text/javascript">
        var wptg_tagscript_vars = wptg_tagscript_vars || [];
        wptg_tagscript_vars.push(
            (function() {
                return {
                    wp_hcuid:"",   /*고객넘버 등 Unique ID (ex. 로그인  ID, 고객넘버 등 )를 암호화하여 대입.
				*주의 : 로그인 하지 않은 사용자는 어떠한 값도 대입하지 않습니다.*/
                    ti:"30030",	/*광고주 코드 */
                    ty:"Home",	/*트래킹태그 타입 */
                    device:"web"	/*디바이스 종류  (web 또는  mobile)*/

                };
            }));
    </script>
    <script type="text/javascript" async src="//cdn-aitg.widerplanet.com/js/wp_astg_4.0.js"></script>
    <!-- // WIDERPLANET  SCRIPT END 2019.2.18 -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69505110-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-69505110-4');
    </script>
    <script type="text/javascript" charset="UTF-8" src="//t1.daumcdn.net/adfit/static/kp.js"></script>
    <script type="text/javascript">
        kakaoPixel('6331763949938786102').pageView('willbescop');
    </script>
@stop