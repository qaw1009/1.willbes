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
        .ev01 {margin-bottom:100px}
        .table_wrap {width:1046px; margin:0 auto}
        .table_wrap table{margin-top:30px; border-top:1px solid #d0d2d9; background:#fff}
        .table_wrap table:first-of-type{margin-top:0}
        .table_wrap table td,
        .table_wrap table th{height:48px; padding:0 10px; border:1px solid #d0d2d9; border-left:0; border-top:0}
        .table_wrap table th{font-size:16px; color:#767987; font-weight:500; background:#dfe1e7}
        .table_wrap table td{font-size:15px; color:#444; padding:20px 15px; line-height:1.5;}
        .table_wrap table td div.tImg {width:150px; height:150px; overflow:hidden; margin:0 auto; border:1px solid #333; margin-bottom:10px}
        .table_wrap table td div img {width:100%}
        .table_wrap table tr:first-of-type th{border-top:1px solid #d0d2d9}
        .table_wrap table tr th:first-of-type,
        .table_wrap table tr td:first-of-type{border-left:1px solid #d0d2d9}
        .table_wrap table tr td:last-of-type{text-align:left; padding:20px 30px}
        .table_wrap table td p.txtSt01 {font-size:130%; color:#000}
        .table_wrap table td p.txtSt02 {font-size:110%; color:#6a5230}
        .table_wrap table td p strong {font-size:110%; font-weight:400; color:#000}
        .table_wrap table td .btnSet {width:80%; margin-top:10px}
        .table_wrap table td .btnSet li {display:inline; float:left; width:48%; margin-right:2%; margin-bottom:5px}
        .table_wrap table td .btnSet a {display:block; padding:8px 0; text-align:center; font-size:105%; background:#427eec; color:#fff}
        .table_wrap table td .btnSet a.tpye01 {background:#8c6f47}
        .table_wrap table td .btnSet a.tpye02 {background:#054988}
        .table_wrap table td .btnSet a.tpye03 {background:#F33}
        .table_wrap table td .btnSet a:hover {background:#333}
        .table_wrap table td .btnSet:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            <!-- 이벤트 내용 -->
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200102_top.jpg" alt="윌비스임용 2021학년도 대비 합격전략 설명회"/>
            <div class="table_wrap">
                <table>
                    <col width="15%"/>
                    <col width="25%"/>
                    <col width=""/>
                    <tr>
                    <th>유아</th>
                        <td>
                            <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_mjs.png" alt="민정선"/></div>
                            <p><strong>민정선</strong> 교수</p>
                        </td>
                        <td>
                            <p class="txtSt01">유아임용 합격의 대세~! 합격의 트렌드를 읽다~!</p>
                            <ul class="btnSet">
                                <li><a href="#none">2021학년도 대비 설명회</a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                    <th rowspan="3">교육학</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_lij.png" alt="이인재"/></div>
                        <p><strong>이인재</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">명쾌한 설명으로 쉬워지는 교육학!!</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_kcw.png" alt="김차웅"/></div>
                        <p><strong>김차웅</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">교육학 강의 10년의 베테랑, 진짜 전문가의 경험과 노하우</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_hei.jpg" alt="홍의일"/></div>
                        <p><strong>홍의일</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">실전 첨삭 중심 교육학</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>


                    <tr>
                    <th rowspan="2">전공국어</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_swy.png" alt="송원영"/></div>
                        <p><strong>송원영</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">전공국어, 합격을 위한 필수 전략 제시~! NO 1 교육론</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_lwg.png" alt="이원근"/></div>
                        <p><strong>이원근</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">국어학 박사의 정통 강의, 핵심만을 짚어내는 안목!</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <th rowspan="3">전공영어</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_kys.png" alt="김유석"/></div>
                        <p><strong>김유석</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">일반 영어/영미 문학의 절대 권위자~!</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_kh.png" alt="공훈"/></div>
                        <p><strong>공훈</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">영어학 합격의 새로운 빛</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_kym.png" alt="김영문"/></div>
                        <p><strong>김영문</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">영어학의 정석, 합격으로 가는 가장 빠른 길~!</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>

                    <tr>
                    <th> 수학교육론</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_pty.png" alt="박태영"/></div>
                        <p><strong>박태영</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">수학 교육론의 새로운 패러다임, 적중의 역사를 쓰다~!</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>

                    <tr>
                    <th>도덕윤리</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_kbc.png" alt="김병찬"/></div>
                        <p><strong>김병찬</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">부드러운 카리스마~! 도덕·윤리의 독보적 명강의 </p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <th>전공역사</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_cyl.png" alt="최용림"/></div>
                        <p><strong>최용림</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">최적의 학습전략으로 합격의 역사를 쓰다!!</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <th>전공음악</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_diana.png" alt="다이애나"/></div>
                        <p><strong>다이애나</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">독보적인 커리큐럼! 합격의 지름길!!</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                    <tr>
                    <th>전기전자통신</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_cwy.png" alt="최우영"/></div>
                        <p><strong>최우영</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">합격을 만드는 소통, 무한 피드백~! </p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>

                    <tr>
                    <th>정보컴퓨터</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_skj.png" alt="송광진"/></div>
                        <p><strong>송광진</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">정보컴퓨터의 절대 강자~!</p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>

                    <tr>
                    <th>중국어</th>
                    <td>
                        <div class="tImg"><img src="https://static.willbes.net/public/images/promotion/2020/09/200102_jkm.png" alt="정경미"/></div>
                        <p><strong>정경미</strong> 교수</p>
                    </td>
                    <td>
                        <p class="txtSt01">중국어 임용, 합격의 NEW Paradigm </p>
                        <ul class="btnSet">
                            <li><a href="#none">2021학년도 대비 설명회</a></li>
                            <li><a href="#none" class="tpye01">관련자료</a></li>
                        </ul>
                    </td>
                    </tr>
                </table>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200304_02.jpg" />
            <!-- 이벤트 내용 -->
        </div>
    </div>
    <!-- End Container -->
@stop