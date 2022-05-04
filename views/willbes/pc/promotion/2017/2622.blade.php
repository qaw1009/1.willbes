@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2022/04/2622_top_bg.jpg") no-repeat center top;}

        .evt01 {background:url("https://static.willbes.net/public/images/promotion/2022/04/2622_01_bg.jpg") no-repeat center top;}

        .evt03 {background:#edf6f5}

        .evt04 {background:#2a036e}

        .evtInfo {color:#333; font-size:16px; padding:100px 0}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:40px}
        .evtInfoBox div {font-size:20px; font-weight:bold; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:40px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:5px}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2622_top.jpg" alt="이경범 교육학 합격응원 프로젝트"/>
                <a href="#evt02" title="" style="position: absolute; left: 18.48%; top: 83.96%; width: 61.88%; height: 7.95%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2622_01.jpg" alt="후기"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2622_02_01.jpg" alt="교육학 고득점 커리큘럼"/>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2622_02_02.jpg" alt="강의신청" id="evt02"/>
                {{--
                <a href="https://ssam.willbes.net/lecture/show/cate/3134/pattern/only/prod-code/193839" title="열공응원 1" target="_blank" style="position: absolute; left: 10.89%; top: 75.5%; width: 31.52%; height: 6.75%; z-index: 2;"></a>
                @if(time() < strtotime('202204181000'))
                <a href="#none" onclick="javascript:alert('4월18일(월) 10시부터 신청할 수 있습니다. ');" title="열공응원 2" style="position: absolute; left: 57.59%; top: 75.5%; width: 31.52%; height: 6.75%; z-index: 2;"></a>
                @else
                <a href="https://ssam.willbes.net/pass/offLecture/show/cate/3138/prod-code/193840" target="_blank" title="열공응원 2" style="position: absolute; left: 57.59%; top: 75.5%; width: 31.52%; height: 6.75%; z-index: 2;"></a>
                @endif
                --}}
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2622_03.jpg" alt="참여혜택"/>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2622_04.jpg" alt="이제 선생님 차례입니다."/>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[필독] 유의사항</h4>
                <div>[7일 무료체험 이벤트 유의사항]</div>
                <ul>
                    <li>본 이벤트는 교원임용시험을 도전하는 신규수강생 참여 가능한 이벤트 입니다.(기존 수강생은 참여할 수 있으나 혜택을 받을 수 없습니다)</li>
                    <li>강의제공방식<br>
                    - 강의체험기간은 7일이며, 강의시간은 1배수 형태로 제공됩니다. (※ 1배수란? 강의진행 시간만큼만 재생이 가능합니다)</li>
                    <li>강의체험에 필요한 교재는 별도로 구매하셔야 합니다.</li>
                    <li>무료체험강의는 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다.</li>
                </ul>
                <div>[70%할인  5~6월반 수강신청 이벤트 유의사항]</div>
                <ul>
                    <li>본 이벤트는 정가에서 70%할인하여 이벤트 기간에만 선착순 50명만 수강가능한 상품입니다. </li>
                    <li>해당강의는 실강으로만 진행되는 강좌이며, 인강전환이 불가합니다.</li>
                    <li>특별할인해서 기간한정으로 일시적으로만 판매되는 강좌이므로 수업시작 후 환불이 불가합니다.</li>
                    <li>강의에 필요한 교재는 별도로 구매하셔야 합니다.</li>
                    <li>강의는 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다.</li>
                </ul>
                <div>[참여혜택]</div>
                <ul>
                    <li>본 혜택은 참여한 모든 분들께 3~4월 논객반 및 하반기패키지 10%할인쿠폰 지급됩니다. 유료강의 신청시 쿠폰 사용하여 결재하시면 됩니다.</li>
                    <li>본 혜택은 참여한 모든 분들께 추첨을 통하여 20명 교재를 증정해드립니다.<br>
                    (추첨 발표는 5월 3일 윌비스 홈페이지이 공지사항 게시_개별통보)</li>
                    <li>본 혜택은 기존 패키지 수강생들은 혜택에서 제외됩니다. </li>
                </ul>
            </div>
        </div>  
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            AOS.init();
        });
    </script>
@stop