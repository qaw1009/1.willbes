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
            background:#fff;}
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto;}
        .evtContent .evt_wrap {width:1120px; margin:0 auto; position: relative;}
        
        /************************************************************/

        /*타이머*/
        .time {width:100%; text-align:center; background:#ffd4d3}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:30px; color:#000; letter-spacing: -1px; text-align:left}
        .time span {color:#ffda39; font-size:30px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:30px;}
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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/06/2231_top_bg.jpg) no-repeat center top;}      

        .wb_02 {position:relative; overflow:hidden;background:url(https://static.willbes.net/public/images/promotion/2021/06/2231_02_bg.jpg) no-repeat center top;}
        .topimg01 {position:absolute;top:915px; width:1111px; margin-left:-556px;left:50%;z-index:1;}

        .rulletBox {position:absolute; top:649px; width:810px; left:50%; margin-left:-410px; z-index:5}
        .rulletBox .btn-roulette {position:absolute; top:0; width:255px; 
            height:255px; left:50%; padding:0; margin:0; margin-left:-127px; background:none; z-index:6}
        .rulletBox a {position:absolute; top:350px; left:650px; width:80px; height:80px; line-height:60px; color:#000; background:#fff; 
            border-radius:40px;
            border:10px solid #000; z-index:6}
        .rulletBox a:hover {background:#F84671; color:#fff}

        .wb_03 {background:#f2f1f1}

        .wb_05 {background:#303132}

        .giftPopupWrap {
            position:absolute; 
            background: rgba(0, 0, 0, 0.6);
            filter: alpha(opacity=60);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;            
            width: 100%;
            height: 100%;  
            z-index: 105;        
        }
        .giftPop {width:786px; margin:100px auto 0; position:relative}
        .giftPop span {display:block; position:absolute; top:343px; width:100%; text-align:center; z-index:10}

        /* 이용안내 */
        .wb_info {padding:100px 0; background:#fff; color:#3a3a3a}
        .guide_box{width:980px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px; }
        .guide_box dt{margin-bottom:10px; color:#3a3a3a; background:#fff; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:17px;}        
        .guide_box dd{color:#3a3a3a; margin:0 0 20px 5px; line-height:17px}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:14px;font-weight:bold;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="giftPopupWrap" id="giftPopupWrap" style="display:none;">
            <div class="giftPop">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2231_rull_popup.png" alt="당첨팝업" usemap="#Map1950pop" border="0"/>
                <map name="Map1950pop" id="Map1950pop">
                    <area shape="rect" coords="637,85,715,163" href="#none" onClick="closeWin('giftPopupWrap')" alt="닫기" />
                </map>
                {{-- 상품이미지 01 ~ 08 --}}
                <span id="gift_box_id"></span>
            </div>
        </div>

         <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>                    
                    <td class="time_txt"><span>이벤트 종료까지</span></td>
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
                    <td><span>남았습니다.</td>
                    </tr>
                </table>                
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2231_top.jpg" alt="합격해볼랫?"/>
        </div>

        <div class="evtCtnsBox wb_01">
            <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2231_01.gif" alt="룰렛 참여방법"/>
            </a>
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2231_02.jpg" alt="100% 당첨"/>
            <div class="topimg01"><img src="https://static.willbes.net/public/images/promotion/2021/06/2231_img01.png" alt="야자수"/></div> 
            <div class="rulletBox">
                <canvas id="box_roulette" class="tutCanvas" width="810" height="810">Canvas not supported</canvas>
                <button id="btn_roulette" class="btn-roulette" onclick="startRoulette('https://static.willbes.net/public/images/promotion/2020/12/1950_rull_gift0','png'); this.disabled=true;"><img src="https://static.willbes.net/public/images/promotion/2021/06/2231_rull_start.png" alt="start" /></button>
                <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
            </div>            
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2231_03.jpg" alt="월컴팩까지"/>
        </div>

        <div class="evtCtnsBox wb_04">
            <div class="evt_wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2231_04.jpg" alt="100% 열공"/>
                <a href="https://gall.dcinside.com/board/lists?id=government" target="_blank" title="" style="position: absolute;left: 21%;top: 86%;width: 14%;height: 8%;z-index: 2;"></a>
                <a href="https://cafe.daum.net/9glade" target="_blank" title="" style="position: absolute;left: 36%;top: 86%;width: 14%;height: 8%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="" style="position: absolute;left: 51%;top: 86%;width: 14%;height: 8%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/willbes" target="_blank" title="" style="position: absolute;left: 66%;top: 86%;width: 14%;height: 8%;z-index: 2;"></a>
            </div>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox wb_05">
            <div class="evt_wrap">         
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2231_05.jpg" alt="공무원 합격"/>
                <a href="https://pass.willbes.net/home/index/cate/3019" target="_blank" title="" style="position: absolute;left: 14.46%;top: 52.42%;width: 13%;height: 3.55%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3103" target="_blank" title="" style="position: absolute;left: 43.46%;top: 52.42%;width: 13%;height: 3.55%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3023" target="_blank" title="" style="position: absolute;left: 71.46%;top: 52.42%;width: 13%;height: 3.55%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3024" target="_blank" title="" style="position: absolute;left: 14.46%;top: 83.42%;width: 13%;height: 3.55%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3028" target="_blank" title="" style="position: absolute;left: 43.46%;top: 83.42%;width: 13%;height: 3.55%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/home/index/cate/3035" target="_blank" title="" style="position: absolute;left: 71.46%;top: 83.42%;width: 13%;height: 3.55%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">여름엔 열공! 룰렛 돌리고 합격 해볼랫?</h2>
                <dl>
                    <dt>&lt;룰렛 이벤트&gt;</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 이벤트 기간 내 윌비스 통합사이트 신규회원가입 및 [관심직렬]→[공무원] 체크 시에만 참여 가능합니다.</li>
                            <li>이벤트 기간 : 2021.6.7.(월)~6.17.(목)<br>
                                - 경품 지급 안내 : 2021.6.17.(목) 윌비스 공무원 온라인 공지사항 참조
                            </li>
                            <li>당첨 경품은 룰렛 이미지를 통해 바로 확인 가능하며, 부정한 방법을 통해 참여할 경우 당첨 대상에서 제외됩니다. <br>
                                (탈퇴 후 재가입 반복, 중복된 연락처로 가입, 매크로 사용 등)
                            </li>
                            <li>본 이벤트는 최초 1회에 한해 참여 가능하며, 당첨된 상품을 취소하거나 재참여하는 것은 불가합니다.</li>
                            <li>이벤트 경품은 당첨자 발표 이후 회원정보에 등록된 전화번호를 통해 발송 예정이오니, 당첨자 발표일 이전까지 정확한 개인정보를 입력해주시기 바랍니다.</li>
                            <li>지급되는 쿠폰/포인트는 발급일로부터 7일 이내 사용하실 수 있으며, 만료 시 재발급이 불가하므로 반드시 사용 가능 기간을 확인해주시기 바랍니다.</li>
                            <li>이벤트 경품은 거래처 사정에 의해 동일한 가격의 다른 상품으로 변경될 수 있습니다.</li>
                            <li>준비된 경품이 소진될 경우, 이벤트는 조기마감될 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dt>&lt;소문내기 이벤트&gt;</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 로그인 후 참여 가능합니다.</li>
                            <li>이벤트 기간 : 2021.6.7.(월)~6.17.(목)<br>
                                - 경품 지급 안내 : 2021.6.17.(목) 윌비스 공무원 온라인 공지사항 참조
                            </li>
                            <li>이벤트 기간 외 참여 후 인증한 URL은 이벤트 정상 참여로 인정되지 않습니다.</li>
                            <li>지정된 커뮤니티 외 타 커뮤니티/SNS 등에 작성한 글은 인정되지 않습니다.</li>
                            <li>이벤트 종료일을 기준으로 삭제/수정된 글 및 비공개 처리된 글은 정상 참여로 인정되지 않습니다.</li>
                            <li>다양한 커뮤니티에 다양한 내용으로 참여 시 당첨확률이 올라갑니다.</li>
                            <li>소문내기 글 제목에 "윌비스", "룰렛" 키워드가 반드시 포함되어야 정상 참여로 인정됩니다.</li>                            
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>
    </div>        
    <!-- End Container -->

    <script type="text/javascript">        
        /*디데이카운트다운*/
          $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
    @include('willbes.pc.promotion.roulette_script')    
@stop