@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/ 
        
        .skybanner {
            position:fixed; 
            top:200px; 
            right:0;
            z-index:1;            
        }
       
        .evt00 {background:#404040}        
        .evtTop{background:#f4d59e}
        .evt01 {background:#cd9967; padding-bottom:100px}          
        
        .form_area{width:980px;background:#fff;margin:0 auto;padding:0 65px;}
        .form_area h4{height:50px;line-height:50px;font-size:30px;}
        .form_area h5{font-size:16px;margin-bottom:10px;font-weight:bold; color:#6585ab;}
        .form_area strong {display:inline-block; width:120px; color:#b2213f}
        .form_area .star {color:#363636; margin-right:5px;font-size:7px; vertical-align:middle}
        .privacy {text-align:left; border:20px solid #e9e9e9; margin-top:30px; padding:40px; font-size:16px;}
        .privacy p {margin-bottom:15px}

        .form_area label{font-weight:bold;font-size:14px;display:inline-block; margin-left:5px; margin-right:10px}
        .form_area label.username{letter-spacing:10px;letter-spacing:3.5px;}
        .form_area input[type=text],
        .form_area input[type=tel] { height:30px; line-height:30px}
        .form_area input[type=checkbox],
        .form_area input[type=radio]{padding-left:15px; width:18px; height:18px}
        .form_area .check_contact .check{font-weight:normal;}
        .form_area .check_contact strong {font-weight:bold; width:100%}   
        .area li {display:inline !important; float:left; width:16.66666%; line-height:1.5; margin-bottom:5px} 
        .area:after {content:""; display:block; clear:both}    
        input:checked + label {color:#1087ef;}

        .privacy .info{padding:20px; border:1px solid #e4e4e4;margin-top:20px}
        .privacy .info li{font-size:12px; list-style:decimal; margin-left:15px; line-height:1.5}
        .detail{line-height:20px;}
        .accept{text-align: center;padding: 20px 0 50px 0;font-size: 17px;font-weight: bold;}        

        .btn a {font-size:30px; display:block; border-radius:50px; background:#333; color:#fff; padding:20px 0}
        .btn a:hover {background:#b2213f;}   

        .evt02 {background:#99cc67; padding:100px 0}
        .evt02 > div {width:700px; margin:0 auto}
        .evt02 > div table {table-layout: auto;}
        .evt02 > div table th,
        .evt02 > div table td {padding:10px 5px; border-bottom:1px solid #252525; border-right:1px solid #6f95ff; text-align: center; font-weight: 600; font-size:20px}
        .evt02 > div table th {background: #252525; color:#fff;} 
        .evt02 > div table td {font-size:18px; color:#fff;}
        .evt02 > div table td div {position:relative}
        .evt02 > div table td span {position:absolute; width:100%; top:0; left:0; z-index:5}
        .evt02 > div table tbody th {background: #f9f9f9; color:#555;} 
        .evt02 ul { width:1000px; margin:50px auto 0}
        .evt02 li {display:inline; width:50%; float:left}
        .evt02 li a {display:block; margin:0 30px; font-size:28px; font-weight:600; background:#224dc5; color:#fff; border-radius:50px; padding:20px; text-align:center}
        .evt02 li:last-child a {background:#4ae59f; color:#000}
        .evt02 li a:hover {background:#102665; color:#fff}
        .evt02 ul:after {content:""; display:block; clear:both}

        .evt03 {padding:100px 0; background:#ffcbff} 
        .evt03 div {background:#fff; width:1120px; height:400px; margin:0 auto}

        .evt04 {padding:100px 0; background:#ffcccc} 
        .evt04 .slide_con {position:relative; width:900px; margin:0 auto}
        .evt04 .slide_con p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .evt04 .slide_con p.leftBtn {left:-80px}
        .evt04 .slide_con p.rightBtn {right:-80px}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:1120px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:0}
        .slide_con p.rightBtn {right:0}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}

        /*유의사항*/
        .wb_ctsInfo {background:#2b2b2b; padding:100px 0}  
        .wb_ctsInfo div {
            width:980px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;
            font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#f97f7a} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
            text-decoration:underline}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
        }
        .wb_ctsInfo div dl:before{
            background: #f97f7a none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">    
        <div class="skybanner">
            <a href="#evt"><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_sky01.jpg" alt="스카이베너" ></a>
        </div>       
     
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1443_00.jpg" title="신광은 경찰팀">
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1545_top.jpg" title="손꼽아 기다리던 합격봉투">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1545_01.jpg" title="완벽분석,개정법령">
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="register_chk_el_idx" value="{{ $data['ElIdx'] }}"/> {{-- 하나수강만 선택 가능할시 --}}
                <input type="hidden" name="target_params[]" value="register_data1[]"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_param_names[]" value="희망지원청"/> {{-- 체크 항목 전송 --}}

                <input type="hidden" name="register_chk[]" id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>

                <div id="apply">                    
                    <div class="form_area">
                        <h4 class="NGEB">신광은경찰팀 봉투 모의고사 이벤트</h4>
                        <div class="privacy">
                            <div class="contacts">
                                <p><strong><span class="star">▶</span>이름</strong><input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" readonly /></p>
                                <p><strong><span class="star">▶</span>연락처</strong><input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" maxlength="11" readonly/></p>
                                <p class="check_contact">
                                    <strong><span class="star">▶</span>2020년 1차  희망지원청</strong><br>
                                    <ul class="area">
                                        <li><input type="checkbox" name="register_data1[]" id="aa1" value="서울청"><label for="aa1"> 서울청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa2" value="대구청"><label for="aa2"> 대구청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa3" value="인천청"><label for="aa3"> 인천청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa4" value="광주청"><label for="aa4"> 광주청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa5" value="대전청"><label for="aa5"> 대전청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa6" value="울산청"><label for="aa6"> 울산청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa7" value="경기남부"><label for="aa7"> 경기남부</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa8" value="경기북부"><label for="aa8"> 경기북부</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa9" value="강원청"><label for="aa9"> 강원청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa10" value="충북청"><label for="aa10"> 충북청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa11" value="충남청"><label for="aa11"> 충남청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa12" value="전북청"><label for="aa12"> 전북청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa13" value="전남청"><label for="aa13"> 전남청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa14" value="경북청"><label for="aa14"> 경북청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa15" value="경남청"><label for="aa15"> 경남청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa16" value="부산청"><label for="aa16"> 부산청</label></li>
                                        <li><input type="checkbox" name="register_data1[]" id="aa17" value="제주청"><label for="aa17"> 제주청</label></li>
                                    </ul>
                                </p>
                            </div>
                            <div class="mt30 mb30 tx14">
                                * 이름 및 연락처 수정은 로그인 후 회원정보 수정을 통해 가능합니다.
                            </div>
                            <div class="info">
                                <h5><span class="star">▶</span>개인정보 수집 및 이용에 대한 안내</h5>
                                <ul>
                                    <li>이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대 </li>
                                    <li>이벤트 참여에 따른 강의 수강자 목록에 활용 </li>
                                    <li>개인정보 수집 항목<br>
                                        - 신청인의 이름, 연락처, 희망청 </li>
                                    <li>개인정보 이용기간 및 보유기간<br>
                                        - 본 수집, 활용목적 달성 후 바로 파기 </li>
                                    <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익</li>
                                    <li>귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 
                                    위 제공사항은 이벤트 참여를 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.</li>
                                </ul>
                            </div>
                        </div>
                        <p class="accept">
                            <input type="checkbox" name="is_chk" id="is_chk" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </p>
                        <div class="btn NGEB">
                            <a onclick="javascript:fn_submit();">
                                신광은경찰팀 봉투 모의고사 이벤트 참여하기 >
                            </a>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        <form id="add_apply_form" name="add_apply_form">
            <div class="evtCtnsBox evt02" id="evt">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/>
                @foreach($arr_base['add_apply_data'] as $row)
    {{--                    <input type="radio" name="add_apply_chk[]" id="add_apply_{{ $row['EaaIdx'] }}" value="{{$row['EaaIdx']}}" /> <label for="register_chk_{{ $row['EaaIdx'] }}">{{ $row['Name'] }}</label>--}}
    {{--                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyStartDatm']))--}}
                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                        <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                        @break;
                    @endif
                @endforeach

                <img src="https://static.willbes.net/public/images/promotion/2020/02/1545_02.jpg" title="봉투모의고사 선착순 증정">
                <div>
                    <table cellspacing="0" cellpadding="0">
                        <colgroup>
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td>2/24</td>
                                <td>2/25</td>
                                <td>2/26</td>
                                <td>2/27</td>
                                <td>2/28</td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202002240000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day01.png" alt="형사소송법">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202002250000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day02.png" alt="경찰학개론">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202002260000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day03.png" alt="형법">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202002270000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day04.png" alt="영어">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202002280000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day05.png" alt="한국사">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2/29</td>
                                <td>3/1</td>
                                <td>3/2</td>
                                <td>3/3</td>
                                <td>3/4</td>
                            </tr>
                            <tr>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202002290000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day01_20.png" alt="형사소송법">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202003010000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day02_20.png" alt="경찰학개론">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202003020000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day03_20.png" alt="형법">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202003030000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day04_20.png" alt="영어">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if(time() >= strtotime('202003040000')) <span><img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day_end.png" alt="마감"></span> @endif
                                        <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02_day05_20.png" alt="한국사">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul>
                    <li><a onclick="javascript:fn_add_apply_submit();" target="_blank">매일 50명, 총500명 이벤트신청 확인하기 ></a></li>
                    <li><a onclick="javascript:fn_promotion_etc_submit();" target="_blank">총500명 한정판매 실물 봉투모의고사 빠른 유료구매 ></a></li>
                </ul>
            </div>
        </form>
        
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1545_03.jpg"  alt=""/>
            <div>
                응시청 그래프 영역 > 개발 영역
            </div>
        </div>
        
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04.jpg"  alt=""/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_01.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_02.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_03.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_04.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_05.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/02/1545_04_06.jpg" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2019/09/1009_01_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2019/09//1009_01_arrowR.png"></a></p>
            </div>
        </div>

        <div class="wb_ctsInfo NGR" id="ctsInfo">
            <div>
                <h3 class="NGEB">유의사항</h3>
                <dd>
                    <dt>봉투모의고사 구성안내</dt>
                    <dl>봉투 모의고사 구성은 한국사,영어,형법,형소법,경찰학개론 과목별 3회분 전범위모의고사 및 별도해설/OMR카드 포장하여 증정됩니다.</dl>
                    <dl>이벤트 상품은 비매품으로 절대 판매할수 없습니다.</dl>                 
                </dd>                
                <dd>
                    <dt>봉투모의고사 이벤트 신청안내</dt>
                    <dl>신청기간 : 2020년 2월 24일~3월 4일까지 ,매일 20시부터 선착순 50명 및 유료구매진행<br>
                        매일 20시 총 10일 – 선착순 50명 / 총 500명<br>
                        유료 봉투모의고사 – 이벤트참여회원만 가능 총 500부 / 마감시 종료
                    </dl>
                    <dl>신청방법<br>
                        - 로그인 이후 이벤트 페이지에서 신청가능합니다(희망응시청 필수 체크)<br>
                        - 한ID 당 1회 신청가능(50명 이벤트 중복당첨불가) <br>
                        - 무료배포 이벤트 당첨회원도 유료구매 가능합니다.<br>
                        - 무료배포 당첨자는 추후 합격예측서비스 필수 참여 (미참여시 발송불가) <br>
                        - 3월 5일(목) 일괄문자 안내공지 진행합니다.(무료 당첨자에 한함)<br>
                        - 유로결제회원은 신청시 자동으로 장바구니지급되며 미결제시  3/5 9시이후 장바구니에서 삭제됩니다.
                    </dl>
                </dd>
                <dd>
                    <dt>이벤트 봉투모의고사 </dt>
                    <dl>무료이벤트  진행 : 매일 20시 선착순 50권 , 총 500부 </dl>
                    <dl>유료판매진행 : 총 500부 (마감시 판매종료)</dl>
                    <dl>무료이벤트 : 추후 배송비 2,500원 결제</dl>
                    <dl>유료구매이벤트 : 12,000원(배송비 포함)</dl>  
                </dd>
            </div>
        </div>        

	</div>
    <!-- End Container -->

    <script type="text/javascript">

        function fn_promotion_etc_submit() {
            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/promotionEtcStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.href = '{!! front_url('/cart/index?tab=book') !!}';
                    // location.reload();
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg || '') );
            }, null, false, 'alert');
        }

        function fn_add_apply_submit() {
            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/addApplyStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
                alert('이벤트 기간이 아닙니다.'); return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.reload();
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg || '') );
            }, null, false, 'alert');
        }

        // 이벤트 추가 신청 메세지
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['이미 신청하셨습니다.','이미 당첨되셨습니다.'],
                ['신청 되었습니다.','당첨을 축하합니다. <3.5 안내문자> <공지예정입니다>'],
                ['처리 되었습니다.','장바구니에 담겼습니다.']
            ];

            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1[]"]:checked').length == 0) {
                alert('희망지원청을 선택 해주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_data1[]"]:checked').length > 1) {
                alert('희망지원청은 1개까지만 선택 가능합니다.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop