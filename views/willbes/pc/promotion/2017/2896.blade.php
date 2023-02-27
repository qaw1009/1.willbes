@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2023/02/2896_top_bg.jpg) no-repeat center top;}
        .eventTop .btns {position:absolute; bottom:0; z-index: 2; width:100%; display:flex; justify-content: center;}
        .eventTop .btns a {display:block; width:337px; height:278px; overflow:hidden; position: relative;}
        .eventTop .btns a img {position:absolute; left:0; bottom:0; z-index: 3;}
        .eventTop .btns a:hover img {margin-left:-337px}

        .event01 {padding-bottom:150px}
        .pkgList {width:1006px; margin:0 auto;}
        .pkgList .lec{position: relative; margin-bottom:30px}
        /*.pkgList .lec > a {border:1px solid #000}*/
        .btnSet {position: absolute; right:30px; top:70px; width:200px; z-index: 2;}
        .btnSet a {display:block; padding:10px 0; text-align:center; font-size:19px; font-weight:bold; background:#592e04; color:#fff; margin-bottom:10px}
        .btnSet a:hover {background:#ef3c2d;}   

        .event02 {background:url(https://static.willbes.net/public/images/promotion/2023/02/2896_02_bg.jpg) no-repeat center top;}

        .evtInfo {padding:80px 0; background:#CCC; color:#242424; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox span {vertical-align:top}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox h4 span {color:#e30000}
        .evtInfoBox h5 {font-size:20px; margin-bottom:10px; font-weight:bold}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:30px; margin-bottom:10px}        
        .evtInfoBox p {margin-bottom:10px}
        .evtInfoBox p span {padding:3px 10px; background:#333; color:#fff; font-size:16px; border-radius:10px}
        .evtInfoBox tr {border:1px solid #FFF}
        .evtInfoBox th,
        .evtInfoBox td {padding:5px; text-align:center; border-right:1px solid #FFF}
        .evtInfoBox th {background:#f4f4f4}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            padding:0;
            
        }
        .b-close {
            position: absolute;
            right: -25px;
            top: -25px;
            display: inline-block;
            cursor: pointer;
            width:50px;
            height:50px;
            transform: rotate(0deg);
            transition: all 1s;
            z-index: 9999;
        }
        .b-close img {width:100%}
        .b-close:hover {transform: rotate(360deg); transition: all 1s;}

        .Pstyle .content {height:700px; width:auto; overflow-y:auto}
        .Pstyle .content img {width:900px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_top.jpg"/>
            <div class="btns">
                <a href="https://ssam.willbes.net/promotion/index/cate/3140/code/2897#evt01" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2896_top_btn01.png"/></a>
                <a href="https://ssam.willbes.net/promotion/index/cate/3140/code/2897#evt02" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2023/02/2896_top_btn02.png"/></a>
            </div>
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01.jpg"/>
            <div class="pkgList">
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t01.jpg" alt="유아 민정선"/>
                    <a href="javascript:go_popup1()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none" onclick="javascript:alert('논술미포함(학원직강)을 수강하고, 추가로 논술(학원직강)을 수강신청 하시면 됩니다.');">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3135/pack/648001/prod-code/204284">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t02.jpg" alt="유아 민정선"/>
                    <a href="javascript:go_popup1()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/204897" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3135/pack/648001/prod-code/204285" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t03.jpg" alt="교육학 이경범"/>
                    <a href="javascript:go_popup3()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/204604" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3134/pack/648001/prod-code/204599" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t04.jpg" alt="국어 송원영"/>
                    <a href="javascript:go_popup4()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/205209" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/205299" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t05.jpg" alt="국어 송원영"/>
                    <a href="javascript:go_popup4()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/205210" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/205300" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t06.jpg" alt="국어 권보민"/>
                    <a href="javascript:go_popup6()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/205212" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/205308" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t07.jpg" alt="국어 송원영/권보민"/>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/205208" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/205295" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t08.jpg" alt="국어 구동언"/>
                    <a href="javascript:go_popup8()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/204605" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/204600" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t09.jpg" alt="영어 김유석"/>
                    <a href="javascript:go_popup9()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/205105" target="_blank">학원직강 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t10.jpg" alt="수학 박태영"/>
                    <a href="javascript:go_popup10()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/205213" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/203382" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t11.jpg" alt="수학 박혜향"/>
                    <a href="javascript:go_popup11()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/204607" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/204601" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t12.jpg" alt="역사 김종권"/>
                    <a href="javascript:go_popup12()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/204609" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/204602" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t13.jpg" alt="음악 다이애나"/>
                    <a href="javascript:go_popup13()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/202908" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/202901" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t14.jpg" alt="중국어 장영희"/>
                    <a href="javascript:go_popup14()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/204610" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/204603" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t15.jpg" alt="중국어 장영희"/>
                    <a href="javascript:go_popup14()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="https://ssam.willbes.net/pass/offPackage/show/prod-code/205019" target="_blank">학원직강 수강신청</a>
                        <a href="https://ssam.willbes.net/package/show/cate/3137/pack/648001/prod-code/205016" target="_blank">동영상강의 수강신청</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox event02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_02.jpg"/>
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">3~11월 패키지 (온라인/직강) 상품 이용안내 및 유의사항</h4>
                <ul>
                    <li>본 연간 패키지 상품의 수강 기간은 아래와 같으며, 동영상 강의의 경우 수강 기간 중 "일시중지" 및 "(유료)연장"을 할 수 없습니다. 

                    <table>
                        <tr>
                            <th>구분</th>
                            <th>학원 직강</th>
                            <th>동영상 강의</th>
                        </tr>
                        <tr>
                            <td>유아</td>
                            <td>~ 2023년 10월 까지</td>
                            <td>~ 2023. 12. 31. 까지</td>
                        </tr>
                        <tr>
                            <td>중등</td>
                            <td>~ 2023년 11월 까지</td>
                            <td>~ 2023. 11. 30. 까지</td>
                        </tr>
                    </table> 

                    </li>
                    <li>본 패키지는 1차 대비 강의만 포함됩니다. (2차대비 강의는 별도 수강)</li>
                    <li>본 패키지 강의는 양도 및 매매가 불가하며, 위반 시 처벌 받을 수 있습니다.</li>
                </ul>

                <h5>[3~11월 패키지 환불 규정]</h5>
                <ul>
                    <li>수강신청(결제완료) 후, 개강 전에는 전액 환불 가능합니다. (단, 개강전이지만 예습용 강의를 제공받 
                    은 경우 환불금액이 공제될 수 있습니다) </li>
                    <li>학원에 오셔서 신용카드로 방문 결제하신 경우에는 학원에 방문하셔서 취소할 수 있습니다. (결제한 
                    신용카드, 신용카드 영수증 반드시 지참)</li>
                    <li>패키지 강의에 대한 환불 문의 및 (환불)신청은 홈페이지 1:1 상담 게시판을 통하여 가능합니다. </li>
                    <li>본 패키지 강의의 환불은 학원의 설립·운영 및 과외 교습소에 관한 법률 18조 (동 시행령)에 따라 진
                    행됩니다.</li>
                    <li>본 패키지 상품은 할인이 적용된 상품으로 할인 전 원 수강료를 기준으로 환불하는 것을 원칙으로
                    합니다.</li>
                </ul>

                <p><span>교습개시 이후, 학원 직강의 환불 규정</span></p>
                <ul>
                    <li>학원 직강의 교습기간이 1개월 이내인 경우
                        <table>
                            <tr>
                                <th>교습시간의 ⅓ 경과 전</th>
                                <td>1개월 교습비의 ⅓에 해당하는 금액 공제 후 나머지 환불 </td>
                            </tr>
                            <tr>
                                <th>교습시간의  ½ 경과 전</th>
                                <td>1개월 교습비의 ⅓에 해당하는 금액 공제 후 나머지 환불 </td>
                            </tr>
                            <tr>
                                <th>교습시간의 ½ 경과 후</th>
                                <td>해당월의 교습비는 환불 금액 없음 </td>
                            </tr>
                        </table> 
                    </li>
                    <li>교습기간이 1개월을 초과하는 경우에는, 반환 사유가 발생한 월의 환불 공제 금액을 차감한 후,  나
                        머지 교습비를 반환 받을 수 있습니다. <br>
                        (단과의 묶음으로 구성된 패키지 강의 환불시에는 기 수강한 단과금액의 원 수강료를 공제하고 환불
                        이 받을 수 있습니다.)</li>
                </ul>

                <p><span>교습개시 이후, 동영상강의 환불 규정</span></p>
                <ul>
                    <li>패키지 강의의 환불은 강좌의 원 금액을 기준으로 공제가 됩니다.</li>
                    <li>본 페이지의 연간패키지 강좌는 이용기간 기준의 패키지 상품으로 환불 시에는 "<span class="tx-red">(수강료)결제금액 - (강좌 정상가의 1일 이용대금 x 이용일수)</span>"의 기준으로 환불 받을 수 있습니다.<br>
                    ※ 이용일수란? 강의 시작(결제일)일로 부터 환불을 요청하신 날까지 경과된 일수를 의미합니다.</li>
                    <li>'결제 7일 이내' 맛보기 강의 제외, 2강 이하 수강 시에는 전액 환불 가능합니다.</li>
                    <li>'결제 7일 이내' 2강 이상 수강 시에는 경과 일수만큼 일할 공제 후 부분 환불됩니다.</li>
                </ul>
            </div>
        </div>

        <div id="popup1" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51076/curri1_51076.jpg"/>
            </div>
        </div>

        <div id="popup3" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51312/curri1_51312.jpg"/>
            </div>
        </div>

        <div id="popup4" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51078/curri1_51078_1672800572.jpg"/>
            </div>
        </div>

        <div id="popup6" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51080/curri1_51080_1672800600.jpg"/>
            </div>
        </div>

        <div id="popup8" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51313/curri1_51313.jpg"/>
            </div>
        </div>

        <div id="popup9" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51081/curri1_51081.jpg"/>
            </div>
        </div>

        <div id="popup10" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51085/curri1_51085_1672800675.jpg"/>
            </div>
        </div>

        <div id="popup11" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51314/curri1_51314.jpg"/>
            </div>
        </div>

        <div id="popup12" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51315/curri1_51315.jpg"/>
            </div>
        </div>

        <div id="popup13" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51090/curri1_51090_1671000994.jpg"/>
            </div>
        </div>

        <div id="popup14" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51318/curri1_51318.jpg"/>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });

        //팝업
        function go_popup1(){$('#popup1').bPopup();}
        function go_popup2(){$('#popup2').bPopup();}
        function go_popup3(){$('#popup3').bPopup();}
        function go_popup4(){$('#popup4').bPopup();}
        function go_popup5(){$('#popup5').bPopup();}
        function go_popup6(){$('#popup6').bPopup();}

        function go_popup8(){$('#popup8').bPopup();}
        function go_popup9(){$('#popup9').bPopup();}
        function go_popup10(){$('#popup10').bPopup();}
        function go_popup11(){$('#popup11').bPopup();}
        function go_popup12(){$('#popup12').bPopup();}
        function go_popup13(){$('#popup13').bPopup();}
        function go_popup14(){$('#popup14').bPopup();}
        function go_popup15(){$('#popup15').bPopup();}
    </script>



@stop