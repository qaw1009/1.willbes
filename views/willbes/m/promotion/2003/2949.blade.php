@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.4; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

    .evt01 .price {text-align:center; font-size:23px; font-weight:bold; color:#000; letter-spacing:-1px; position:absolute; top:92.5%; width:100%; z-index: 10;}
    .evt01 .price p {margin-bottom:20px}

    .evt01 .ext01txt {padding:20px; text-align:left}
    .evt01 .ext01txt label {font-size:19px; font-weight:bold;}
    .evt01 input[type="radio"] {height:30px; width:30px; vertical-align:middle}
    .evt01 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle; margin-right:5px}    
    .evt01 .ext01txt input:checked + label {color:blue}
    .evt01 .ext01txt ul {margin:10px 0 0 25px;}

    .evt01 {background:#FF9C00; padding-bottom:50px}
    .evt01 .lecbuy {display:flex; justify-content:center; flex-wrap: wrap; margin:0 2vh}
    .evt01 .lecbuy .p_re {width:50%; margin-bottom:20px; position: relative;}
    .evt01 .lecbuy .p_re img {max-width:317px;}
    .evt01 .check {font-size:1.6vh; text-align:center; line-height:1.4;margin-top:40px;font-weight:bold;}
    .evt01 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
    .evt01 .check a {display:block; padding:5px 0; color:#fff; background:#000; width:60%; margin:20px auto 0; border-radius:20px; font-size:1.8vh;}
    .evt01 .check a:hover {color:#333; background:#35fffa;}
    .evt01 .info {margin:20px auto 50px; padding:10px;line-height:1.4; font-size:1.6vh; font-weight:bold;}

    .totalPrice {width:80%; margin:0 auto;}
    .totalPrice a {display:block; background:#000; font-size:1.5rem; color:#fff; padding:20px; background:#000; border-radius:5px; box-shadow:10px rgba(0,0,0,.5);}
    .totalPrice a:hover {background:#533fd1}

    .evt_07 {padding:100px 0;}
    .youtubeWrap {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
    .youtubeWrap object {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

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
        display: inline-block;
        cursor: pointer;
        font-size: 40px;
        font-weight: bold;
        color:#fff;
        }       
        .videoBox{position: relative; padding-top: 60%; width:720px;}
        .videoBox iframe{position: absolute; top:0; left:0; width:100%; height:100%;}  

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .videoBox{width:325px;}
        .evt01 .price {font-size:12px;}
        .evt01 .ext01txt label {font-size:14px;}
        .evt01 input[type="radio"] {height:15px; width:15px; vertical-align:middle}    

        .evt01 .lecbuy a {width: calc(50% - 10px);} 
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) { 
        .videoBox{width:500px;}
        .evt01 .price {font-size:15px;}
        .evt01 .ext01txt label {font-size:17px;}
        .evt01 input[type="radio"] {height:20px; width:20px; vertical-align:middle}

        .evt01 .lecbuy a {width: calc(50% - 10px);}    
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .videoBox{width:600px;}
        .evt01 .price {font-size:17px;}
        .evt01 .ext01txt label {font-size:19px;}
        .evt01 input[type="radio"] {height:25px; width:25px; vertical-align:middle}

        .evt01 .lecbuy a {width: calc(50% - 10px);}
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top"  data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_top.jpg"  alt="윌비스 소방 119패스"/>
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up" id="evt01"> 
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_01_title.jpg" alt="소방공채"/>            
        <div class="evt01_coupon lecbuy" id="pass">
            <div class="p_re">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_01_01.png" alt="" > 
                <div class="price NSK-Black">                       
                    <input type="radio" id="y_pkg1" name="y_pkg" value="207036" onClick=""/>
                    <label for="y_pkg1">24년 0원 119 PASS</label>
                </div>
            </div>
            <div class="p_re">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_01_02.png" alt="" > 
                <div class="price NSK-Black">                       
                    <input type="radio" id="y_pkg2" name="y_pkg" value="207037" onClick=""/>
                    <label for="y_pkg2">24년 119 PASS</label>
                </div>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_01s_title.jpg" alt="소방경채"/> 
            <div class="p_re">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_01_03.png" alt="" > 
                <div class="price NSK-Black">                       
                    <input type="radio" id="y_pkg3" name="y_pkg" value="207038" onClick=""/>
                    <label for="y_pkg3">24년 0원 119 PASS<br> 구조/학과</label>
                </div>
            </div>          
            <div class="p_re">
                <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_01_04.png" alt="" > 
                <div class="price NSK-Black">                       
                    <input type="radio" id="y_pkg4" name="y_pkg" value="207039" onClick=""/>
                    <label for="y_pkg4">24년 0원 119 PASS<br> 구급</label>
                </div>
            </div>                           
            <div class="ext01txt">
                <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/> <label for="is_chk1">PASS 과정 세부사항 확인하였고,이에 동의합니다.</label>              
            </div>
        </div>
        <div class="totalPrice NSK-Black">
            <a href="javascript:void(0);" onclick="goCartNDirectPay('evt01', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y','is_chk1', 'pass');">패스상품 신청하기 ></a>
        </div>
    </div>

    <div class="evtCtnsBox evt_02" data-aos="fade-up">
        <div class"wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_02.jpg" title="강사진">
            <a href="https://pass.willbes.net/m/professor/show/cate/3023/prof-idx/51421?subject_idx=1113" title="권나라" target="_blank" style="position: absolute;left: 4.93%;top: 50.12%;width: 8.71%;height: 4.31%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/professor/show/cate/3023/prof-idx/51420?subject_idx=1138" title="오도희" target="_blank" style="position: absolute;left: 23.93%;top: 50.12%;width: 8.71%;height: 4.31%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/professor/show/cate/3023/prof-idx/51206?subject_idx=1111" title="신기훈" target="_blank" style="position: absolute;left: 44.93%;top: 50.12%;width: 8.71%;height: 4.31%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/professor/show/cate/3023/prof-idx/51449?subject_idx=1140" title="김윤정" target="_blank" style="position: absolute;left: 64.93%;top: 50.12%;width: 8.71%;height: 4.31%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/professor/show/cate/3023/prof-idx/51439?subject_idx=2261" title="이혜영" target="_blank" style="position: absolute;left: 86.93%;top: 50.12%;width: 8.71%;height: 4.31%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt_03" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_03.jpg" title="교수진의 강의력">
            <a href="javascript:videoPop('#vid1');" title="" style="position: absolute;left: 0.73%;top: 30.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid2');" title="" style="position: absolute;left: 33.73%;top: 30.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid3');" title="" style="position: absolute;left: 66.73%;top: 30.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid4');" title="" style="position: absolute;left: 0.73%;top: 52.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid5');" title="" style="position: absolute;left: 33.73%;top: 52.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid6');" title="" style="position: absolute;left: 66.73%;top: 52.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid7');" title="" style="position: absolute;left: 0.73%;top: 74.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid8');" title="" style="position: absolute;left: 33.73%;top: 74.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid9');" title="" style="position: absolute;left: 66.73%;top: 74.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
        </div>        
    </div>

    <div class="evtCtnsBox evt_04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_04.jpg" title="커리큘럼">           
    </div>

    <div class="evtCtnsBox evt_05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_05.jpg" title="자주 묻는 질문">           
    </div>

    <div class="evtCtnsBox evt_06" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_06.jpg" title="김윤정 교수">           
    </div>

    <div class="evtCtnsBox evt_07" data-aos="fade-up">
        <div class="youtubeWrap">
            <object data="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></object>
        </div>
    </div>

     <!-- 비디오 영상팝업 리스트 -->

    <div id="vid1" class="yt_f" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/B11PSWKoBsY?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid2" class="yt_f" style="display: none;">
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
    <div id="vid9" class="yt_f"style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/rkkN4KuT4cQ?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>

</div>

  <!-- End evtContainer -->

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
       
        function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form = $('#' + ele_id);
            var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
            var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
            var params;

            if ($is_chk.length > 0) {
                if ($is_chk.is(':checked') === false) {
                    alert('이용안내에 동의하셔야 합니다.');
                    $is_chk.focus();
                    return;
                }
            }

            if ($prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            // 장바구니 저장 기본 파라미터
                params = [
                { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
                { 'name' : '_method', 'value' : 'POST' },
                { 'name' : 'cart_type', 'value' : cart_type },
                { 'name' : 'learn_pattern', 'value' : learn_pattern },
                { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
            ];

            // 선택된 상품코드 파라미터
            $prod_code.each(function() {
                params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
            });

            //장바구니 저장 URL로 전송
            formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
        }

    </script>

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
        
        </script>
        
    </script>

    

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop