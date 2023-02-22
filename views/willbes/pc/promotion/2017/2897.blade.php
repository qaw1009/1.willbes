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
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
  
        .eventTop {background:#ff3e3e}
        .eventTop span {position: absolute; left:50%; top:580px; z-index: 2; margin-left:-100px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite; }
        @@keyframes upDown{
            from{transform:scale(1)}
            50%{transform:scale(0.9)}
            to{transform:scale(1)}
        }
        @@-webkit-keyframes upDown{
            from{transform:scale(1)}
            50%{transform:scale(0.9)}
            to{transform:scale(1)}
        }

        .event01 {width:1120px; margin:0 auto; text-align:left}
        .event01 .info {font-size:14px; width:1050px; margin:0 auto; }
        .event01 .info ul {border:1px solid #ccc; background:#f4f4f4; padding:20px; height:200px; overflow-y: scroll; margin-bottom:10px}
        .event01 .info li {margin-left:20px; list-style:disc; margin-bottom:5px}
        .event01 .info ul:after {content:""; display:block; clear:both}
        .event01 input,
        .event01 label {vertical-align:middle;}
        .event01 label {margin-left:5px; font-size:16px; margin-bottom:100px; display:block}
        .event01 input[type=checkbox] {width:20px; height:20px}

        .table_wrap {width:1050px; margin:0 auto 50px;}
        .table_wrap table {width:100%; border:3px solid #464646; background:#fff; margin:10px 0}
        .table_wrap td,
        .table_wrap th{padding:10px; border:1px solid #cdcdcd; border-left:0; border-top:0; font-size:15px; text-align:center}
        .table_wrap th{color:#000; font-weight:500; background:#f4f4f4}
        .table_wrap td{color:#444;padding:10px; line-height:1.5; text-align:left}
        .table_wrap tr th{border-top:1px solid #cdcdcd}
        .btnSet {width:80%; margin:50px auto 0}
        .btnSet a {display:block; padding:20px 0; text-align:center; font-size:25px; font-weight:bold; background:#ff3e3e; color:#fff; border-radius:50px}
        .btnSet a:hover {background:#333;}   

        .event02 {width:1120px; margin:0 auto 150px;}        
        .event02 .couponWrap {width:1000px; margin:80px auto; display:flex; justify-content: space-between; flex-wrap: wrap; }
        .event02 .coupon {position: relative; background:url(https://static.willbes.net/public/images/promotion/2023/02/2897_02_coupon.jpg) no-repeat; height: 250px; width: 310px; margin-bottom:30px}
        .event02 .coupon p {padding:45px 0 0 43px; text-align:left; color:#464646; font-size:17px;}
        .event02 .coupon p strong {display:block; font-size:24px; color:#9d00d8; letter-spacing:-2px}

        .event02 .btns {position:absolute; bottom:0; left:0; display:flex; justify-content: space-between; width: 100%;}
        .event02 .btns a {display:block; text-align:center; padding:10px 0; font-size:16px; color:#fff; background:#363636; width:49%}
        .event02 .btns a:hover {background:#9d00d8;}

        .event02 .textinfo {position: absolute; bottom:430px; right:180px; font-size:18px}

        .event03 {background:url(https://static.willbes.net/public/images/promotion/2023/02/2897_03_bg.jpg) no-repeat center top; }


        .evtInfo {padding:80px 0; background:#ebebeb; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2023/02/2897_top.jpg" alt="윌비스 임용 합격 환승센터"/>
            <span><img src="https://static.willbes.net/public/images/promotion/2023/02/2897_top_01.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2897_01_01.jpg"/>
            <div class="info">
                <ul>
                    <li>개인정보 수집 이용 목적  <br>
                        - 본 이벤트의 대상자(타학원 수강이력이 있는 수험생) 확인 및 각종 문의사항 응대<br>
                        - 통계분석 및 기타 마케팅에 활용<br>
                        - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공 </li>
                    <li>개인정보 수집 항목<br>
                    - 필수항목 : 성명, 본사ID, 연락처, 타학원의 수강이력 인증파일 </li>
                    <li>개인정보 이용기간 및 보유기간<br>
                    - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기 </li>
                    <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                    - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다. </li>
                    <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
                    <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                </ul>
                <label><input class="btn-login-check" type="checkbox" id="is_chk" name="is_chk" value="Y" title="개인정보 수집/이용 동의" autocomplete="off"> 이벤트참여에 따른 개인정보 및 마케팅활용 동의하기(필수)</label>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2897_01_02.jpg"/>
            <div class="table_wrap">
                <table>
                    <col width="15%">
                    <col width="20%">
                    <col width="15%">
                    <col width="20%">
                    <col width="15%">
                    <col>
                    <tbody>
                        <tr>
                            <th>성명</th>
                            <td>{{sess_data('mem_name')}}</td>
                            <th>윌비스 ID</th>
                            <td>{{sess_data('mem_id')}}</td>
                            <th>연락처</th>
                            <td>{{sess_data('mem_phone')}}</td>
                        </tr>
                        <tr>
                            <th>응시예정과목</th>
                            <td>
                                <select id="register_data1" name="register_data1" title="과목">
                                    <option value="">과목 선택</option>
                                    <option value="">유아</option>
                                    <option value="">국어</option>
                                    <option value="">영어</option>
                                    <option value="">수학</option>
                                    <option value="">역사</option>
                                    <option value="">음악</option>
                                    <option value="">중국어</option>
                                </select>
                            </td>
                            <th>받고자 하는 쿠폰</th>
                            <td colspan="4">
                                <select id="register_data" name="register_data" title="쿠폰">
                                    <option value="">쿠폰 선택</option>
                                    <option value="">[이경범] 교육학 3~11월 패키지 10% 할인 쿠폰</option>
                                    <option value="">[송원영] 3~11월 국교/문교 패키지 10%할인 쿠폰</option>
                                    <option value="">[송원영] 3~11월 국교론 패키지 10%할인 쿠폰</option>
                                    <option value="">[권보민] 3~11월 국어문법 패키지 10%할인 쿠폰</option>
                                    <option value="">[송원영+권보민] 3~11월 완전정복 패키지 10%할인 쿠폰</option>
                                    <option value="">[박태영] 3~11월 수학교육론 패키지 10% 할인 쿠폰</option>
                                    <option value="">[박혜향] 3~11월 수학교육론 패키지 10% 할인 쿠폰</option>
                                    <option value="">[김종권] 3~11월 전공역사 패키지 10% 할인 쿠폰</option>
                                    <option value="">심화 Free Pass 패키지 00% 할인 쿠폰</option>
                                    <option value="">[장영희] 3~11월 중국어 초수트랙 패키지 10% 할인 쿠폰</option>
                                    <option value="">[박태영] 3~11월 중국어 N+수트랙 패키지 10% 할인 쿠폰</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>수강이력 인증 파일</th>
                            <td colspan="5">
                                <input class="btn-login-check" type="file" id="attach_file_1" name="attach_file" onchange="chkUploadFile(this)" style="width:40%; margin-right:10px"/>
                                <a onclick="del_file(1);"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a>
                                * 10MB 이하의 이미지 파일(png, jpg, gif, bmp)
                            </td>
                        </tr>

                    </tbody>
                </table>
                <ul class="evtInfoBox">
                    <li>환승할인 쿠폰의 발급을 위한 인증서류는 수강학원명, 수강생명, 수강과목, 수강기간이 명기되어 있는 
                    수강증, 1개월 이내 발급된 수강확인증만 인정됩니다.</li>
                    <li>타학원의 수강인증은 2021년 ~ 2022년에 진행된 (유료)강의만 해당 됩니다.</li>
                    <li>인증 서류의 식별이 불가능한 경우 또는 이미지를 도용한 경우에는 할인혜택이 적용이 불가합니다.</li>
                </ul>
                <div class="btnSet">
                    <a href="{!! front_url('/event/registerStore') !!}" onclick="fn_submit(); return false;">수강이력 인증하기 ></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox event02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2897_02.jpg"/>
            <div class="couponWrap">
                <div class="coupon">
                    <p><strong>이경범 교육학</strong>
                    3~11월 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
                <div class="coupon">
                    <p><strong>송원영 국어</strong>
                    3~11월 국교/문교 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
                <div class="coupon">
                    <p><strong>송원영 국어</strong>
                    3~11월 국교론 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
                <div class="coupon">
                    <p><strong>권보민 국어</strong>
                    3~11월 국어 문법 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
                <div class="coupon">
                    <p><strong>구동언 국어</strong>
                    3~11월 전공국어 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
                <div class="coupon">
                    <p><strong>박태영 수학교육론</strong>
                    3~11월 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
                <div class="coupon">
                    <p><strong>박혜향 수학교육론</strong>
                    3~11월 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
                <div class="coupon">
                    <p><strong>김종권 역사</strong>
                    3~11월 전공국어 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
                <div class="coupon">
                    <p><strong>장영희 중국어</strong>
                    3~11월 초수트랙 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
                <div class="coupon">
                    <p><strong>장영희 중국어</strong>
                    3~11월 N+수트랙 패키지</p>
                    <div class="btns">
                        <a href="#none">학원강의 쿠폰</a>
                        <a href="#none">동영상강의 쿠폰</a>
                    </div>
                </div>
            </div>
            <div class="textinfo">
                ※ 로그인 후, 해당 쿠폰을 클릭하면, 발급받을 수 있습니다. <br>
                대상자가 아닌 경우, 발급이 제한됩니다. 
            </div>
            <div><a href="https://ssam.willbes.net/promotion/index/cate/3140/code/2896"><img src="https://static.willbes.net/public/images/promotion/2023/02/2897_02_btn.png"/></a></div>
        </div>

        <div class="evtCtnsBox event03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2897_03.jpg"/>
        </div>


        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">환승할인 & 재도전 할인 이벤트 관련 필독 사항</h4>
                <ul>
                    <li>본 이벤트는 해당 기간내 참여한 분만 인정됩니다. (~2023. 03. 26)</li>
                    <li>본 이벤트로 발급받은 할인 쿠폰은 7일 이내 사용하셔야 합니다. (이후, 소멸)</li>
                    <li>환승할인 쿠폰의 발급을 위해서는 타학원에서 수강하였다는 사실을 증명해야 합니다. (온/오프 수강생 모두 참여 가능)<br>
                        - 본 이벤트 페이지의 “타학원 수강이력인증창”에, 인증서류를 스캔하여 전송하는 절차를 진행한 후 참여 가능합니다.<br>
                        -인증 서류의 식별이 불가능한 경우 또는 이미지를 도용한 경우에는 할인혜택이 적용이 불가합니다.</li>
                    <li>환승할인 쿠폰은 신청시 후, 일정 심사기간(최대 2일)을 거쳐 발급 여부를 문자로 통보할 예정입니다. </li>
                    <li>본 이벤트를 통하여 수강한 강의 환불 시에는 할인된 수강료가 아닌, 원 수강료에서 환불금액이 계산됩니다.</li>
                    <li>본 이벤트를 통하여 발급받은 쿠폰으로 할인받은 강의는 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다.</li>
                </ul>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>



@stop