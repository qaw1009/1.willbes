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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .btnBox a {width:500px; margin:0 auto; display:inline-block; color:#1c1c1c; background:#d96b30; font-size:30px; font-weight:bold; height:80px; line-height:80px; border-radius:40px;}
        .btnBox a:hover {background:#fff;}

        .evtCtnsBox input[type=checkbox] {width:20px; height:20px; vertical-align:middle}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/01/2034_top_bg.jpg) no-repeat center top;}

        .event01 {background:#1c1c1c; padding-bottom:100px}

        .event02 {background:#e3e4e6}

        .event03 {background:#425cbb; position:relative}
        .event03 .btnBox {position:absolute; bottom:100px; left:50%; margin-left:-210px; z-index:10}
        .event03 .btnBox a {color:#fff; background:#222;}
        .event03 .btnBox a:hover {color:#222; background:#fff;}

        .onLecFree {background:#fff; padding:100px 0;}
        .onLecFreeBox {width:1100px; margin:0 auto; background:#fff; padding:50px; text-align:left}
        .onLecFreeBox h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#474747}
        .onLecFreeBox h5 {font-size:24px; color:#49569e; text-align:left; padding-bottom:10px; border-bottom:2px solid #49569e; margin:50px 0 20px}
        .onLecFreeBox h5 span {font-size:14px; color:#474747; margin-left:20px; font-weight:normal}
        .onLecFree-txt01 {text-align:left; line-height:1.3}
        .onLecFree-txt01 ul {border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto; margin-bottom:10px}
        .onLecFreeInfo li,
        .onLecFree-txt01 li {margin-bottom:10px; list-style-type:decimal; margin-left:20px; text-align:left; font-size:14px}


        .onLecFreeBox .evtMenu {background:#fff; width:1000px; margin:0 auto}
        .onLecFreeBox .tabs li {display:inline; float:left; width:9.090909%}
        .onLecFreeBox .tabs li a {display:block; border:1px solid #49569e; background:#49569e; color:#fff; font-size:14px; height:40px; line-height:40px; text-align:center; margin-right:1px}
        .onLecFreeBox .tabs li a:hover,
        .onLecFreeBox .tabs li a.active {border-bottom:1px solid #fff; color:#49569e; background:#fff}
        .onLecFreeBox .tabs:after {content:''; display:block; clear:both}


        .onLecFreeBox .evtMenu .infotxt {font-size:14px; margin:30px 0 10px; height:30px; line-height:30px;}
        .onLecFreeBox .evtMenu .infotxt a {float:right; display:inline-block; background:#1a8ccc; color:#fff;  padding:0 30px}
        .onLecFreeBox .evtMenu .infotxt:after {content:''; display:block; clear:both}
        .onLecFreeBox .evtMenu .choiceLec {border-top:1px solid #000; border-bottom:1px solid #000; padding:10px; line-height:1.4; font-size:12px; height:90px; overflow-y:scroll}
        .onLecFreeBox .evtMenu .choiceLec div {margin-bottom:8px}
        .onLecFreeBox .evtMenu .choiceLec span:nth-child(1) {display:inline-block; width:80px; color:#1a8ccc}
        .onLecFreeBox .evtMenu .choiceLec span:nth-child(2) {display:inline-block; width:80px;}

        .onLecFreeBox .tabCts {padding-top:180px}
        .onLecFreeBox #tab01 {padding-top:20px;}

        .evt_table{margin-bottom:30px;}
        .evt_table table{width:100%; border:1px solid #c1c1c1}
        .evt_table table tr{border-bottom:1px solid #c1c1c1}
        .evt_table table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_table table thead th,
        .evt_table table tbody th{background:#f5f5f5; color:#333; font-size:16px; font-weight:300; border-bottom:1px solid #c1c1c1; padding:10px}
        .evt_table table tbody td{padding:0 10px; font-size:14px; color:#000; font-weight:300; text-align:left; padding:10px}
        .evt_table table tbody td:last-of-type{border-right:0}
        .evt_table table tbody td.num{color:#999; font-weight:200}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:middle;}

        .onLecFree .btnBox a {color:#fff; background:#49569e;}
        .onLecFree .btnBox a:hover {background:#27305e;}

        .willbes-Layer-Box{left:50% !important; margin-left:-490px; border:2px solid #000 !important;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        .event09 {background:#222; padding:80px 0; line-height:1.4}
        .event09Box {width:1100px; margin:0 auto; padding:50px; background:#f0f1f2; text-align:left; letter-spacing:normal}
        .event09Box {background:#fff; border-bottom:2px solid #49569e}

        .fixed {position:fixed !important; width:1000px; background:#fff !important; z-index:100 !important;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2034_top.jpg" alt="인강무료체험"/>
        </div>

        <div class="evtCtnsBox event01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2034_01.gif" alt="인강무료체험"/>
            <div class="btnBox">
                <a href="#none">과목별 설명회 자세히 보기</a>
            </div>
        </div>

        <div class="evtCtnsBox event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2034_02.jpg" alt="인강무료체험"/>
        </div>

        <div class="evtCtnsBox event03">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2034_03.jpg" alt="인강무료체험"/>
            <div class="btnBox">
                <a href="#none">합격수기 자세히 보기 ></a>
            </div>
        </div>

        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" enctype="multipart/form-data" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="ag_idx" id="ag_idx" value="{{$data['AgIdx']}}">
{{--            <input type="hidden" name="ag_code" id="ag_code" value="{{$data['AgCode']}}">--}}
            <input type="hidden" name="learn_pattern" value="book"/>   학습형태
            <input type="hidden" name="cart_type" value="book"/>    장바구니 탭 아이디
            <input type="hidden" name="is_direct_pay" value=""/>     바로결제 여부
            <div class="evtCtnsBox onLecFree">
                <div class="onLecFreeBox">
                <h4>인강 무료체험 신청하기</h4>
                <h5>이벤트참여 대상자</h5>
                <ul class="onLecFreeInfo">
                    <li><strong>대학(원)의 재학생</strong> (* 재학생 인증파일 제출이 가능한 분)</li>
                    <li><strong>윌비스 임용고시학원에 수강등록이 처음인 분</strong> (* 환불강의 포함)</li>
                </ul>

                <h5 class="mt100">
                    이벤트참여에 따른 사전 동의사항 <span>* 재학생 인증 서류에는 성명/학교/학과/학번이 반드시 기재되어 있어야 합니다. (미 충족시 반려될 수 있습니다.)</span>
                </h5>

                <div class="onLecFree-txt01 mB50">
                    <ul>
                        <li>개인정보 수집 이용 목적 <br>
                            - 본 이벤트의 대상자(대학교(원)의 재학생) 확인 및 각종 문의사항 응대<br>
                            - 통계분석 및 기타 마케팅에 활용 <br>
                            - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공 </li>
                        <li>개인정보 수집 항목 <br>
                            - 필수항목 : 성명, 본사ID, 연락처, 재학중인 학교와 학과(학부), 재학생임을 인증할 수 있는 서류(재학증명서, 성적증명서 등)  </li>
                        <li>개인정보 이용기간 및 보유기간<br>
                            - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기</li>
                        <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다. </li>
                        <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                        <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                    </ul>

                    <input name="is_chk" type="checkbox" value="Y" id="is_chk" /> <label for="is_chk"> 이벤트참여에 따른 개인정보 및 마케팅 활용 동의하기(필수)</label>
                </div>

                <h5 class="mt100">재학생 인증 <span>* 윌비스임용의 본 이벤트의 대상자는 임용시험준비를 시작하는 대학교(원)의 재학생입니다.</span></h5>
                <div class="evt_table">
                    <table>
                        <col width="15%" />
                        <col width="20%" />
                        <col width="15%" />
                        <col width="15%"/>
                        <col width="15%" />
                        <col  />
                        <tbody>
                        <tr>
                            <th>이름</th>
                            <td>{{ sess_data('mem_name') }}</td>
                            <th>윌비스ID</th>
                            <td>{{ sess_data('mem_id') }}</td>
                            <th>연락처</th>
                            <td><input type="text" id="phone" name="phone" value="{{ sess_data('mem_phone') }}" maxlength="11" style="width:90%" title="연락처" numberOnly /></td>
                        </tr>
                        <tr>
                            <th>대학교(원) / <br />
                                (학부)학과</th>
                            <td>
                                <input type="text" id="affiliation" name="affiliation" title="대학교(원) / (학부)학과"  maxlength="50" style="width:90%" />
                            </td>
                            <th>재학생인증<br />파일</th>
                            <td colspan="3">
                                <input type="file" id="attach_file" name="attach_file" style="width:60%" onChange="chkUploadFile(this)" title="재학생인증 파일"/>&nbsp;&nbsp;
                                <a href="#none" onclick="del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a> <br />
                                *파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등) 또는 PDF 파일 첨부
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="mt100">강좌 선택</h5>
                <div class="evtMenu NG">
                    <ul class="tabs">
                        @foreach($data_product['subject'] as $key => $val)
                            <li><a href="#tab{{str_pad($loop->index,2, '0', STR_PAD_LEFT)}}" data-tab="tab{{str_pad($loop->index,2, '0', STR_PAD_LEFT)}}" class="top-tab">{{ $val }}</a></li>
                        @endforeach
                    </ul>
                    <div class="infotxt">
                        {{$data['Memo']}}
                        @if($is_apply === 'Y')
                            <a href="javascript:;" class="auth_apply">신청하기</a>
                        @else
                            <font color="red">[{{$is_apply_msg}}]</font>
                        @endif
                    </div>
                    <div class="choiceLec"></div>
                </div>

                @foreach($data_product['subject'] as $key => $val)
                    <div id="tab{{str_pad($loop->index,2, '0', STR_PAD_LEFT)}}" class="tabCts">
                        <div class="willbes-Lec NG c_both">
                            <div class="willbes-Lec-Subject tx-dark-black">
                                · {{$val}}
                                <div class="selectBoxForm">
                                    <span class="MoreBtn"><a href="#none">교재정보 <span>전체보기 ▼</span></a></span>
                                </div>
                            </div>
                            <!-- willbes-Lec-Subject -->
                            @foreach($data_product['prof_name'][$key] as $prof_key => $prof_val)
                                <div class="willbes-Lec-Profdata tx-dark-black">
                                    <ul>
                                        <li class="ProfImg"><img src="{{ $data_product['prof_refer'][$prof_key]['lec_list_img'] or ''}}" alt="{{ str_first_pos_before($prof_val, '::') }}"></li>
                                        <li class="ProfDetail">
                                            <div class="Obj">
                                                {{$val}}
                                            </div>
                                            <div class="Name">{{ str_first_pos_before($prof_val, '::') }}</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- willbes-Lec-Profdata -->
                                <div class="willbes-Lec-Line">-</div>
                                 <!-- willbes-Lec-Line -->
                                @foreach($data_product['product_list'][$key][$prof_key] as $row)
                                    <div class="willbes-Lec-Table">
                                        <table cellspacing="0" cellpadding="0" class="lecTable">
                                            <colgroup>
                                                <col style="width: 75px;">
                                                <col style="width: 85px;">
                                                <col width="*">
                                                <col style="width: 200px;">
                                            </colgroup>
                                            <tbody>
                                            <tr>
                                                <td class="w-list">{{$row['CourseName']}}</td>
                                                <td class="w-name">{{$row['SubjectName']}}<br/><span class="tx-blue">{{$row['wProfName']}}</span></td>
                                                <td class="w-data tx-left pl20 p_re">
                                                    <div class="w-tit prod-title-{{ $row['GroupNum'].'-'.$row['ProdCode'] }}">
                                                        {!! $row['ProdName'] !!}
                                                    </div>
                                                    <dl class="w-info">
                                                        <dt>강의촬영(실강) :  {{ empty($row['StudyStartDate']) ? '' : substr($row['StudyStartDate'],0,4).'년 '. substr($row['StudyStartDate'],5,2).'월' }}</dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>강의수 : <span class="tx-blue">{{ $row['wUnitLectureCnt'] }}강</span></dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>수강기간 : <span class="tx-blue">{{ $row['StudyPeriod'] }}일</span></dt>
                                                        <dt class="NSK ml15">
                                                            <span class="multiple-apply nBox n1" data-info="{{ $row['MultipleApply'] }}">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                                            <span class="lecture-progress nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}" data-info="{{ substr($row['wLectureProgressCcd'], -1)+1 }}{{ $row['wLectureProgressCcdName'] }}">{{ $row['wLectureProgressCcdName'] }}</span>
                                                        </dt><br>
                                                        <dt class="mr10">
                                                            <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover1', '{{ site_url() }}lecture')">
                                                                <strong>강좌상세정보</strong>
                                                            </a>
                                                        </dt>
                                                    </dl>
                                                </td>
                                                <td class="w-notice p_re">
                                                    <input type="checkbox" name="app_prod_code[]" value="{{ $row['ProdCode'] }}" id="{{$row['GroupNum'].'-'.$row['ProdCode']}}" class="chk_app_prod prod-group-{{$row['GroupNum']}} {{$row['IsEssential'] === 'Y' ? 'ess-group-'.$row['GroupNum'] : ''}}" data-group-num="{{ $row['GroupNum'] }}" data-subject="{{ $row['SubjectName'] }}" data-prof-nick="{{ $row['ProfNickNameAppellation'] }}">
                                                    <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- lecTable -->

                                        <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                            <colgroup>
                                                <col style="width: 75px;">
                                                <col style="width: 925px;">
                                            </colgroup>
                                            <tbody>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td class="p_re">
                                                    @if(empty($row['ProdBookData']) === false)
                                                        @foreach($row['ProdBookData'] as $book_idx => $book_row)
                                                            <div class="w-sub">
                                                                <span class="w-obj tx-blue tx11">{{ $book_row['BookProvisionCcdName'] }}</span>
                                                                <span class="w-subtit">{{ $book_row['ProdBookName'] }}</span>
                                                                <span class="chk buybtn p_re">
                                                                    <label class="@if($book_row['wSaleCcd'] == '112002' || $book_row['wSaleCcd'] == '112003') soldout @elseif($book_row['wSaleCcd'] == '112004') press @endif">
                                                                        [{{ $book_row['wSaleCcdName'] }}]
                                                                    </label>
                                                                    <input type="checkbox" name="prod_code[]" value="{{ $book_row['ProdBookCode'] . ':' . $book_row['SaleTypeCcd'] . ':' . $row['ProdCode'] }}" data-prod-code="{{ $book_row['ProdBookCode'] }}" data-parent-prod-code="{{ $row['ProdCode'] }}" data-group-prod-code="{{ $row['ProdCode'] }}" data-book-provision-ccd="{{ $book_row['BookProvisionCcd'] }}" class="chk_books" @if($book_row['wSaleCcd'] != '112001') disabled="disabled" @endif/>
                                                                </span>
                                                                <span class="priceWrap">
                                                                        <span class="price tx-blue">{{ number_format($book_row['RealSalePrice'], 0) }}원</span>
                                                                        <span class="discount">(↓{{ $book_row['SaleRate'] . $book_row['SaleRateUnit'] }})</span>
                                                                    </span>
                                                            </div>
                                                        @endforeach
                                                            <div class="w-sub">
                                                                <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', 'hover2','{{ site_url() }}lecture')">
                                                                    <strong>교재상세정보</strong>
                                                                </a>
                                                            </div>
                                                            <div class="w-bookbtn">
                                                                <div>
                                                                    <button type="button" name="btn_cart" data-direct-pay="N" data-is-redirect="N" class="bg-deep-gray">
                                                                        <span>장바구니</span>
                                                                    </button>
                                                                </div>
                                                                <div>
                                                                    <button type="button" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="bg-dark-blue">
                                                                        <span>바로결제</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                    @else
                                                        <div class="w-sub">
                                                            <span class="w-subtit none">
                                                                {{ empty($row['ProdBookMemo']) === true ? '※ 별도 구매 가능한 교재가 없습니다.' : $row['ProdBookMemo'] }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- willbes-Lec-Table -->
                                @endforeach
                        @endforeach
                        </div>
                    <!-- willbes-Lec -->
                    </div>
                @endforeach
                    <div id="InfoForm" class="willbes-Layer-Box"></div>
                </div>
            </div>
        </form>
        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[필독] 인강무료체험 이벤트 유의사항</h4>
                <ul>
                    <li>본 이벤트는 교원임용시험을 처음 도전하는 대학교(원) 재학생만 참여 가능한 이벤트 입니다.(기존 수강생은 참여할 수 없습니다)<br />
                        - 본 이벤트는 상단의 “재학생 인증창”에 학교명과 학과명을 표기하고, 인증서류를 스캔하여 전송하는 절차를 진행한 후 참여 가능합니다.<br />
                        - 재학생임을 인증하는 서류로 학생증은 인정되지 않으며, 1개월 이내 발급된 재학증명서, 성적증명서 등 본인이 현재 재학생임을 입증하는 서류여야 합니다.</li>
                    <li>강의제공방식<br />
                        - 재학생 인증절차 후, 체험하고자 하는 강의를 신청하시면 됩니다. (강의는 최대 3개까지만 가능하며, 교육학 1강좌, 전공 2강좌로 제한됩니다)<br />
                        - 강좌별 강의체험기간은 14일이며, 강의시간은 1배수 형태로 제공됩니다.  (※ 1배수란? 강의진행 시간만큼만 재생이 가능합니다) <br />
                        - 일정기간 심사 후, 개별 ID에 신청하신 과목의 2주분량의 강의가 2주간 제공됩니다. </li>
                    <li>본 체험이벤트는 재학중인 학과와 관련된 강좌만 제공받을 수 있습니다. (교육학은 공통)</li>
                    <li>본 인강체험이벤트는 중등과정만 진행됩니다. (유치원, 초등은 진행되지 않습니다)</li>
                    <li>강의체험에 필요한 교재는 별도로 구매하셔야 합니다. </li>
                    <li>무료체험강의는 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다. </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        /*스크롤고정*/
        $(function() {
            var nav = $('.evtMenu');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });

        $(window).on('scroll', function() {
            $('.top-tab').each(function() {
                if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                    $('.top-tab').removeClass('active')
                    $(this).addClass('active');
                }
            });
        });

        var $regi_form = $('#regi_form');
        var $group_array = {!! json_encode($data_product['ess_group']) !!};

        $(document).ready(function (){

            $regi_form.on('change', '.chk_app_prod', function() {
                checkOnly('.prod-group-'+$(this).data('group-num'), this.value);
                if(limitCheck() === false) {
                    $(this).prop("checked", false); return;
                }
                $regi_form.find(".choiceLec").children().remove();
                $regi_form.find("input:checkbox[name='app_prod_code[]']:checked").each(function () {
                    prod_code = $(this).val();
                    prod_id = $(this).attr('id');
                    prod_name = $(".prod-title-"+prod_id).text();
                    subject_name = $(this).data('subject');
                    prof_nick = $(this).data('prof-nick');
                    html = '<div id="choice-' + prod_id + '">' +
                        '<span>' + subject_name + '</span>' +
                        '<span>' + prof_nick + '</span>' +
                        '<span>' +
                        prod_name +
                        '   <a href="javascript:;" onclick="choiceRemove(\'' + prod_id + '\')"><img src="{{ img_url('sub/icon_delete.gif') }}"></a>' +
                        '</span>' +
                        '</div>';
                    $regi_form.find('.choiceLec').append(html);
                });
            });
            {{--개별삭제--}}
            choiceRemove = function(id) {
                $('#choice-'+id).remove();
                $('#'+id).prop("checked", false);
            }
            {{--갯수제한--}}
            var $limit_cnt = {{$data['LimitSelectCnt']}};
            limitCheck = function(valid_chk) {
                $check_cnt = 0;
                $regi_form.find('.chk_app_prod').each(function (){
                    if ($(this).is(':checked')) {
                        $check_cnt += 1
                    }
                });
                if($limit_cnt > 0) {
                    if (valid_chk === 'Y') {
                        if ($check_cnt === 0) {
                            alert("강좌를 선택해 주세요.");
                            return false;
                        } else if($check_cnt > $limit_cnt) {
                            alert("{{$data['LimitSelectCnt']}}개 강좌까지만 신청 가능합니다.");
                            return false;
                        }
                    } else {
                        if ($check_cnt > $limit_cnt) {
                            alert("{{$data['LimitSelectCnt']}}개 강좌까지만 신청 가능합니다.");
                            return false;
                        }
                    }
                } else {
                    return true;
                }
            }

            $regi_form.find('.auth_apply').click(function() {
                @if($is_apply === 'Y')
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                    var _url = '{!! front_url('authGive/apply/') !!}';
                    if (!confirm('해당 강좌를 신청하시겠습니까?')) { return true; }
                    ajaxSubmit($regi_form, _url, function(ret) {
                        if(ret.ret_cd) {
                            alert(ret.ret_msg);
                            location.reload();
                        }
                    }, showValidateError, addValidate, false, 'alert');
                @else
                    alert("{{$is_apply_msg}}");return;
                @endif
            });

            var addValidate = function() {
                if($regi_form.find("input:checkbox[name='is_chk']").is(":checked") === false) {
                    alert("이벤트참여에 따른 개인정보 및 마케팅 활용에 동의하셔야 신청이 가능합니다.");
                    $regi_form.find("input:checkbox[name='is_chk']").focus();
                    return false;
                }
                if($regi_form.find("input:text[name='phone']").val() === '') {
                    alert($regi_form.find("input:text[name='phone']").prop('title')+" (을)를 입력해 주세요.");
                    $regi_form.find("input:text[name='phone']").focus();
                    return false;
                }
                if($regi_form.find("input:text[name='affiliation']").val() === '') {
                    alert($regi_form.find("input:text[name='affiliation']").prop('title')+" (을)를 입력해 주세요.");
                    $regi_form.find("input:text[name='affiliation']").focus();
                    return false;
                }
                if($regi_form.find("input:file[name='attach_file']").val() === '') {
                    alert($regi_form.find("input:file[name='attach_file']").prop('title')+" (을)를 등록해 주세요.");
                    $regi_form.find("input:file[name='attach_file']").focus();
                    return false;
                }

                if(limitCheck('Y') === false) {
                    return false;
                }

                for(i=0; i<$group_array.length; i++) {
                    $checked = '';
                    $unchecked_subject = '';
                    $regi_form.find('.ess-group-'+$group_array[i]).each(function (){
                        if ($(this).is(':checked')) {
                            $checked = 'Y';
                        } else {
                            $unchecked_subject = $(this).data('subject');
                        }
                    });

                    if($checked === "") {
                        alert($unchecked_subject+" 은(는) 필수 선택입니다.");
                        return false;
                    }
                }
                return true;
            }

            $regi_form.find("input:text[numberOnly]").on("keyup", function() {
                $(this).val($(this).val().replace(/[^0-9]/g,""));
            });

            $('button[name="btn_cart"], button[name="btn_direct_pay"]').on('click', function() {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                var $is_direct_pay = $(this).data('direct-pay');
                var $is_redirect = $(this).data('is-redirect');
                var $result = addCartNDirectPay($regi_form, $is_direct_pay, $is_redirect, 'on');
                console.log($result);
                if ($is_redirect === 'N' && $result === true) {
                    alert("장바구니에 담겼습니다.");
                }
            });
        });

        function chkUploadFile(ele){
            if($(ele).val()){
                var filename =  $(ele).prop("files")[0].name;
                var ext = filename.split('.').pop().toLowerCase();
                if($.inArray(ext, ['gif','jpg','jpeg','png','bmp','pdf']) == -1) {
                    $(ele).val("");
                    alert('이미지 파일 또는 PDF 파일만 업로드 가능합니다.');
                }
            }
        }

        function del_file(){
            if($("#attach_file").val() != '') {
                if(confirm("첨부파일을 삭제 하시겠습니까?")) {
                    $("#attach_file").val("");
                }
            }
        }

    </script>
@stop