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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative; background:#f2f2f2}

        /************************************************************/
        
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2398_top_bg.jpg) no-repeat center top;}
        
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/10/2398_01_bg.jpg) repeat-y center top; padding-bottom:100px}
        .evt01 .wrap .choice {position:absolute; top:461px; width:1000px; left:65px; z-index: 2; display:flex; flex-wrap: wrap;}
        .evt01 .wrap .choice label {width:190px; height:88px; text-align:left; cursor: pointer; margin-right:10px; margin-bottom:35px; display:block; align-self: auto;}
        .evt01 .wrap .choice input {width:20px; height:20px; margin:8px 0 0 20px;}
        .evt01 .wrap .btn01 {display:block; position:absolute; top:842px; width:40%; left:50%; margin-left:-20%; padding:15px 0; font-size:24px; text-align:center; background:#333; color:#fff; border-radius:30px}
        .evt01 .wrap .btn01:hover {background:#3c8340;}
        .evt01 .wrap p {position:absolute; top:905px; width:100%; font-size:14px; text-align:center; z-index: 2;}
        .evt01 .wrap01 h4 {font-size:30px; color:#000; text-align:left; margin:50px 0 20px; padding-left:20px}


        .onLecFree {width:1120px; margin:0 auto; background:#f2f2f2}
        .onLecFreeBox {padding:0 30px 50px; font-size:14px;}
        .onLecFreeBox h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#1c3d1f}
        .onLecFreeBox h5 {font-size:24px; color:#1c3d1f; text-align:left; padding-bottom:10px; border-bottom:2px solid #1c3d1f; margin:50px 0 20px}
        .onLecFreeBox input[type=checkbox] {width:20px; height:20px; vertical-align:middle}
        .onLecFree-txt01 {text-align:left; line-height:1.3}
        .onLecFree-txt01 ul {border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto; margin-bottom:10px}
        .onLecFreeInfo li,
        .onLecFree-txt01 li {margin-bottom:10px; list-style-type:decimal; margin-left:20px; text-align:left; font-size:14px}

        .onLecFreeBox .evtMenu {}
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
        .evt_table table tbody th{background:#e4e4e4; color:#333; font-size:16px; font-weight:300; border-bottom:1px solid #c1c1c1; padding:10px}
        .evt_table table tbody td{padding:0 10px; font-size:14px; color:#000; font-weight:300; text-align:left; padding:10px}
        .evt_table table tbody td:last-of-type{border-right:0}
        .evt_table table tbody td.num{color:#999; font-weight:200}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:middle;}


        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px;}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        .fixed {position:fixed !important; width:1000px; background:#fff !important; z-index:100 !important;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/10/2398_top.jpg" alt="퀵 서머리 한정판매"/>
        </div>

        <div class="evtCtnsBox evt01">
            <div class="wrap">    
                <div class="choice">
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>
                    <label><input type="checkbox"></label>                   
                </div>        
                <a href="#none" class="btn01">쿠폰 신청하기</a>
                <p>* 쿠폰은 교육학을 포함한 최대 3과목(교육학1과목+전공2과목)까지 가능합니다.</p>
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2398_01_01.jpg" alt="가입혜택1 할인쿠폰 지급"/>

                <div class="wrap01">
                    <h4 class="NSK-Black">할인 쿠폰 적용 가능한 강좌 신청하기</h4>

                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                    @endif     
                </div>         
            </div>

            <div class="onLecFree mt50">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2398_01_02.jpg" alt="인강 무료 체험 신청하기"/>
                <div class="onLecFreeBox">
                    <h5 class="mt20 NSK-Black">* 인강 무료체험 신청</h5>
                    <div class="evt_table">
                        <table>
                            <col width="20%" />
                            <col width="30%" />
                            <col width="20%" />
                            <col width=""/>
                            <tbody>
                                <tr>
                                    <th>이름</th>
                                    <td>{{ sess_data('mem_name') }}</td>
                                    <th>연락처</th>
                                    <td><input type="text" id="register_tel" name="register_tel" value="{{ sess_data('mem_phone') }}" maxlength="11" style="width:90%" /></td>                                 
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h5 class="mT20 NSK-Black">* 개인정보 수집 및 이용에 대한 안내</h5>
                    <div class="onLecFree-txt01 mB50">
                        <ul>
                            <li>개인정보 수집 이용 목적<br>
                            - 본 이벤트의 대상자(대학교(원)의 재학생) 확인 및 각종 문의사항 응대<br>
                            - 통계분석 및 기타 마케팅에 활용<br>
                            - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공</li>
                            <li>개인정보 수집 항목<br>
                            - 필수항목 : 성명, 연락처</li>
                            <li>개인정보 이용기간 및 보유기간<br>
                            - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기</li>
                            <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.</li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                            <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                        </ul>

                        <input name="is_chk" type="checkbox" value="Y" id="is_chk" @if(sess_data('is_login') !== true) onchange="goLoginUrl()" @endif/> <label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>

                    <h5 class="mt50 NSK-Black">* 강좌 선택</h5>
                    <div class="evtMenu NG">
                        {{--
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
                        --}}

                    </div>

                    {{--
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
                    --}}
                </div>
            </div>

        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">신규 회원 가입 이벤트 유의사항</h4>
                <ul>
                    <li>본 이벤트를 통하여 부여되는 수강 할인권 및 인강체험의 과목은 회원가입 시, 작성해 주신 과목명과 동일해야 합니다.</li>
                    <li>본 이벤트의 강의 할인쿠폰 및 인강체험 신청은 교육학을 포함한 최대 3과목(교육학1과목+전공2과목)까지 가능합니다.</li>
                    <li>본 이벤트의 인강체험기간은 2주입니다. (2주 분량의 강의를 2주간 체험할 수 있습니다.)</li>
                    <li>본 이벤트의 강의 할인쿠폰 및 인강 체험권은 유아임용과정은 진행되지 않습니다.</li>
                    <li>본 이벤트의 인강체험에 필요한 교재는 별도로 구매하셔야 합니다.</li>
                    <li>본 이벤트를 통하여 부여된 할인쿠폰 및 인강체험권은 양도 및 매매가 불가능하며, 위반시 처벌 받을 수 있습니다.</li>
                    <li>본 이벤트 참여를 위하여 기존 회원이 탈퇴 후 재 가입하는 경우, 대상에서 제외합니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->


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