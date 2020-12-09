@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1973_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f0f0f0;}
        .evt02 {padding:100px 0}
        .evt02 .title {font-size:38px; margin-bottom:80px; line-height:1.2; color:#272727}
        .evt02 .title p {font-size:58px}
        .table_wrap {width:1120px; margin:0 auto}
        .table_wrap table{margin-top:30px; border-top:1px solid #d0d2d9; background:#fff}
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
        .table_wrap table td p strong {font-size:110%; font-weight:400; color:#000}
        .table_wrap table td .btnSet {width:80%; margin-top:10px}
        .table_wrap table td .btnSet li {display:inline; float:left; width:48%; margin-right:2%; margin-bottom:10px}
        .table_wrap table td .btnSet a {display:block; padding:8px 0; text-align:center; font-size:105%; background:#427eec; color:#fff}
        .table_wrap table td .btnSet li:nth-child(3) a,
        .table_wrap table td .btnSet li:nth-child(4) a{background:#8c6f47}
        .table_wrap table td .btnSet li a:hover {background:#333}
        .table_wrap table td .btnSet:after {content:""; display:block; clear:both}

        .evt03 {background:#fee333}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1973_top.jpg" alt="2022학년도 대비 합격전략 설명회"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1973_01.jpg" alt="2022학년도 대비 합격전략 설명회"/>
        </div>

        <div class="evtCtnsBox evt02">
            <div class="title NSK">
                2022학년도 대비 윌비스 임용
                <p class="NSK-Black">합격전략 설명회</p>
            </div>            
            <div class="table_wrap">
                <table>
                    <colgroup>
                        <col width="15%">
                        <col width="25%">
                        <col width="">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th>유아</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51076/prof_detail_51076.png" alt="민정선"></div>
                                <p><strong>민정선</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">유아 임용 합격의 대세~! 합격의 트렌드를 읽다.</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr> 
                        <tr>
                            <th>교육학</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51074/prof_detail_51074.png" alt="이인재"></div>
                                <p><strong>이인재</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">명쾌한 설명으로 쉬워지는 교육학!!</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[3] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[4] == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr> 
                        <tr>
                            <th>교육학</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51073/prof_detail_51073.png" alt="김차웅"></div>
                                <p><strong>김차웅</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">교육학 강의 10년의 베테랑, 진짜 전문가의 경험과 노하우</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[5] == 'Y') {{ front_url($file_link[5]) }} @else {{ $file_link[5] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[6] == 'Y') {{ front_url($file_link[6]) }} @else {{ $file_link[6] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>교육학</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51158/prof_detail_.png" alt="정현"></div>
                                <p><strong>정현</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">VZONEdu 교육학</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[7] == 'Y') {{ front_url($file_link[7]) }} @else {{ $file_link[7] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[8] == 'Y') {{ front_url($file_link[8]) }} @else {{ $file_link[8] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>     
                        <tr>
                            <th>전공국어</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51078/prof_detail_51078.png" alt="송원영"></div>
                                <p><strong>송원영</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">전공국어, 합격을 위한 필수 전략 제시~! NO 1. 교육론</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[9] == 'Y') {{ front_url($file_link[9]) }} @else {{ $file_link[9] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[10] == 'Y') {{ front_url($file_link[10]) }} @else {{ $file_link[10] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>     
                        <tr>
                            <th>전공국어</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51079/prof_detail_51079.png" alt="이원근"></div>
                                <p><strong>이원근</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">국어학 박사의 정통 강의, 핵심만을 짚어내는 안목!</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[11] == 'Y') {{ front_url($file_link[11]) }} @else {{ $file_link[11] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[12] == 'Y') {{ front_url($file_link[12]) }} @else {{ $file_link[12] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>    
                        <tr>
                            <th>전공영어</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51081/prof_detail_51081.png" alt="김유석"></div>
                                <p><strong>김유석</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">일반영어/영미 문학의 절대 권위자~!</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[13] == 'Y') {{ front_url($file_link[13]) }} @else {{ $file_link[13] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[14] == 'Y') {{ front_url($file_link[14]) }} @else {{ $file_link[14] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>    
                        <tr>
                            <th>전공영어</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51082/prof_detail_51082.png" alt="김영문"></div>
                                <p><strong>김영문</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">영어학의 정석, 합격으로 가는 가장 빠른길~!</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[15] == 'Y') {{ front_url($file_link[15]) }} @else {{ $file_link[15] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[16] == 'Y') {{ front_url($file_link[16]) }} @else {{ $file_link[16] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>    
                        <tr>
                            <th>수학교육론</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51085/prof_detail_51085.png" alt="박태영"></div>
                                <p><strong>박태영</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">수학교육론의 새로운 패러다임, 적중의 역사를 쓰다~!</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[17] == 'Y') {{ front_url($file_link[17]) }} @else {{ $file_link[17] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[18] == 'Y') {{ front_url($file_link[18]) }} @else {{ $file_link[18] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>  
                        <tr>
                            <th>도덕윤리</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51088/prof_detail_51088.png" alt="김병찬"></div>
                                <p><strong>김병찬</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">부드러운 카리스마~! 도덕 윤리의 독보적 명강의</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[19] == 'Y') {{ front_url($file_link[19]) }} @else {{ $file_link[19] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[20] == 'Y') {{ front_url($file_link[20]) }} @else {{ $file_link[20] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>   
                        <tr>
                            <th>전공체육</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51156/prof_detail_51156.png" alt="최규훈"></div>
                                <p><strong>최규훈</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">차원이 다른 클래스 VZONE 전공체육</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[21] == 'Y') {{ front_url($file_link[21]) }} @else {{ $file_link[21] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[22] == 'Y') {{ front_url($file_link[22]) }} @else {{ $file_link[22] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>  
                        <tr>
                            <th>전공음악</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51090/prof_detail_51090_1606459468.png" alt="다이애나"></div>
                                <p><strong>다이애나</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">독보적인 커리큘럼~! 음악 합격의 필수 관문!!</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[23] == 'Y') {{ front_url($file_link[23]) }} @else {{ $file_link[23] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[24] == 'Y') {{ front_url($file_link[24]) }} @else {{ $file_link[24] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>전기전자통신</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51091/prof_detail_51091.png" alt="최우영"></div>
                                <p><strong>최우영</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">합격을 만드는 위대한 소통, 무한 피드백~!</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[25] == 'Y') {{ front_url($file_link[25]) }} @else {{ $file_link[25] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[26] == 'Y') {{ front_url($file_link[26]) }} @else {{ $file_link[26] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>   
                        <tr>
                            <th>정보컴퓨터</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51092/prof_detail_51092.png" alt="송광진"></div>
                                <p><strong>송광진</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">정보컴퓨터의 대체 불가 절대 강자~!</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[27] == 'Y') {{ front_url($file_link[27]) }} @else {{ $file_link[27] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[28] == 'Y') {{ front_url($file_link[28]) }} @else {{ $file_link[28] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr> 
                        <tr>
                            <th>전공중국어</th>
                            <td>
                                <div class="tImg"><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51094/prof_detail_51094.png" alt="정경미"></div>
                                <p><strong>정경미</strong> 교수</p>
                            </td>
                            <td>
                                <p class="txtSt01">중국어 임용, 합격의 NEW Paradigm</p>
                                <ul class="btnSet">
                                    <li><a href="#none">2021학년도 대비 설명회</a></li>
                                    <li><a href="@if($file_yn[29] == 'Y') {{ front_url($file_link[29]) }} @else {{ $file_link[29] }} @endif" alt="설명회 자료" >설명회 관련 자료</a></li>
                                    <li><a href="#none">2021학년도 기출 해설</a></li>
                                    <li><a href="@if($file_yn[30] == 'Y') {{ front_url($file_link[30]) }} @else {{ $file_link[30] }} @endif" alt="기출 자료" >기출 관련 자료</a></li>
                                </ul>
                            </td>
                        </tr>                                                                                      
                    </tbody>
                </table>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1973_03.jpg" alt="소식알리기" usemap="#Map1973" border="0"/>
            <map name="Map1973">
                <area shape="rect" coords="221,1905,546,1989" href="#none" alt="주소복사">
                <area shape="rect" coords="564,1906,886,1990" href="@if($file_yn[31] == 'Y') {{ front_url($file_link[31]) }} @else {{ $file_link[31] }} @endif"  alt="이미지 다운로드">
            </map>
        </div>


        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif   

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">유의사항</h4>
                <ul>
                    <li>SNS는 페이스북, 인스타그램, 카카오스토리, 트위터가 해당되며, 카페 및 블로그의 경우 정상적으로 운영 및 활동이 진행되는 곳이어야 합니다. <br>
                        (검색 창에 ‘교원 임용’ 검색 시, 상단에 노출되는 카페)
                    <li>설명회 안내 링크 주소와 이미지가 포함되어 있을 경우에만 이벤트 참여로 인정됩니다.
                    <li>임용 설명회와 관계가 없는 글이나, 삭제 및 비공개로 설정 되어 있는 경우에는, 당첨에서 제외될 수 있습니다.
                    <li>중복된 공유 글은 당첨에서 제외합니다.
                    <li>이벤트 상품은 기프티콘으로 지급될 예정이며, 회원가입 시 입력하신 휴대폰 정보로 전송됩니다.<br>
                        (회원 정보 오류 시, 12월 28일까지 수정해주셔야 합니다.)
                    <li>당첨자는 12월 23일, 게시판을 통해 공지합니다.</li>                     
                </ul>

            </div>
        </div>
    </div>
    <!-- End Container -->
@stop