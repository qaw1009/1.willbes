<ul class="skyBanner">
    <li><a href="#none">채점만해도<Br />선물증정</a></li>
    <li><a href="#none">빠른채점</a></li>
    <li><a href="#none" target="_blank">라이브 토크쇼</a></li>
    <li><a href="#none" target="_blank">적중이벤트</a></li>
    <li><a href="#none" >합격예측</a></li>
    <li><a href="#evtContainer">top</a></li>
</ul>

<div class="conut_section">
    <div class="conut_section_wrap" id="counter">
        <div>
            <span>서비스 이용현황 :</span>
            <span id="numarea1"></span>

            <span>참여 현황 :</span>
            <span id="numarea2"></span>
        </div>
        <p>
            * 서비스 이용현황 : 사전예약 및 본서비스 + 봉투모의고사 + 파이널찍기특강 + 최신판례특강 + 라이브토크쇼 + 적중이벤트 등 서비스 이용 페이지뷰 합산<Br />
            * 참여현황 : 사전예약, 성적채점, 설문조사, 시험후기, 토크쇼, 적중이벤트 참여건수 중복 합산 기준
        </p>
    </div>
</div>

<div class="m_sectin1_box">
    <div class="title">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_top_tit.png" alt="2018 경찰 3차 시험 합격예측 풀서비스">
    </div>

    <div class="tmap">
        <div class="map_visual" id="AREA_AVGGRADE">
            <div class="tmapR">
                <ul id="map_area" class="bx-wrapper">
                </ul>
            </div>

            <div id="MapRollingDiv">
                <ul>
                    <li class="a01"><a data-slide-index="1" href="#none" class="active">서울</a></li>
                    <li class="a12"><a data-slide-index="2" href="#none">부산</a></li>
                    <li class="a11"><a data-slide-index="3" href="#none">대구</a></li>
                    <li class="a02"><a data-slide-index="4" href="#none">인천</a></li>
                    <li class="a16"><a data-slide-index="5" href="#none">광주</a></li>
                    <li class="a08"><a data-slide-index="6" href="#none">대전</a></li>
                    <li class="a13"><a data-slide-index="7" href="#none">울산</a></li>
                    <li class="a10"><a data-slide-index="8" href="#none">경남</a></li>
                    <li class="a09"><a data-slide-index="9" href="#none">경북</a></li>
                    <li class="a05"><a data-slide-index="10" href="#none">강원</a></li>
                    <li class="a06"><a data-slide-index="11" href="#none">충북</a></li>
                    <li class="a07"><a data-slide-index="12" href="#none">충남</a></li>
                    <li class="a14"><a data-slide-index="13" href="#none">전북</a></li>
                    <li class="a15"><a data-slide-index="14" href="#none">전남</a></li>
                    <li class="a03"><a data-slide-index="15" href="#none">경기북부</a></li>
                    <li class="a04"><a data-slide-index="16" href="#none">경기남부</a></li>
                    <li class="a17"><a data-slide-index="17" href="#none">제주</a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="talkShow">
        <a href="#none" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_top_bn3.png" alt="LIVE 합격예측 토크쇼">
        </a>
        {{--토크쇼 종료 후 노출
        <a href="#none" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_top_bn1.png" alt="기출해설특강">
        </a>
        --}}
    </div>

    <div class="wNotice">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_top_text.png" alt="최종 합격 솔루션">
        <div>
            <h3>
                <a href="javascript:selTitle('')">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_top_notice.png" alt="공지사항">
                </a>
            </h3>
            <ul>
                <span id="noticeArea1"></span>
            </ul>
        </div>
    </div>
    <!--wNotice//-->

    {{--공지사항 레이어팝업--}}
    <div id="popup" class="Pstyle NGR">
        <span class="b-close">X</span>
        <h3 class="NSK-Black">합격예측 공지사항</h3>
        <div class="content">
            {{--리스트--}}
            <span id="noticeArea2"></span>

            {{--공통 페이지 넘버링--}}

            {{--글보기--}}
            <span id="noticeArea3"></span>
            
        </div>
    </div>
</div>
<!--m_sectin1_box//-->

<div class="m_lnb">
    <ul class="lnbMenu">
        <li>
            <a href="javascript:tabMove(1);" id="mt1"> 메인</a>
        </li>
        <li>
            <a href="javascript:tabMove(2);"  id="mt2"> 성적채점 및 확인 </a></li>
        <li>
            <a href="javascript:tabMove(3);" id="mt3"> 합격예측 </a>
            {{--<a href="#none"> 합격예측 </a>--}}
        </li>
        <li>
            <a href="javascript:tabMove(4);"  id="mt4"> 기출문제및해설 </a>
            {{--<a href="#none">기출문제해설</a>--}}
        </li>
    </ul>
</div>
<!--m_lnb//-->
<form class="form-horizontal" id="ajax_form" name="ajax_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
</form>
<script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
<script>
    var $ajax_form = $('#ajax_form');

    /*서비스이용현황 */
    $( document ).ready( function() {
        areaAvrAjax('{{$arr_promotion_params['prodcode']}}');
        noticeListAjax('');
        //$('#popup').bPopup();

        timer = self.setInterval('slideGo()', 3000);

        get_cnt2();
        get_cnt3();

        var jbOffset = $( '.conut_section' ).offset();
        $( window ).scroll( function() {
            if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.conut_section' ).addClass( 'conut_sectionFixed' );
            }
            else {
                $( '.conut_section' ).removeClass( 'conut_sectionFixed' );
            }
        });
    } );

    // 숫자 타입에서 쓸 수 있도록 format() 함수 추가
    Number.prototype.format = function(){
        if(this==0) return 0;

        var reg = /(^[+-]?\d+)(\d{3})/;
        var n = (this + '');

        while (reg.test(n)) n = n.replace(reg, '$1' + ',' + '$2');

        return n;
    };

    // 문자열 타입에서 쓸 수 있도록 format() 함수 추가
    String.prototype.format = function(){
        var num = parseFloat(this);
        if( isNaN(num) ) return "0";

        return num.format();
    };

    function slideGo(){
        $("#map_area").bxSlider({
            auto : true,
            mode: 'fade',
            pagerCustom: '#MapRollingDiv',
            speed: 1000,
            pause: 1000,
            controls:false
        });
    }

    /*과목별 성적 분포*/
    $(document).ready(function() {
        var slidesImg3 = $("#slidesImg3").bxSlider({
            mode:'fade', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:1000,
            pause:4000,
            controls:false,
            minSlides:1,
            maxSlides:1,
            slideWidth:980,
            slideMargin:0,
            autoHover: true,
            moveSlides:1,
            pager:false,
        });

        $("#imgBannerLeft3").click(function (){
            slidesImg3.goToPrevSlide();
        });

        $("#imgBannerRight3").click(function (){
            slidesImg3.goToNextSlide();
        });
    });

    function makeCount(s){
        var res = "";
        for (var i = 0; i < s.length; i++) {
            if(s.charAt(i) == ','){
                res += s.charAt(i);
            } else {
                res += "<img src='https://static.willbes.net/public/images/promotion/common/"+s.charAt(i)+".png' />";
            }
        }
        return res;
    }

    // 합격예측카운트수
    function get_cnt2()
    {
        var s = "12345678".format();
        $('#numarea1').html(makeCount(s));

        {{--var _url = '{{ front_url("/predict/cntForPromotion/") }}';--}}
        {{--var _data = {--}}
            {{--'type' : 2,--}}
            {{--'event_idx' : '{{ $data['ElIdx'] }}',--}}
            {{--'promotion_code' : '{{ $arr_base['promotion_code'] }}',--}}
            {{--'sp_idx' : '{{ $arr_promotion_params['spidx'] }}',--}}
            {{--'predict_idx' : '{{ (empty($arr_promotion_params) === false) ? $arr_promotion_params['prodcode'] : '' }}'--}}
        {{--};--}}

        {{--sendAjax(_url, _data, function(ret) {--}}
            {{--if (ret.ret_cd) {--}}
                {{--console.log(ret.ret_data);--}}
                {{----}}
                {{--//$("#cnt2").text(ret.ret_data);--}}
            {{--}--}}
        {{--}, showError, false, 'GET');--}}
    }

    // 합격예측카운트수
    function get_cnt3()
    {
        var s = "56789".format();
        $('#numarea2').html(makeCount(s));
        {{--var _url = '{{ front_url("/predict/cntForPromotion/") }}';--}}
        {{--var _data = {--}}
            {{--'type' : 3,--}}
            {{--'event_idx' : '{{ $data['ElIdx'] }}',--}}
            {{--'promotion_code' : '{{ $arr_base['promotion_code'] }}',--}}
            {{--'sp_idx' : '{{ $arr_promotion_params['spidx'] }}',--}}
            {{--'predict_idx' : '{{ (empty($arr_promotion_params) === false) ? $arr_promotion_params['prodcode'] : '' }}'--}}
        {{--};--}}

        {{--sendAjax(_url, _data, function(ret) {--}}
            {{--if (ret.ret_cd) {--}}
                {{--console.log(ret.ret_data);--}}
                {{--alert(ret.ret_data);--}}
                {{--//$("#cnt3").text(ret.ret_data);--}}
            {{--}--}}
        {{--}, showError, false, 'GET');--}}
    }

    function areaAvrAjax(ProdCode){

        url = "{{ site_url("/predict/areaAvrAjax") }}";
        var data = {
            '{{ csrf_token_name() }}' : $ajax_form.find('[name="{{ csrf_token_name() }}"]').val(),
            '_method' : 'POST',
            'ProdCode': ProdCode
        };
        sendAjax(url,
            data,
            function(d){
                var str = ""; //d.data[0].TakeAreaName;
                var instr2 = "";
                var areaStr = "";
                var tempAreaStr = "";
                var datalen = d.data.length;
                var j = 0;
                for(var i=0; i < datalen; i++) {
                    areaStr = d.data[i].TakeAreaName;
                    j = i + 1;

                    if((areaStr != tempAreaStr && i != 0) || datalen == j){
                        if(datalen == j){
                            str = str + "<li>";
                            instr = "<p>실시간 입력자평균 <span>"+tempAreaStr+"</span></p><table class='boardTypeA'><colgroup><col span='2'></colgroup><tbody><tr><th>직렬/지역</th><th>점수</th></tr>";
                            str += instr;
                            instr2 += "<tr><td>" + d.data[i].TakeMockPartName + "</td><td>" + d.data[i].AvrPoint + "</td></tr>";
                            str += instr2;
                            str += "</tbody></table></li>";
                        } else {
                            str = str + "<li>";
                            instr = "<p>실시간 입력자평균 <span>"+tempAreaStr+"</span></p><table class='boardTypeA'><colgroup><col span='2'></colgroup><tbody><tr><th>직렬/지역</th><th>점수</th></tr>";
                            str += instr;
                            str += instr2;
                            str += "</tbody></table></li>";
                            instr2 = '';
                            instr2 += "<tr><td>" + d.data[i].TakeMockPartName + "</td><td>" + d.data[i].AvrPoint + "</td></tr>";
                        }
                    } else {
                        instr2 += "<tr><td>" + d.data[i].TakeMockPartName + "</td><td>" + d.data[i].AvrPoint + "</td></tr>";
                    }

                    tempAreaStr = areaStr;
                }

                $('#map_area').html(str);

            },
            function(ret, status){
                //alert(ret.ret_msg);
            }, true, 'POST', 'json');
    }

    function noticeListAjax(BoardIdx){

        url = "{{ site_url("/predict/noticeListAjax") }}";
        var data = {
            '{{ csrf_token_name() }}' : $ajax_form.find('[name="{{ csrf_token_name() }}"]').val(),
            '_method' : 'POST',
            'BoardIdx': BoardIdx
        };
        sendAjax(url,
            data,
            function(d){
                var datalen = d.data.length;
                var area1 = "";
                var area2 = "<table><col widht='10%'/><col widht=''/><col widht='20%'/><thead><tr><th>NO</th><th>제목</th><th>등록일</th></tr></thead><tbody>";
                var j = 1;
                for(var i=0; i < datalen; i++) {
                    if(i < 5){
                        area1 += "<li><a href='javascript:selTitle("+d.data[i].BoardIdx+")'><span>공지</span>"+d.data[i].Title+"<strong> "+d.data[i].RegDatm+"</strong></a></li>";
                    }
                    area2 += "<tr><td>"+j+"</td><td><a href='javascript:selTitle("+d.data[i].BoardIdx+")'><strong>공지</strong><span id='selTitle"+d.data[i].BoardIdx+"'>"+d.data[i].Title+"</span></a></td><td id='selDate"+d.data[i].BoardIdx+"'>"+d.data[i].RegDatm+"</td><input type='hidden' id='selContent"+d.data[i].BoardIdx+"' value='"+d.data[i].Content+"' /></tr>";
                    j++;
                }
                area2 += "</tbody></table>";

                $('#noticeArea1').html(area1);
                $('#noticeArea2').html(area2);

            },
            function(ret, status){
                //alert(ret.ret_msg);
            }, true, 'POST', 'json');
    }

    function selTitle(idx){
        $('#popup').bPopup();
        var str = "<table><col widht='10%'/><col widht=''/><col widht='20%'/><thead><tr><th class='tx-left'><strong>공지</strong>"+$('#selTitle'+idx).html()+"<span>"+$('#selDate'+idx).html()+"</span></th></tr></thead><tbody><tr><td class='tx-left'>"+$('#selContent'+idx).val()+"</td></tr></tbody></table>";
        if(idx != ''){
            $('#noticeArea3').html(str);
        }
    }

    /*시험 난이도 설문조사 */
    function pullOpen(){
        var url = "1210_popup";
        window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=660,height=700');
    }

    function tabMove(num) {
        if(num == 1){
            var url = "{{ site_url('/promotion/index/cate/3001/code/1210') }}" ;
            location.replace(url);
        } else if(num == 2) {
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/index/cate/3001/code/1211') }}" ;
            location.replace(url);
        } else if(num == 3) {
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/index/cate/3001/code/1212') }}" ;
            location.replace(url);
        } else {
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/index/cate/3001/code/1213') }}" ;
            location.replace(url);
        }

    }
</script>