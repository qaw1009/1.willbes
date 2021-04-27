@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2190_top_bg.jpg) no-repeat center top;}

        .event01 {background:#fe8475;}

        .event02 {width:1120px; margin:0 auto 120px}
        .event02 .title {color:#383838; font-size:30px; text-align:left; margin-bottom:40px}
        .event02 .s-title {color:#383838; font-size:24px; text-align:left; padding-bottom:20px; border-bottom:2px solid #333; margin-bottom:20px}
        .evt_table table{width:100%;border-top:1px solid #e9e9e9}
        .evt_table table tr {border-bottom:1px solid #e9e9e9}
        .evt_table table th,
        .evt_table table td {margin:10px 0; font-size:16px; color:#666}
        .evt_table table th {background:#f9f9f9; color:#000;}
        .evt_table table td{text-align:left; padding:15px}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:top}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:top;}
        .evt_table select {height:28px; padding:0 10px}
        .evt_table .btns {margin-top:40px}
        .evt_table .btns a {display:inline-block; width:260px; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#7f7f7f; margin:0 10px; border-radius:40px}
        .evt_table .btns a:hover {background:#fe544a}

        .event02 .Paging a.on {color:#fe544a; text-decoration:none}

        .evt_List {margin-top:100px; border-top:2px solid #333; padding-top:40px}
        .evt_List li {display:inline; float:left; width:calc(20% - 20px); margin:0 10px; font-size:14px; line-height:1.5; margin-bottom:40px}
        .evt_List .imgBox {border-radius:15px; background:#333; padding:20px; margin-bottom:10px; height:240px; overflow:hidden; position:relative}
        .evt_List .imgBox div {border:24px solid #333; position:absolute; top:0; left:0; width:100%; height:100%; z-index:1}
        .evt_List .imgBox img {max-width:150px}
        .evt_List .smsTxt {border-left:4px solid #999; padding-left:20px; color:#999; text-align:left; }
        .evt_List .smsTxt strong {color:#819f84}
        .evt_List ul:after {content:''; display:block; clear:both}

        .event03 {background:#4ea5a6;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
    </style>

    <div class="p_re evtContent NSK">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/04/2190_top.jpg" alt="합격축하 이벤트"/>
        </div>

        <div class="evtCtnsBox event01">
        	<img src="https://static.willbes.net/public/images/promotion/2021/04/2190_01.jpg" alt="이벤트 하나"/>
        </div>        

        <div class="evtCtnsBox event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_02.jpg"/>
            <div class="title NSK-Black">감사 인증 게시판</div>
            <div class="s-title">감사 인사 인증하기</div>
            <form name="" id="">
                <div class="evt_table">                
                    <table border="0" cellspacing="2" cellpadding="2">
                        <col width="25%" />
                        <col  />
                        <tbody>
                            <tr>
                                <th>
                                    TO
                                </th>
                                <td>
                                    <select name="" id="">
                                        <option value="">선택</option>
                                        <option value="">선생님</option>
                                        <option value="">어머니</option>
                                        <option value="">아버지</option>
                                        <option value="">직접입력</option>
                                    </select>
                                   <input type="text" style="width:50%"> 
                                </td>
                            </tr>
                            <tr>
                                <th>FROM</th>
                                <td>홍길동</td>
                            </tr>
                            <tr>
                                <th>합격 인증 파일 첨부</th>
                                <td colspan="3">
                                    <div>
                                        <input type="file" id="attach_file" name="attach_file" onChange="chkUploadFile(this)" style="width:60%"/>&nbsp;&nbsp;
                                        <a href="#none" onclick="del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" alt="삭제"></a>

                                        <p class="tx12 mt10">*파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등)만 가능합니다.</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btns">
                        <a href="#none" onclick="fn_submit();">확인</a>
                        <a href="#none" onclick="reset_form(this);">취소</a>
                    </div>                
                </div>

                <div class="evt_List">
                    <ul>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample02.jpg"/>
                            </div>
                            <div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample02.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>                            
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample02.jpg"/>
                            </div>
                            <div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample02.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample02.jpg"/>
                            </div>
                            <div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample02.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample02.jpg"/>
                            </div>
                            <div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample02.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                        <li>
                            <div class="imgBox">
                                <div></div>
                                <img src="https://static.willbes.net/public/images/promotion/2021/04/2190_sms_sample.jpg"/>
                            </div>
                            <div class="smsTxt">
                                TO <strong>선생님</strong><br>
                                FROM <strong>홍길동</strong><br>
                                2021.04.27
                            </div>
                        </li>
                    </ul>                    
                </div>

                <div class="Paging">
                    <ul>
                        <li class="Prev"><a href="#none"><img src="/public/img/willbes/paging/paging_prev.png"> </a></li>
                        <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                        <li><a href="#none">2</a><span class="row-line">|</span></li>
                        <li><a href="#none">3</a><span class="row-line">|</span></li>
                        <li><a href="#none">4</a><span class="row-line">|</span></li>
                        <li><a href="#none">5</a><span class="row-line">|</span></li>
                        <li><a href="#none">6</a><span class="row-line">|</span></li>
                        <li><a href="#none">7</a><span class="row-line">|</span></li>
                        <li><a href="#none">8</a><span class="row-line">|</span></li>
                        <li><a href="#none">9</a><span class="row-line">|</span></li>
                        <li><a href="#none">10</a></li>
                        <li class="Next"><a href="#none"><img src="/public/img/willbes/paging/paging_next.png"> </a></li>
                    </ul>
                </div>
            </form>
        </div> 

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">이벤트 주의사항</h4>
                <ul>
                    <li>이벤트 기간: 5월 4일~5월 28일</li>
                    <li>당첨자 발표: 5월 31일</li>
                    <li>상품 증정: 6월 3일</li>
                    <li>이벤트 선물의 중복 제공은 되지 않습니다.</li>
                    <li>감사의 인사가 들어가지 않은 내용은 이벤트에서 제외됩니다.</li>
                    <li>선물은 모바일 기프티콘으로 제공됩니다.</li>
                </ul>
            </div>
        </div>  

    </div>
    <!-- End Container -->


@stop