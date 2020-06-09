@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
        .evtCtnsBox img {width:100%; max-width:720px;}

        /************************************************************/
        .evtTop {}
        .evt01 {}

        .evtprof {background:#1e252e;}
        .evtprof .swiper-container-prof {overflow:hidden; margin:0}
        .evtprof .swiper-container-prof .swiper-slide { 
            width:100%;  
            height:100%;           
            margin:0 !important;
            padding: !important;  
            background:#1e252e;
        /* Center slide text vertically */ 
            display: -webkit-box; 
            display: -ms-flexbox; 
            display: -webkit-flex; 
            display: flex; 
            -webkit-box-pack: left; 
            -ms-flex-pack: left; 
            -webkit-justify-content: left; 
            justify-content: left; 
            -webkit-box-align: left; 
            -ms-flex-align: left; 
            -webkit-align-items: left; 
            align-items: left; 
        } 
        .evtprof .swiper-container-prof .swiper-slide img {width:100%}
        .evtprof .swiper-container-prof .swiper-pagination {top:30px !important;} 
        .evtprof .review { position:absolute; bottom:20px; left:3%; width:94%; height:50px; background:#fff; overflow:hidden; z-index:10}
        .evtprof .review li {position:relative; height:50px; line-height:50px; font-size:16px; }
        .evtprof .review li p {width:calc(100% - 60px); overflow:hidden; white-space:nowrap; text-overflow:ellipsis; text-align:left; padding-left:10px}
        .evtprof .review span {position:absolute; top:0; height:50px;width:60px; right:0; line-height: 50px; z-index:11; color:#000}


        .evt02 {background:#1b58ef}

        .evt02 .inputBox {padding:0 20px; margin-bottom:20px}
        .evt02 .inputBox li {display:inline; float:left; width:25%; text-align:center; font-size:18px; color:#fff}
        .evt02 input[type=checkbox],
        .evt02 input[type=radio] {width:20px; height:20px}
        .evt02 label {margin-left:10px}
        .evt02 input[type=text],
        .evt02 input[type=number] {height:56px; line-height:56px; font-size:16px ; width:100%; border:0; border-radius:30px; color:#666; padding-left:20px}
        .evt02 .receive {padding:20px; font-size:14px; color:#fff; line-height:1.5; text-align:left}
        .evt02 .receive li {margin-bottom:24px}
        .evt02 .receive li:nth-child(2) {display:inline; float:left; width:35%; margin-right:5%}
        .evt02 .receive li:nth-child(3) {display:inline; float:left; width:60%;}
        .evt02 .receive ul:after {content:""; display:block; clear:both}
        .evt02 .receive div {padding-left:20px}
        .evt02 .receive div.info {padding-left:40px}
        .evt02 .receive input:focus {border:5px solid #000 !important}
        .evt02 .receive img {max-width:432px}
        .evt02 input:checked + label {border-bottom:1px dashed #fff}

        .evt03 {background:#fff; padding-bottom:100px}
        .evt03 a {display:inline-block; height:60px; line-height:60px; text-align:center; color:#fff; font-size:30px;
            border-radius:30px; padding:0 40px; margin:0 auto; background:#000}

        .evt04 {background:#c2c2c2;}
        .evt04 .evt04Box {color:#3a3a3a; text-align:left; padding:40px; font-size:14px; line-height:1.5}
        .evt04 h3 {font-size:28px; margin-bottom:30px}
        .evt04 div {font-size:16px; margin-bottom:10px}
        .evt04 .evt04Box li {list-style: disc; margin-left:15px}
        .evt04 .evt04Box ul {margin-bottom:30px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" id="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="target_params[]" value="register_data1"/>
            <input type="hidden" name="target_param_names[]" value="한줄기대평"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="register_chk_no_member" value="Y"/>  {{-- MemIdx 제외하고 등록중복체크 --}}

            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1664m_top.jpg" alt="" >
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1664m_01.jpg">
            </div>

            <div class="evtCtnsBox evtprof">
                <div class="swiper-container-prof">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/2020/06/1664m_t01.jpg" alt="" ></div>
                        <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/2020/06/1664m_t02.jpg" alt="" ></div>
                        <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/2020/06/1664m_t03.jpg" alt="" ></div>
                        <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/2020/06/1664m_t04.jpg" alt="" ></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="review">
                    <ul>
                        <li><p>안혜빈 대표님의 강의가 정말 기대됩니다. </p><span>(박민*)</span></li>
                        <li><p>싹PD님~~ 팬이에요 ^^ 멋진 강의 기대하겠습니다~~</p><span>(황희*)</span></li>
                        <li><p>이기용대표님 영상 보니 너무 멋지십니다. 믿고 따라하면 블로그마켓팅 성공 할 수 있을것 같아요^^</p><span>(김영*)</span></li>
                        <li><p>이시한 교수님!! 다른 강의도 들어서 잘 알고 있는데, 정말 좋아요!! 유튜브 저도 시작해보겠습니다!</p><span>(이정*)</span></li>
                    </ul>
                </div>
            </div>

            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1664m_02.jpg" alt="" >
                <ul class="inputBox NSK-Black">
                    @foreach($arr_base['register_list'] as $row)
                        <li>
                            <input type="radio" name="register_chk[]" id="register_chk_{{ $row['ErIdx'] }}" value="{{ $row['ErIdx'] }}"><label for="register_chk_{{ $row['ErIdx'] }}">{{ $row['Name'] }}</label>
                            <input type="hidden" name="register_chk_name[]" value="{{ $row['Name'] }}" data-register-chk="{{ $row['ErIdx'] }}"/>
                        </li>
                    @endforeach
                    {{--
                    <li><input type="radio" id="pr01"><label for="pr01"> 이시한 교수</label></li>
                    <li><input type="radio" id="pr02"><label for="pr02"> 이승기 PD</label></li>
                    <li><input type="radio" id="pr03"><label for="pr03"> 안혜빈 대표</label></li>
                    <li><input type="radio" id="pr04"><label for="pr04"> 이기용 대표</label></li>
                    --}}
                </ul>
                <div class="receive">
                    <ul>
                        <li><input type="text" name="register_data1" placeholder="한줄기대평을 적어주세요." maxlength="200"></li>
                        <li><input type="text" name="register_name" id="register_name" value="{{sess_data('mem_name')}}" placeholder="이름" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}></li>
                        <li><input type="number" name="register_tel" id="register_tel" value="{{sess_data('mem_phone')}}" placeholder="휴대폰번호(숫자만입력)" maxlength="11" oninput="onlyNumberCheck(this);"></li>
                    </ul>
                    <div class="tx16 mb10"><input type="checkbox" name="is_chk" id="is_chk"><label for="yes">1억뷰 N잡에서 진행하는 사전예약 및 이벤트 관련된 정보수신에 동의합니다.</label></div>
                    <div class="info">
                        <strong>사전예약자 확인과 할인쿠폰 등 발송을 위해 아래의 개인 정보를 수집/이용하고 있습니다. </strong><br>
                        1. 수집 항목: 이름, 연락처(휴대폰 번호) <br>
                        2. 수집 및 이용 목적: 사전예약 이벤트 응모자 관리, 당첨자 쿠폰 배송, 이벤트 관련 문의 응대 및 공지사항 안내<br>
                        3. 보유 및 이용 기간: 이벤트 종료 후 3개월까지<br>
                        ※ 제공받은 개인 정보는 경품 배송 목적으로만 활용되며, 이벤트 종료 후 3개월 이후 모두 폐기됩니다.
                    </div>
                    <div class="mt50 tx-center"><a href="javascript:fn_submit();"><img src="https://static.willbes.net/public/images/promotion/2020/06/1664m_btn.png" alt="신청하기"></a></div>
                </div>
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1664m_03.jpg" alt="" >
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1664#evtn03" target="_blank" class="NSK-Black">소문내기 이벤트 바로가기 ></a>
            </div>

            <div class="evtCtnsBox evt04">
                <div class="evt04Box">
                    <h3 class="NSK-Black">이용안내</h3>
                    <div class="NSK-Black">사전예약 1</div>
                    <ul>
                        <li>사전예약 쿠폰은 7월 1일(월) 발급 예정입니다.(신청자에 한함)</li>
                        <li>할인쿠폰 사용가능일은 발급일로부터 14일입니다.</li>
                        <li>해당 쿠폰은 인플루언서 강좌(이승기교수,이시한PD,안혜빈대표,이기용대표) 수강신청 접수 시 결제 적용됩니다.</li>
                        <li>사전예약 신청자에 한해 할인쿠폰이 발급되며, 결제 완료시 수강기간이 연장됩니다.(총 수강가능기간 365일)</li>
                    </ul>

                    <div class="NSK-Black">사전예약 2</div>
                    <ul>
                        <li>당첨발표시 동일인으로 확인 될 경우 강의 제공은 한 개의 아이디만 당첨으로 인정합니다.</li>
                        <li>당첨자 발표는 7월 6일(월) 공지사항 참고하시면 됩니다.</li>
                    </ul>
                    <div class="NSK-Black">문의안내 1544-5006</div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Container -->

    <script src="/public/vendor/jquery/swiper/swiper.js"></script>
    <script src="/public/vendor/jquery/swiper/swiper.min.js"></script>
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.min.js"></script> 
    <script>    
        var swiper = new Swiper ('.swiper-container-prof', { 
            slidesPerView: 'auto',
            spaceBetween: 0, 
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
            pagination: { 
                el: '.swiper-pagination', 
                clickable: true, 
            }, 
        }); 

        $(document).ready(function() {
            var collaboslides = $(".review ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1, 
                moveSlides:1,
            });
        });
    </script>
@stop