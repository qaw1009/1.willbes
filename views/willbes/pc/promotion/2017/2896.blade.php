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
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2023/02/2896_top_btn01.png"/></a>
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2023/02/2896_top_btn02.png"/></a>
            </div>
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01.jpg"/>
            <div class="pkgList">
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t01.jpg"/>
                    <a href="javascript:go_popup1()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t02.jpg"/>
                    <a href="javascript:go_popup2()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t03.jpg"/>
                    <a href="javascript:go_popup3()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t04.jpg"/>
                    <a href="javascript:go_popup4()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t05.jpg"/>
                    <a href="javascript:go_popup5()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t06.jpg"/>
                    <a href="javascript:go_popup6()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t07.jpg"/>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t08.jpg"/>
                    <a href="javascript:go_popup8()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t09.jpg"/>
                    <a href="javascript:go_popup9()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t10.jpg"/>
                    <a href="javascript:go_popup10()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t11.jpg"/>
                    <a href="javascript:go_popup11()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t12.jpg"/>
                    <a href="javascript:go_popup12()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t13.jpg"/>
                    <a href="javascript:go_popup13()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t14.jpg"/>
                    <a href="javascript:go_popup14()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
                <div class="lec">
                    <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_01_t15.jpg"/>
                    <a href="javascript:go_popup15()" title="" style="position: absolute; left: 26.64%; top: 67.98%; width: 12.43%; height: 21.05%; z-index: 2;"></a>
                    <div class="btnSet">
                        <a href="#none">학원직강 수강신청</a>
                        <a href="#none">동영상강의 수강신청</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox event02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2896_02.jpg"/>
        </div>

        <div id="popup1" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://ssam.willbes.net/public/uploads/willbes/professor/51076/curri1_51076.jpg"/>
            </div>
        </div>
        <div id="popup2" class="Pstyle NSK">
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
        <div id="popup5" class="Pstyle NSK">
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
        <div id="popup15" class="Pstyle NSK">
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