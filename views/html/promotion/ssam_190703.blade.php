@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/
        .ev01 {background:url(http://file1.willbes.net/datassam/event/190703_top_bg.jpg) no-repeat center top; padding-bottom:100px}
        .ev01 .ev01play {width:845px; margin:0 auto; hegith:480px; line-height:480px; text-align:center; background:#000; color:#fff; font-size:20px;}

        .ev02 {background:#fff; width:1000px; margin:0 auto; padding:100px 0}
        .ev02 ul{border-top:2px solid #333; border-bottom:2px solid #333; margin-top:30px; margin-bottom:20px }
        .ev02 li {display:inline; float:left; width:50%; position:relative; height:140px; border-bottom:1px solid #ccc}
        .ev02 li img {position:absolute; top:20px; left:20px; width:105px; z-index:10}
        .ev02 .btnset {margin:20px 0 0 145px; text-align:left}
        .ev02 .btnset p {font-size:16px; font-weight:bold; margin-bottom:15px}
        .ev02 .btnset a {display:inline-block; height:34px; line-height:34px; text-align:center; color:#fff; font-size:14px; letter-spacing:normal; font-weight:500; margin-right:3px; margin-bottom:5px; padding:0 8px}
        .ev02 .btnset a.btn01 {background:#5f7080; border:1px solid #576371}
        .ev02 .btnset a.btn01:hover {background:#2d4e6d; border:1px solid #243f5a}
        .ev02 .btnset a.btn02 {background:#b77332; border:1px solid #a96d31}
        .ev02 .btnset a.btn02:hover {background:#b4450e; border:1px solid #a03e0d}
        .ev02 .btnset a.btn03 {background:#609746; border:1px solid #568841}
        .ev02 .btnset a.btn03:hover {background:#1f7009; border:1px solid #1b6108}
        .ev02 .btnset a.btn04 {background:#394B92; border:1px solid #394B92}
        .ev02 .btnset a.btn04:hover {background:#08088A; border:1px solid #08088A}
        .ev02 .btnset a.btn02_1 {width:200px}
        .ev02 ul:after {content:""; display:block; clear:both}

        .txtL {text-align:left; letter-spacing:normal}

        .ev03 {background:#5e6377} 
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            <img src="http://file1.willbes.net/datassam/event/190703_top.jpg" alt="실전모의고사 Real 해설강의"/>
            <div class="ev01play">
                <iframe width="845" height="480" src="https://www.youtube.com/embed/n3_OXqbjx78?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div><!--ev01//-->

        <div class="evtCtnsBox ev02">
            <img src="http://file1.willbes.net/datassam/event/190703_02.jpg" alt="Real 해설강의 교수진"/>
            <ul>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_lij.jpg" alt="교육학 이인재"/>
                    <div class="btnset">
                        <p>교육학 이인재 (국어, 영어, 중국어)</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                        <a href="#none" class="btn03">해설강의</a>
                        <a href="#none" class="btn04">석차</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_kch.jpg" alt="수학 김철홍"/>
                    <div class="btnset">
                        <p>전공수학 김철홍</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                        <a href="#none" class="btn03">해설강의</a>
                        <a href="#none" class="btn04">석차</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_hwi.jpg" alt="교육학 홍의일"/>
                    <div class="btnset">
                        <p>교육학 홍의일 (수학,생물, 윤리, 체육, 정컴)</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                        <a href="#none" class="btn03">해설강의</a>
                        <a href="#none" class="btn04">석차</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_pty.jpg" alt="전공수학 박태영"/>
                    <div class="btnset">
                        <p>전공수학 박태영</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                        <a href="#none" class="btn03">해설강의</a>
                        <a href="#none" class="btn04">석차</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_swy.jpg" alt="국어 송원영"/>
                    <div class="btnset">
                        <p>국어 송원영</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                        <a href="#none" class="btn04">석차1</a>
                        <a href="#none" class="btn04">석차2</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_yhj.jpg" alt="전공생물 강치욱/양혜정"/>
                    <div class="btnset">
                        <p>전공생물 강치욱/양혜정</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_lwg.jpg" alt="국어문법 이원근"/>
                    <div class="btnset">
                        <p>국어문법 이원근</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                        <a href="#none" class="btn04">석차1</a>
                        <a href="#none" class="btn04">석차2</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_kbc.jpg" alt="도덕윤리 김병찬"/>
                    <div class="btnset">
                        <p>도덕윤리 김병찬</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a> 
                        <a href="#none" class="btn04">석차</a> 
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_kys.jpg" alt="일반영어 김유석"/>
                    <div class="btnset">
                        <p>일반영어 김유석</p>
                        <a href="#none" target="_blank" class="btn02 btn02_1">해설강의/해설자료 바로가기</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_jss.jpg" alt="정보컴퓨터 장순선"/>
                    <div class="btnset">
                        <p>정보컴퓨터 장순선</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                        <a href="#none" class="btn04">석차</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_kym.jpg" alt="일반영어 김영문"/>
                    <div class="btnset">
                        <p>일반영어 김영문</p>
                        <a href="#none" target="_blank"  class="btn02 btn02_1">해설강의/해설자료 바로가기</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_skj.jpg" alt="정보컴퓨터 송광진"/>
                    <div class="btnset">
                        <p>정보컴퓨터 송광진</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                        <a href="#none" class="btn03">해설강의</a>
                        <a href="javascript:openFileCenter('2019/모의고사 석차/Real모고-정보컴퓨터 석차.pdf');" class="btn04">석차</a>
                    </div>
                </li>
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_gh.jpg" alt="영교론 공훈"/>
                    <div class="btnset">
                        <p>영교론 공훈</p>
                        <a href="#none" target="_blank" class="btn02 btn02_1">해설강의/해설자료 바로가기</a>
                    </div>
                </li>
                
                <li>
                    <img src="http://file1.willbes.net/datassam/event/190703_02_jkm.jpg" alt="중국어 정경미"/>
                    <div class="btnset">
                        <p>중국어 정경미</p>
                        <a href="#none" class="btn01">문제자료</a>
                        <a href="#none" class="btn02">해설자료</a>
                        <a href="#none" class="btn03">해설1</a>
                        <a href="#none" class="btn03">해설2</a>
                        <a href="#none" class="btn04">석차</a>
                    </div>
                </li>
            </ul>
            <div class="txtL">* 전공영어의 경우 모의고사 응시생 대상으로 해설강의/해설자료 제공</div>
        </div>

        <div class="evtCtnsBox ev03">
            <img src="http://file1.willbes.net/datassam/event/190703_03.jpg" alt="합격의 순간까지 윌비스 임용이 함께합니다."/>
        </div>
    </div>
    <!-- End Container -->
@stop