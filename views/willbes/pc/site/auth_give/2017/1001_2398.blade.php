        <form id="auth_form" name="auth_form" method="POST" onsubmit="return false;" enctype="multipart/form-data" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="ag_idx" id="ag_idx" value="{{$data['AgIdx']}}">
            <input type="hidden" name="learn_pattern" value="book"/>
            <input type="hidden" name="cart_type" value="book"/>
            <input type="hidden" name="is_direct_pay" value=""/>

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
                                    <td>
                                        <input type="text" id="auth_phone" name="auth_phone" value="{{ sess_data('mem_phone') }}" maxlength="11" style="width:90%" />
                                        <input type="hidden" id="auth_affiliation" name="auth_affiliation" value="회원가입이벤트"/>
                                        <input type="hidden" id="etc_content1" name="etc_content1" value="프로모션-{{$promotion}}"/>
                                    </td>
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

                        <input name="auth_is_chk" type="checkbox" value="Y" id="auth_is_chk" /> <label for="auth_is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>

                    <h5 class="mt50 NSK-Black">* 강좌 선택</h5>
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
<script type="text/javascript">
    var $auth_form = $('#auth_form');
    var $group_array = {!! json_encode($data_product['ess_group']) !!};

    $(document).ready(function (){
        $auth_form.on('change', '.chk_app_prod', function() {
            checkOnly('.prod-group-'+$(this).data('group-num'), this.value);
            if(limitCheck() === false) {
                $(this).prop("checked", false); return;
            }
            $auth_form.find(".choiceLec").children().remove();
            $auth_form.find("input:checkbox[name='app_prod_code[]']:checked").each(function () {
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
                $auth_form.find('.choiceLec').append(html);
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
            $auth_form.find('.chk_app_prod').each(function (){
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

        $auth_form.find('.auth_apply').click(function() {
            {!! sess_data('is_login') !== true ? 'fn_login_check();return;' : '' !!} {{-- TODO ajax 로 호출 한 본체 function--}}
            @if($is_apply === 'Y')
                var _url = '{!! front_url('authGive/apply/') !!}';
                if (!confirm('해당 강좌를 신청하시겠습니까?')) { return true; }
                ajaxSubmit($auth_form, _url, function(ret) {
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
            if($auth_form.find("input:checkbox[name='auth_is_chk']").is(":checked") === false) {
                alert("이벤트참여에 따른 개인정보 및 마케팅 활용에 동의하셔야 신청이 가능합니다.");
                $auth_form.find("input:checkbox[name='auth_is_chk']").focus();
                return false;
            }
            if($auth_form.find("input:text[name='auth_phone']").val() === '') {
                alert($auth_form.find("input:text[name='auth_phone']").prop('title')+" (을)를 입력해 주세요.");
                $auth_form.find("input:text[name='auth_phone']").focus();
                return false;
            }

            if(limitCheck('Y') === false) {
                return false;
            }

            for(i=0; i<$group_array.length; i++) {
                $checked = '';
                $unchecked_subject = '';
                $auth_form.find('.ess-group-'+$group_array[i]).each(function (){
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

        $auth_form.find("input:text[numberOnly]").on("keyup", function() {
            $(this).val($(this).val().replace(/[^0-9]/g,""));
        });

        $('button[name="btn_cart"], button[name="btn_direct_pay"]').on('click', function() {
            {!! sess_data('is_login') !== true ? 'fn_login_check();return;' : '' !!}
            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');
            var $result = addCartNDirectPay($auth_form, $is_direct_pay, $is_redirect, 'on');
            if ($is_redirect === 'N' && $result === true) {
                alert("장바구니에 담겼습니다.");
            }
        });
    });
</script>