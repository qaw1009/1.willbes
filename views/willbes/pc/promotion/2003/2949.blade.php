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
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/
                
        /************************************************************/

        .sky {position:fixed;top:150px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:10px}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/04/2949_top_bg.jpg) no-repeat center top; height:1075px;}
        .evt_top .main_img {position:absolute; top:200px; left:50%; margin-left:-334.5px}

        .evtPass {background:#FF9C00; padding:50px 0}
        .evtPass .title01 {font-size:30px; color:#000; margin-bottom:100px}
        .evtPass .wrap {width:1120px; margin:0 auto}
        .evtPass .passLecBuy {display:flex; justify-content:space-around; position:absolute; bottom:25px; width:1120px; left:50%; margin-left:-560px;}
        .evtPass .passLecBuy div {width:50%; line-height:30px; font-size:21px; font-weight:bold; text-align:center;} 
        .evtPass .passLecBuy p {font-size:18px; margin-bottom:20px; text-align:center; margin-left:-30px}

        .evtPass input[type="radio"] {height:22px; width:22px; vertical-align:middle}
        .evtPass input[type="checkbox"] {height:25px; width:25px; vertical-align:middle}
        .evtPass input:checked + label {border-bottom:1px dashed #533fd1; color:#533fd1}

        .evtPass .totalPrice {width:860px; margin:90px auto 0;}
        .evtPass .totalPrice a {display:block; background:#000; font-size:44px; color:#fff; padding:20px; background:#000; border-radius:5px; box-shadow:10px rgba(0,0,0,.5);}
        .evtPass .totalPrice a:hover {background:#533fd1}

        .evtPass .check {width:800px; margin:0 auto; padding:20px; font-size:25px;}
        .evtPass .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evtPass .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}
        .evtPass .check input:checked + label {border-bottom:1px dashed #533fd1; color:#533fd1}
        .evtPass .agree{font-weight:bold;}

        .evtPass .title02 {font-size:30px; color:#000; margin:90px auto 30px;font-weight:bold;line-height:1.25;}
        .evtPass .title02 div {font-size:46px}

        .evtPass .txtinfo {width:1006px; margin:0 auto; padding:40px; border:1px solid #000; border-radius:10px; margin-bottom:50px; font-size:16px}
        .evtPass .txtinfo p {background:#000; color:#fff; padding:10px; border-radius:30px; margin-top:-60px; margin-bottom:20px; font-size:20px}

        .evt_02 {background:#E3E3E3;}    

        .evt_04 {background:url(https://static.willbes.net/public/images/promotion/2023/04/2949_04_bg.jpg) no-repeat center top;}

        .evt_05 {background:url(https://static.willbes.net/public/images/promotion/2023/04/2949_05_bg.jpg) no-repeat center top;}

        .evt_06 {background:url(https://static.willbes.net/public/images/promotion/2023/04/2949_06_bg.jpg) no-repeat center top;}

        .evt_07 {position:relative;}
        .youtube {position:absolute; top:143px; left:50%;z-index:1;margin-left:-560px;}
        .youtube iframe {width:1120px; height:550px}
               
        /*유트브 팝업창*/
        .Pstyle {
        opacity: 0;
        display: none;
        position: relative;
        width: auto;
        }
        .b-close {
        position: absolute;
        right: 0;
        top: -60px;
        display: inline-block;as 
        cursor: pointer;
        font-size: 40px;
        font-weight: bold;
        color:#fff;
        }       
        .videoBox{position: relative; padding-top: 60%; width:760px;}
        .videoBox iframe{position: absolute; top:0; left:0; width:100%; height:100%; }      
               
    </style>

    <div class="evtContent NSK" id="evtContainer">
       
        <div class="sky" id="QuickMenu">
            <a href="#apply_go">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_sky.png" alt="119 pass" >
            </a>          
        </div>
        
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_top.png"  alt="윌비스 소방 119패스" data-aos="flip-down" class="main_img"/>
        </div>

        <div class="evtCtnsBox evtPass" data-aos="fade-up" id="apply_go">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_01_title.jpg" alt="구매전 안내"/>           
            <div class="wrap" id="pass">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_01.jpg" alt="">
                <div class="passLecBuy NSK-Black"> 
                    <div>                                       
                        <input type="radio" id="y_pkg1" name="y_pkg" value="207036"/>                
                        <label for="y_pkg1">24년 0원 119 PASS</label>
                    </div>
                    <div>                    
                        <input type="radio" id="y_pkg2" name="y_pkg" value="207037"/>
                        <label for="y_pkg2">24년 119 PASS</label>
                    </div>
                    <div>                                       
                        <input type="radio" id="y_pkg3" name="y_pkg" value="207038"/>                
                        <label for="y_pkg3">24년 0원 119 PASS<br> 구조/학과</label>
                    </div>
                    <div>                                       
                        <input type="radio" id="y_pkg4" name="y_pkg" value="207039"/>                
                        <label for="y_pkg4">24년 0원 119 PASS<br> 구급</label>
                    </div>                   
                </div>
            </div>

            <div class="check">
                <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/>
                <label for="is_chk1" class="agree">PASS 과정 세부사항 확인하였고,이에 동의합니다.</label>             
            </div>

            <div class="title02" id="transfer">
                신규가입 & 재수강 & 환승 하실 수강생은 모두 주목!!
                <div class="NSK-Black">조건없이 무조건 혜택 받고 구매하세요.</div>
            </div>

          

            <div class="totalPrice NSK-Black">
                <a href="javascript:void(0);" onclick="termsCheck('is_chk1', 'pass');">패스상품 신청하기 ></a>
            </div>  
        </div>
  
        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_02.jpg" title="강사진">
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/51421?subject_idx=1113" title="권나라" target="_blank" style="position: absolute;left: 6.93%;top: 61.16%;width: 7.71%;height: 5.31%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/51420?subject_idx=1138" title="오도희" target="_blank" style="position: absolute;left: 25.93%;top: 61.16%;width: 7.71%;height: 5.31%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/51206?subject_idx=1111" title="신기훈" target="_blank" style="position: absolute;left: 46.53%;top: 61.16%;width: 7.71%;height: 5.31%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/51449?subject_idx=1140" title="김윤정" target="_blank" style="position: absolute;left: 65.93%;top: 61.16%;width: 7.71%;height: 5.31%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/51439?subject_idx=2261" title="이혜영" target="_blank" style="position: absolute;left: 87.53%;top: 61.16%;width: 7.71%;height: 5.31%;z-index: 2;"></a>
            </div>         
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_03.jpg" title="교수진의 강의력">
                <a href="javascript:videoPop('#vid1');" title="" style="position: absolute;left: 5.73%;top: 32.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid2');" title="" style="position: absolute;left: 35.13%;top: 32.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid3');" title="" style="position: absolute;left: 64.73%;top: 32.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid4');" title="" style="position: absolute;left: 5.73%;top: 54.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid5');" title="" style="position: absolute;left: 35.13%;top: 54.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid6');" title="" style="position: absolute;left: 64.73%;top: 54.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid7');" title="" style="position: absolute;left: 5.73%;top: 76.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid8');" title="" style="position: absolute;left: 35.13%;top: 76.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid9');" title="" style="position: absolute;left: 64.73%;top: 76.16%;width: 28.71%;height: 20.31%;z-index: 2;"></a>
            </div>        
        </div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_04.jpg" title="커리큘럼">           
        </div>

        <div class="evtCtnsBox evt_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_05.jpg" title="자주 묻는 질문">           
        </div>

        <div class="evtCtnsBox evt_06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_06.jpg" title="김윤정 교수">           
        </div>

        <div class="evtCtnsBox evt_07 pb100" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949_07.jpg" title="히어로">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>      

	</div>

     <!-- 비디오 영상팝업 리스트 -->

    <div id="vid1" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/B11PSWKoBsY?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid2"  class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/8WuVy15dGw0?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid3" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/Z7PDrEhrY2o?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid4" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/e4arGm-tJWE?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid5" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/W3wcvq26MuM?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid6" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/t6sfD77mE8Y?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid7" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/kiOvGUUzPhM?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid8" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/dTJ3jiCpx8Y?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid9" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/rkkN4KuT4cQ?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>

     <!-- End evtContainer -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>  
    <script type="text/javascript" src="https://pass.willbes.net/public/js/willbes/jquery.bpopup.min.js"></script>

        <script>
        $(document).ready( function() {
            AOS.init();
        });

        // 비디오팝업
        function videoPop(id) { 
            
            $(id).bPopup({
                positionStyle:'fixed',            
                onClose: function(){
                    $(".yt_f iframe").attr('src', '');
                },
                onOpen: function(){
                    $("#vid1 iframe").attr('src', 'https://www.youtube.com/embed/B11PSWKoBsY?rel=0');
                    $("#vid2 iframe").attr('src', 'https://www.youtube.com/embed/8WuVy15dGw0?rel=0');
                    $("#vid3 iframe").attr('src', 'https://www.youtube.com/embed/Z7PDrEhrY2o?rel=0');
                    $("#vid4 iframe").attr('src', 'https://www.youtube.com/embed/e4arGm-tJWE?rel=0');
                    $("#vid5 iframe").attr('src', 'https://www.youtube.com/embed/W3wcvq26MuM?rel=0');
                    $("#vid6 iframe").attr('src', 'https://www.youtube.com/embed/t6sfD77mE8Y?rel=0');
                    $("#vid7 iframe").attr('src', 'https://www.youtube.com/embed/kiOvGUUzPhM?rel=0');
                    $("#vid8 iframe").attr('src', 'https://www.youtube.com/embed/dTJ3jiCpx8Y?rel=0');
                    $("#vid9 iframe").attr('src', 'https://www.youtube.com/embed/rkkN4KuT4cQ?rel=0');
                }
            });
        }

           /*약관동의*/
           function termsCheck(terms_id,ele_id){
            if($("#" + terms_id).is(":checked") === false){
                $("#" + terms_id).focus();
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
            goCartNDirectPay(ele_id, 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');
        }
        
        </script>
        
    </script>

    

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop