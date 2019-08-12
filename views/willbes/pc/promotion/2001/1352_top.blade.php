<ul class="skyBanner">
    <li><a href="#event">채점만해도<Br />선물증정</a></li>
    <li><a href="javascript:tabMove(2);">빠른채점</a></li>
    <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/1208" target="_blank">라이브 토크쇼</a></li>
    <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/1199" target="_blank">적중이벤트</a></li>
    {{--<li><a href="#none" >합격예측</a></li>--}}
    <li><a href="#evtContainer">top</a></li>
</ul>

{{--<div class="conut_section">--}}
{{--<div class="conut_section_wrap" id="counter">--}}
{{--<div>--}}
{{--<span>서비스 이용현황 :</span>--}}
{{--<span id="numarea1"></span>--}}

{{--<span>참여 현황 :</span>--}}
{{--<span id="numarea2"></span>--}}
{{--</div>--}}
{{--<p>--}}
{{--* 서비스 이용현황 : 사전예약 및 본서비스 + 봉투모의고사 + 파이널찍기특강 + 최신판례특강 + 라이브토크쇼 + 적중이벤트 등 서비스 이용 페이지뷰 합산<Br />--}}
{{--* 참여현황 : 사전예약, 성적채점, 설문조사, 시험후기, 토크쇼, 적중이벤트 참여건수 중복 합산 기준--}}
{{--</p>--}}
{{--</div>--}}
{{--</div>--}}

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
                    <li class="a01"><a id="area_712001" data-slide-index="" href="#none" class="active">서울</a></li>
                    <li class="a02"><a id="area_712004" data-slide-index="" href="#none">인천</a></li>
                    <li class="a03"><a id="area_712009" data-slide-index="" href="#none">경기북부</a></li>
                    <li class="a04"><a id="area_712008" data-slide-index="" href="#none">경기남부</a></li>
                    <li class="a05"><a id="area_712010" data-slide-index="" href="#none">강원</a></li>
                    <li class="a06"><a id="area_712011" data-slide-index="" href="#none">충북</a></li>
                    <li class="a07"><a id="area_712012" data-slide-index="" href="#none">충남</a></li>
                    <li class="a08"><a id="area_712006" data-slide-index="" href="#none">대전</a></li>
                    <li class="a09"><a id="area_712015" data-slide-index="" href="#none">경북</a></li>
                    <li class="a10"><a id="area_712016" data-slide-index="" href="#none">경남</a></li>
                    <li class="a11"><a id="area_712003" data-slide-index="" href="#none">대구</a></li>
                    <li class="a12"><a id="area_712002" data-slide-index="" href="#none">부산</a></li>
                    <li class="a13"><a id="area_712007" data-slide-index="" href="#none">울산</a></li>
                    <li class="a14"><a id="area_712013" data-slide-index="" href="#none">전북</a></li>
                    <li class="a15"><a id="area_712014" data-slide-index="" href="#none">전남</a></li>
                    <li class="a16"><a id="area_712005" data-slide-index="" href="#none">광주</a></li>
                    <li class="a17"><a id="area_712017" data-slide-index="" href="#none">제주</a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="talkShow">
        <a href="https://police.willbes.net/promotion/index/cate/3001/code/1199" target="_blank" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_top_bn4.png" alt="LIVE 합격예측 토크쇼">
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
                <a href="javascript:go_popup()">
                    <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_top_notice.png" alt="공지사항">
                </a>
            </h3>
            <ul>
                @if(empty($arr_base['notice_list']) === true)
                    <li><a>등록된 내용이 없습니다.</a></li>
                @endif
                @foreach($arr_base['notice_list'] as $row)
                    <li>
                        <a href="javascript:go_popup('{{ $row['BoardIdx'] }}')">
                            {{ $row['Title'] }}
                            @if(date('Y-m-d') == $row['RegDatm'])<img src="https://static.willbes.net/public/images/promotion/2019/04/1211_icon_new.png" alt="new">@endif
                            <strong>{{ $row['RegDatm'] }}</strong>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!--wNotice//-->

    {{--공지사항 레이어팝업--}}
    <div id="popup" class="Pstyle NGR">
        <div id="promotion_notice"></div>
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
    var slideMap = null;

    /*서비스이용현황 */
    $(document).ready(function() {
        if('{{ENVIRONMENT}}' !== 'local' && '{{ENVIRONMENT}}' !== 'development') {
            @if(date('YmdHi') >= '201905011600')
            alert('서비스가 종료되었습니다.');
            location.href = '{{ site_url('/home/index/cate/3001') }}';
            @endif
        }

        // 상단 합격안정권 예측 데이터 조회
        areaAvrAjax('{{ $arr_promotion_params['PredictIdx'] }}');

        // 지역 클릭시 슬라이드 이동
        $('#MapRollingDiv').on('click', 'li', function() {
            var index = $(this).find('a').data('slide-index');
            slideMap.goToSlide(index);
        });

        // 과목별 성적분포
        var slidesImg3 = $("#slidesImg3").bxSlider({
            mode:'fade',
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
            pager:false
        });

        $("#imgBannerLeft3").click(function() {
            slidesImg3.goToPrevSlide();
        });

        $("#imgBannerRight3").click(function() {
            slidesImg3.goToNextSlide();
        });
    });

    function areaAvrAjax(PredictIdx) {
        var url = "{{ site_url("/predict/areaAvrAjax") }}";
        var data = {
            '{{ csrf_token_name() }}' : $ajax_form.find('[name="{{ csrf_token_name() }}"]').val(),
            '_method' : 'POST',
            'PredictIdx': PredictIdx
        };

        sendAjax(url, data, function(ret) {
            var html = '';
            var idx = 0;
            if (Object.keys(ret.data).length > 0) {
                $.each(ret.data, function (key, arr) {
                    var arr_area = key.split(':');

                    html += '<li data-area-ccd="' + arr_area[0] + '">\n' +
                        '<p>합격안정권 예측 <span>' + arr_area[1] + '</span></p>\n' +
                        '<table class="boardTypeA">\n' +
                        '<col span="2" />\n' +
                        '<tr>\n' +
                        '<th>직렬/지역</th>\n' +
                        '<th>점수</th>\n' +
                        '</tr>\n';

                    $.each(arr, function (name, value) {
                        html += '<tr>\n' +
                            '<td>' + name + '</td>\n' +
                            '<td>' + value + '</td>\n' +
                            '</tr>';
                    });

                    html += '</table>\n' +
                        '</li>';

                    // slide index 설정
                    $('#area_' + arr_area[0]).data('slide-index', idx);
                    idx++;
                });
            }

            $('#map_area').html(html);

            slideMap = $("#map_area").bxSlider({
                auto: true,
                mode: 'fade',
                speed: 1000,
                pause: 4000,
                randomStart: false,
                controls: false,
                //pagerCustom: '#MapRollingDiv'
                onSlideBefore: function ($slideElement, oldIndex, newIndex) {
                    var area_ccd = $slideElement.data('area-ccd');
                    var pager = $('#MapRollingDiv li a');
                    pager.removeClass('active');
                    pager.filter('#area_' + area_ccd).addClass('active');
                }
            });
        }, function(ret, status) {
            alert('에러가 발생하였습니다.');
        }, true, 'POST');
    }

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
        var _url = '{{ front_url("/predict/cntForPromotion/") }}';
        var _data = {
            'type' : 2,
            'event_idx' : '{{ $data['ElIdx'] }}',
            'promotion_code' : '{{ $arr_base['promotion_code'] }}',
            'sp_idx' : '{{ (empty($arr_promotion_params['spidx2']) === false) ? $arr_promotion_params['spidx2'] : '' }}',
            'predict_idx' : '{{ (empty($arr_promotion_params) === false) ? $arr_promotion_params['PredictIdx'] : '' }}'
        };

        sendAjax(_url, _data, function(ret) {
            if (ret.ret_cd) {
                var s = ret.ret_data; //.format();
                $('#numarea1').html(makeCount(s));
            }
        }, showError, false, 'GET');
    }

    // 합격예측카운트수
    function get_cnt3()
    {
        var _url = '{{ front_url("/predict/cntForPromotion/") }}';
        var _data = {
            'type' : 3,
            'event_idx' : '{{ $data['ElIdx'] }}',
            'promotion_code' : '{{ $arr_base['promotion_code'] }}',
            'sp_idx' : '{{ (empty($arr_promotion_params['spidx2']) === false) ? $arr_promotion_params['spidx2'] : '' }}',
            'predict_idx' : '{{ (empty($arr_promotion_params) === false) ? $arr_promotion_params['PredictIdx'] : '' }}'
        };

        sendAjax(_url, _data, function(ret) {
            if (ret.ret_cd) {
                var s = ret.ret_data; //.format();
                $('#numarea2').html(makeCount(s));
            }
        }, showError, false, 'GET');
    }

    function noticeListAjax(BoardIdx){
        var url = "{{ site_url("/predict/noticeListAjax") }}";
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
        /*var url = "1210_popup";*/
        var url = "1344_popup";
        window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=660,height=700');
    }

    function tabMove(num) {
        if(num == 1){
            var url = "{{ site_url('/promotion/index/cate/3001/code/1344') }}";
        } else if(num == 2) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/index/cate/3001/code/1352') }}";
        } else if(num == 3) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/index/cate/3001/code/1353') }}" ;
        } else {
            var url = "{{ site_url('/promotion/index/cate/3001/code/1354') }}";
        }
        location.href = url;
    }

    /*레이어팝업*/
    function go_popup(param) {
        var ele_id = 'promotion_notice';
        var data = {
            'ele_id' : ele_id,
            'board_idx' : param,
            'predict_idx' : '{{ $arr_base['spidx'] }}',
            'promotion_code' : '{{ $arr_base['promotion_code'] }}'
        };
        sendAjax('{{ front_url('/support/predictNotice/index') }}', data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            $('#popup').bPopup();
        }, showAlertError, false, 'GET', 'html');
    }

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
</script>