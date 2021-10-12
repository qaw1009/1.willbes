@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {width:100% !important;min-width:1120px !important;margin-top:20px !important;padding:0 !important;background:#fff;}
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/
        .sky {position:fixed;top:150px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px; text-align:center}
        .evt00 {background:#0a0a0a}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2375_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#40273c}

        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/10/2375_02_bg.jpg) no-repeat center top;}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/10/2375_04_bg.jpg) no-repeat center top;}

        .evt05 {background:#454340}
        .evt06 {background:#696662}
        .evt07 {background:#807c78}

        /*이용안내*/
        .evtInfo {padding:100px 0;background:#ededed}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px;color:#3a3a3a;}
        .guide_box dt{margin-bottom:10px; display:inline-block;font-weight:bold; font-size:17px; border-radius:30px;color:#3a3a3a;font-size:25px;}
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;color:#3a3a3a;font-size:15px}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px;}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#event01">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_sky01.png" alt=""/>
            </a>
            <a href="#event02">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_sky02.png" alt=""/>
            </a>
            <a href="#event03">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_sky03.png" alt=""/>
            </a>
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_top.gif" alt="리얼 후기"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_01.jpg" alt="수강후기 쓰고 교재 득템하자" data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_02.jpg" alt="신광은경찰팀이 쏜다" />  
        </div>

        <div class="evtCtnsBox evt03">
            <div class="wrap" data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_03.jpg" alt="수강후기 작성 방법" />
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2368" target="_blank" title="신규가입하기" style="position: absolute; left: 66.61%; top: 12.64%; width: 12.95%; height: 2.63%; z-index: 2;"></a>
                <a href="https://www.willbes.net/classroom/on/list/ongoing" target="_blank" title="수강후기 작성하기" style="position: absolute; left: 25%; top: 84.56%; width: 49.64%; height: 5.31%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_04.jpg" alt="감사드립니다." />
        </div>

        <div class="evtCtnsBox evt05" id="event01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_05.jpg" alt="이벤트1" data-aos="fade-left"/>
                <a href="#none" title="pass받기" style="position: absolute; left: 20.63%; top: 74.1%; width: 16.79%; height: 5.52%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt06" id="event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_06.jpg" alt="이벤트2" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox evt07" id="event03">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_07.jpg" alt="이벤트3" data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt08">
            <div class="wrap" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2375_08.jpg" alt="" />
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="홍보 이미지 다운" style="position: absolute; left: 27.23%; top: 51.76%; width: 47.59%; height: 7.48%; z-index: 2;"></a>
                <a href="" title="경시모" target="_blank" style="position: absolute; left: 26.96%; top: 80.46%; width: 6.43%; height: 17.1%; z-index: 2;"></a>
                <a href="" title="경꿈사" target="_blank" style="position: absolute; left: 36.88%; top: 80.46%; width: 6.43%; height: 17.1%; z-index: 2;"></a>
                <a href="" title="닥공사" target="_blank" style="position: absolute; left: 46.61%; top: 80.46%; width: 6.43%; height: 17.1%; z-index: 2;"></a>
            </div>
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N')){{--기존SNS예외처리시--}}
        @endif 

        <div class="evtCtnsBox evtInfo" id="info">
            <div class="guide_box" >
                <h2 class="NSK-Black" >윌비스 신광은경찰학원 수강후기 이벤트 이용안내</h2>
                <dl>
                    <dt>14일 PASS 이벤트 유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 ID당 1회만 참여 가능합니다.</li>
                            <li>이벤트 참여일로부터 14일간 신광은경찰팀 전 강좌를 자유롭게 수강 가능합니다.</li>
                            <li>해당 14일 PASS는 [내강의실 > 수강중인 강의 > 패키지강좌]에서 확인하시기 바랍니다.</li>
                            <li>이벤트 혜택으로 지급된 PASS는 연장 및 환불이 불가능합니다.</li>
                        </ol>
                    </dd>
                    <dt>11월 신규강의 이벤트 유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 중복 참여는 가능하나, 당첨은 ID당 최대 1회 가능합니다.</li>
                            <li>본 이벤트와 관련이 없는 게시물의 경우 관리자에 의해 삭제될 수 있습니다.</li>
                            <li>당첨자는 [내강의실]에 지급된 강의를 확인하시기 바랍니다.</li>
                            <li>이벤트 혜택으로 지급된 강의는 환불이 불가능합니다.</li>
                            <li>당첨자 발표는 윌비스신광은경찰 온라인 [공지사항]에서 확인 가능합니다.</li>
                            <li>학원 사정으로 인해 당첨자 발표 및 상품 지급일이 변경될 수 있습니다.</li>
                        </ol>
                    </dd>
                    <dt>소문내기 이벤트 유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 ID당 1회만 참여 가능합니다.</li>
                            <li>당첨자는 추첨을 통해 선별되며 윌비스신광은경찰 온라인 [공지사항]에서 확인 가능합니다.</li>
                            <li>본 이벤트와 관련이 없는 게시물의 경우 관리자에 의해 삭제될 수 있습니다.</li>
                            <li>부정한 방법으로 이벤트에 참여하거나, 타인의 게시글 도용 시 당첨자에서 제외됩니다.</li>
                            <li>게시글 삭제 및 비공개 처리 등의 이유로 URL 조회가 안되는 경우 당첨자에서 제외됩니다.</li>
                            <li>학원 사정으로 인해 당첨자 발표일이 변경될 수 있습니다.</li>
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <!-- End evtContainer -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
    
@stop