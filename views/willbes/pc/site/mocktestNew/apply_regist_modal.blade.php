<a class="closeBtn" href="#none" onclick="closeWin('{{$ele_id}}')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">윌비스 <span class="tx-blue">전국모의고사</span></div>
<div class="passzoneTitInfo tx-light-blue tx-center NG mt20">{{$mock_data['ProdName']}}</div>
<div class="PASSZONE-List widthAutoFull">

   <form id="_regi_mock_form" name="regi_mock_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
       <input type="hidden" name="learn_pattern" value="mock_exam"/>  {{-- 학습형태 --}}
       <input type="checkbox" name="prod_code[]" class='d_none' value="{{ $ProdCode }}:613001:{{ $ProdCode }}" checked/>
       <input type="hidden" name="cart_type" value="mock_exam"/>   {{-- 장바구니 탭 아이디 --}}
       <input type="hidden" name="is_direct_pay" value=""/>

        <div class="PASSZONE-Lec-Section">
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable userMemoTable mockpopupTable under-gray bdt-gray tx-gray GM">
                    <colgroup>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                    </colgroup>
                    <tbody>
                    <tr>
                        <th class="w-tit">이름(아이디)</th>
                        <td class="w-list" colspan="3">{{sess_data('mem_name')}}({{sess_data('mem_id')}})</td>
                    </tr>
                    <tr>
                        <th class="w-tit">응시형태</th>
                        <td class="w-list"><input type="hidden" name="TakeForm" id="TakeForm" value="{{$mock_data['TakeFormsCcd']}}">
                            {{$mock_data['TakeFormsCcd_Name']}}</td>
                        <th class="w-tit">응시분야</th>
                        <td class="w-list">{{$mock_data['CateName']}}</td>
                    </tr>
                    <tr>
                        <th class="w-tit">응시지역</th>
                        <td class="w-list">

                            @if($mock_data['TakeFormsCcd'] == '690001')
                                <input type="hidden" name="TakeArea" value="">
                                전국
                            @else
                                <select id="TakeArea" name="TakeArea" title="응시지역" class="seleArea" required="required">
                                    <option value="">지역선택</option>
                                    @if(empty($mock_area) == false)
                                        @foreach($mock_area as $row)
                                            <option value="{{$row['Ccd']}}">{{$row['CcdName']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            @endif
                        </td>
                        <th class="w-tit">응시번호</th>
                        <td class="w-list tx-bright-gray">결제후 응시번호 확인 가능</td>
                    </tr>
                    <tr>
                        <th class="w-tit">시험응시일</th>
                        <td class="w-list" colspan="3">{{$mock_data['TakeStartDatm']}} ~ {{$mock_data['TakeEndDatm']}}</td>
                    </tr>
                    <tr>
                        <th class="w-tit">응시직렬</th>
                        <td class="w-list" colspan="3">
                            <select id="TakeMockPart" name="TakeMockPart" title="응시직렬" class="seleCause" required="required">
                                <option value="">직렬선택</option>
                                @if(empty($mock_part) == false)
                                    @foreach($mock_part as $row)
                                        <option value="{{$row['Ccd']}}">{{$row['CcdName']}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="w-tit">응시필수과목</th>
                        <td class="w-list" colspan="3">
                            @php
                                $pre = '';
                            @endphp
                            @if(empty($subject_ess) == false)
                                @foreach($subject_ess as $row)
                                    @if(empty($pre) == false),@endif
                                    <input type="hidden" name="subject_ess[]"  value="{{$row['MpIdx']}}|{{$row['SubjectIdx']}}">{{$row['SubjectName']}}
                                    @php $pre='Y' @endphp
                                @endforeach
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <th class="w-tit">응시선택과목</th>
                        <td class="w-list" colspan="3">
                            @if(empty($subject_sub) == false)
                                <select id="mock_paper_subject_2" name="subject_sub[]" title="응시선택과목1" class="sele1" required="required">
                                    <option value="">선택과목1</option>
                                    @foreach($subject_sub as $row)
                                        <option value="{{$row['MpIdx']}}|{{$row['SubjectIdx']}}">{{$row['SubjectName']}}</option>
                                    @endforeach
                                </select>
                                <select id="mock_paper_subject_3" name="subject_sub[]" title="응시선택과목2" class="sele1" required="required">
                                    <option value="">선택과목2</option>
                                    @foreach($subject_sub as $row)
                                        <option value="{{$row['MpIdx']}}|{{$row['SubjectIdx']}}">{{$row['SubjectName']}}</option>
                                    @endforeach
                                </select>
                            @else
                                선택과목 없음
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="w-tit">가산점</th>
                        <td class="w-list" colspan="3">
                            <ul>
                                @if(empty($mock_addpoint) == false)
                                    @foreach($mock_addpoint as $row)
                                        <li><input type="radio" id="AddPoint" name="AddPoint" class="goods_chk"  title="가산점" value="{{$row['CcdValue']}}" required="required">
                                            <label>{{$row['CcdName']}}</label></li>
                                    @endforeach
                                @endif
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th class="w-tit">응시료</th>
                        <td class="w-list" colspan="3">
                            @php
                                $sales_info = json_decode($mock_data['ProdPriceData'], true);
                            @endphp
                            {{ number_format($sales_info[0]['RealSalePrice'],0)}}원
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="passzoneDayInfo tx-gray tx-center NGR mt30 mb30">[접수기간] <span class="tx-light-blue">{{$mock_data['SaleStartDatm']}} ~ {{$mock_data['SaleEndDatm']}}</span>
            <span class="tx-red">(마감 {{floor((strtotime($mock_data['SaleEndDatm']) - strtotime(date("Y-m-d", time()))) / 86400) }}일전)</span>
        </div>
        <ul class="passzoneListInfo tx-gray GM mt20 mb20">
            <li class="tit strong">[결제시 유의사항]</li>
            <li class="txt">· 접수기간이 마감된 후에는 결제하기가 불가능합니다.</li>
            <li class="txt">· 환불요청은 시험응시 2일 전까지 가능하며, 시험응시일 이후에는 환불이 불가능합니다.</li>
            <li class="txt">· 결제 후 모의고사 응시정보 수정은 불가능하며, 응시정보 수정을 원하실 경우 환불 후 재결제하셔야 합니다.</li>
            <li class="txt">· 자세한 사항은 고객센터 1544-5006으로 문의해 주세요.</li>
        </ul>
        <div class="passzonebtn tx-center">
            <span>
                @if($mock_data['TakeFormsCcd'] =='690001')
                    @if($order_prod_idx == 0 && $mock_data["IsSalesAble"] == 'Y')
                        <button type="submit" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
                            <span class="strong">바로결제</span>
                        </button>
                    @endif
                @elseif($mock_data['TakeFormsCcd'] =='690002') {{--학원응시일경우 전체결제건수가 마감인원보다 작아야 가능--}}
                    @if($all_pay_check < $mock_data['ClosingPerson'] && $order_prod_idx == 0 && $mock_data["IsSalesAble"] == 'Y')
                        <button type="submit" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="btnAuto130 h36 mem-Btn bg-blue bd-dark-blue strong">
                            <span class="strong">바로결제</span>
                        </button>
                    @endif
                @endif
            </span>
        </div>

    </form>

</div>

<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    var $regi_mock_form = $('#_regi_mock_form');

        $(document).ready(function() {
        // 바로결제 버튼 클릭
            $('button[name="btn_direct_pay"]').on('click', function () {
                @if($mock_data["IsSalesAble"] !== 'Y')
                    alert("신청 할 수 없는 모의고사입니다.");return;
                @endif

                @if($order_prod_idx > 0)
                    alert("이미 신청 하신 모의고사입니다.");return;
                @endif

                if ( $("#TakeArea").length > 0 ) {
                    if($("#TakeArea").val() == '') {
                        alert('응시지역을 선택해 주십시오.');return;
                    }
                }

                if ( $("#TakeMockPart").length > 0 ) {
                    if($("#TakeMockPart").val() == '') {
                        alert('응시직렬을 선택해 주십시오.');return;
                    }
                }

                if ( $("#mock_paper_subject_2").length > 0 ) {
                    if($("#mock_paper_subject_2").val() == '') {
                        alert('선택과목1을 선택해 주십시오.');return;
                    }
                }

                if ( $("#mock_paper_subject_3").length > 0 ) {
                    if($("#mock_paper_subject_3").val() == '') {
                        alert('선택과목2를 선택해 주십시오.');return;
                    }
                }

                if ( $("#mock_paper_subject_2").length > 0 && $("#mock_paper_subject_3").length > 0  ) {
                    if($("#mock_paper_subject_2").val() == $("#mock_paper_subject_3").val()) {
                        alert('\'선택과목1\' 과 \'선택과목2\'가 같습니다. 다른 과목으로 선택해 주십시오.');return;
                    }
                }

                if ( $('input:radio[name=AddPoint]').is(':checked') == false ) {
                        alert('가산점을 선택해 주십시오.');return;
                }

                var $is_direct_pay = $(this).data('direct-pay');
                var $is_redirect = $(this).data('is-redirect');
                cartNDirectPay($regi_mock_form, $is_direct_pay, $is_redirect);
            });
        });
</script>