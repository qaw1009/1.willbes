@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/      
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2139_top_bg_n1.jpg) no-repeat center top; position: relative;}
        .evtTop .NSK{font-size:36px; color:#fff8ff; position: absolute; bottom:0; left:50%; margin-left:-560px; letter-spacing:-1px;max-width:1120px; width:100%; text-align:center;}
        .downWrap{background-color:#45c7e5;}
        .downWrap .btns{position: relative; width:1120px; margin:0 auto;}
        .downWrap .btns a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        .evt01 {padding:50px 0 100px; border-bottom:1px solid #ccc; width:1120px; margin:0 auto; position:relative;}
        .evt01 .txtinfo {position:absolute; top:0; left:0; width:100%; z-index: 2; background:rgba(255,255,255,.9); display: flex; justify-content: center; align-items: center; height:650px; font-size:50px; line-height:1.3; text-shadow:0 5px 10px rgba(0,0,0,.2); color:#5b4ffb; }
        .evt01 .txtinfo span {color:#000; font-size:70px}
     
        .evt01 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt01 .request h3 {font-size:17px;}
        .evt01 .request td {padding:10px; font-size:14px}
        .evt01 .request input {height:26px;}
        .evt01 .requestL {width:48%; float:left}
        .evt01 .requestR {width:48%; float:right; }
        .evt01 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:196px; overflow-y:scroll }
        .evt01 .requestL li {display:inline-block; margin-right:10px}
        .evt01 .requestR li {margin-bottom:5px}
        .evt01 .request:after {content:""; display:block; clear:both}
        .evt01 .btn {clear:both; width:500px; margin:0 auto;}
        .evt01 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt01 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

        .evt01 input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

        .evt03 {background:#f6f0e0}  
        .evt04 {background:#978674} 
        
        .youtube {background:#f4f4f4; padding:0 0 100px 0;}
        .youtube .NSK-Black {color:#fff; font-size:50px; margin-bottom:50px}
        .youtube ul {width:1120px; margin:0 auto}
        .youtube li {display:inline;}
        .youtube li:last-child {margin-left:20px}        
        .youtube li div {margin-top:30px; font-size:30px; font-weight:bold; color:#595959}
        .youtube li div span {color:#fff;}
        .youtube li iframe {width:550px; height:310px}
        .youtube ul:after {content:''; display:block; clear:both}

        .loadmapBox .loadmap {position: relative; padding-bottom:56.25%; height: 0; overflow: hidden; max-width:100%; height:auto; }
        .loadmapBox .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}
        .loadmapBox ul {width:1120px; margin:100px auto}
        .loadmapBox li {float:left; width:calc(50% - 30px); font-size:18px; text-align:left; line-height:1.8; margin-bottom:10px; font-weight:bold; list-style:disc; margin-left:20px}
        .loadmapBox li div {font-size:16px}
        .loadmapBox li div span {vertical-align:middle; font-size:12px; padding:0 10px; display:inline-block; margin-right:10px; color:#fff; background:#58a933; font-weight:normal}
        .loadmapBox li div span.blue {background:#3a65b4}
        .loadmapBox li div span.red {background:#cc0003}
        .loadmapBox ul:after {content:''; display:block; clear:both}        
    </style>

<form name="regi_form_register" id="regi_form_register">
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
{{--            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>--}}
    {{--@foreach($arr_base['register_list'] as $key => $val)
        <input type="hidden" name="register_chk[]" value="{{$val['ErIdx']}}"/>
    @endforeach--}}
{{--            <input type="hidden" name="target_params[]" value="register_data1"/> --}}{{-- 체크 항목 전송 --}}
{{--    <input type="hidden" name="target_params[]" value="register_data2"/> --}}{{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_param_names[]" value="참여캠퍼스"/> --}}{{-- 체크 항목 전송 --}}
{{--    <input type="hidden" name="target_param_names[]" value="직렬"/> --}}{{-- 체크 항목 전송 --}}
    <input type="hidden" name="register_type" value="promotion"/>
    <!--<input type="hidden" name="register_chk_col[]" value="EtcValue"/>
    <input type="hidden" name="register_chk_val[]" value=""/>-->

    <div class="evtContent NSK" id="evtContainer">
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2139_top_n1.jpg"  alt="사립탐정사"/>
            <div class="NSK">사립탐정사 시험 필수 자료</div>
        </div> 

        <div class="evtCtnsBox downWrap">
            <div class="btns">  
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2139_down_btns.jpg"  alt="pdf 파일 다운"/>
                <a title="형사법" style="position: absolute; left: 20.18%; top: 27.41%; width: 26.7%; height: 19.63%; z-index: 2;" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif"></a>
                <a title="탐정윤리" style="position: absolute; left: 65.98%; top: 27.1%; width: 26.7%; height: 19.63%; z-index: 2;" href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif"></a>
                <a title="헌법" style="position: absolute; left: 20.18%; top: 53.27%; width: 26.7%; height: 19.63%; z-index: 2;" href="@if(empty($file_yn) === false && $file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif"></a>
                <a title="탐정관계법" style="position: absolute; left: 65.98%; top: 53.58%; width: 26.7%; height: 19.63%; z-index: 2;" href="@if(empty($file_yn) === false && $file_yn[3] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif"></a>
            </div>            
        </div>

        <div class="evtCtnsBox youtube">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2139_04.jpg"  alt="영상으로 만나보세요"/>
            <ul>
                <li>                    
                    <iframe src="https://www.youtube.com/embed/A0fi0Juq_7U?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                    
                </li>         
            </ul>            
        </div>

        <div class="evtCtnsBox evt01">           
            <div class="btn NGEB">               
                <a href="https://bit.ly/3rLYbLd" target="_blank">사립탐정 자격시험 예약하기 ></a>
            </div>          
        </div>

        <div class="evtCtnsBox evt02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/02/2139_01.jpg"  alt="사립탐정사 자격시험" />
                <a href="https://bit.ly/3rLYbLd" target="_blank" title="" style="position: absolute;left: 20.45%;top: 60.56%;width: 20.89%;height: 1.7%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2139_02.jpg"  alt="간단히 알고가는 사립탐정사">
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2139_03.jpg"  alt="간단히 알고가는 사립탐정사">
        </div>

        <div class="evtCtnsBox loadmapBox">
            <div class="loadmap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.7927493090915!2d126.94179831559448!3d37.51280597980801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1603420278998!5m2!1sko!2skr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <ul>
                <li>
                    주소 : 서울시 동작구 만양로 105 한성빌딩 2층
                </li>
                <li>
                    문의 : 1833-7201<br>
                    시험장소 : 윌비스 신광은 경찰학원
                </li>
                <li>
                    지하철 이용 시
                    <div>
                    노량진 1호선 1번 출구 도보로 3분<br>
                    노량진 9호선 3번 출구 도보로 4분<br>
                    </div>
                </li>
                <li>
                    버스 이용 시
                    <div>
                        <span class="blue">간선</span> N15, 150, 152, 360, 500, 504, 507, 605, 640, 654, 751, 752<br>
                        <span>지선</span> 5516, 5517, 5531, 5535, 5536, 6211, 6411, 8551<br>
                        <span class="red">지선</span> 9408<br>
                        <span>마을</span> 동작01, 동작03, 동작08, 동작13<br>
                    </div>
                </li>
            </ul>
        </div>
        
    </div>
    <!-- End Container -->
</form>
    <script>
        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_name"]').val()) == '') {
                alert('이름을 입력하셔야 합니다.');
                $("#register_name").focus();
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_tel"]').val()) == '') {
                alert('연락처를 입력하셔야 합니다.');
                $("#register_tel").focus();
                return;
            }
            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length == 0) {
                alert('접수하려는 시험을 선택하세요.');
                return;
            }
            // if ($regi_form_register.find('input[name="register_data2"]').is(':checked') === false) {
            //     alert('직렬을 선택하셔야 합니다.');
            //     return;
            // }

            if (!confirm('저장하시겠습니까?')) { return true; }

            //전부 disabled 처리
            $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', true);

            //체크 disable 해제
            $regi_form_register.find('input[name="register_chk[]"]:checked').each(function(i){
                $(this).attr('disabled', false);
            });

            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
            $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', false); //disable 해제
        }
    </script>
@stop