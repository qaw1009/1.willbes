@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    보강동영상 신청
                </div>
            </div>
        </div>

        <div class="paymentWrap mt20">
            <div class="paymentCtsEnd">
                <h4>회원정보</h4>
                <table>
                    <colgroup>
                        <col style="width: 80px;">
                        <col>
                        <col style="width: 80px">
                        <col>
                    </colgroup>
                    <tbody>
                    <tr class="bgst01">
                        <th>회원명</th>
                        <td>{{sess_data('mem_name')}}</td>
                        <th>아이디</th>
                        <td>{{sess_data('mem_id')}}</td>
                    </tr>
                    </tbody>
                </table>

                <h4>강좌정보</h4>
                <table>
                    <colgroup>
                        <col style="width: 80px;">
                        <col>
                        <col style="width: 80px">
                        <col>
                    </colgroup>
                    </tbody>
                    @if($lec['LearnPatternCcd'] == '615007')
                        <tr class="bgst01">
                            <th>종합반명</th>
                            <td colspan="3"> {{$lec['ProdName']}}</td>
                        </tr>
                    @endif

                    <tr class="bgst01">
                        <th>과목</th>
                        <td>{{$lec['SubjectName']}}</td>
                        <th>강사명</th>
                        <td>{{$lec['wProfName']}}</td>
                    </tr>
                    <tr class="bgst01">
                        <th>강좌명</th>
                        <td colspan="3"> {{$lec['subProdName']}}</td>
                    </tr>
                    {{--<tr class="bgst01">
                        <th>보강강좌명</th>
                        <td colspan="3" class="tx-blue">{{$bogang_lec['ProdName']}}</td>
                    </tr>--}}
                    </tbody>
                </table>

                <form name="bogangForm" id="bogangForm">
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="o" value="{{$lec['OrderIdx']}}" />
                    <input type="hidden" name="op" value="{{$lec['OrderProdIdx']}}" />
                    <input type="hidden" name="p" value="{{$lec['ProdCode']}}" />
                    <input type="hidden" name="ps" value="{{$lec['ProdCodeSub']}}" />
                    <input type="hidden" name="t" value="{{$lec['LearnPatternCcd'] == '615007' ? 'P' : 'S'}}" />
                    <h4>보강동영상 신청하기</h4>
                    <table>
                        <colgroup>
                            <col style="width:100px">
                            <col>
                        </colgroup>
                        </tbody>

                        <tr>
                            <th>신청현황</th>
                            <td class="w-info tx-left">[총 신청 가능 개수] {{$lec['SuppAbleCnt']}}개
                                <span class="row-line">|</span>  [사용개수] {{count($bogang_list)}}개
                                <span class="row-line">|</span>  [남은개수] {{$lec['SuppAbleCnt'] - count($bogang_list)}}개</td>
                        </tr>

                        @if($lec['SuppAbleCnt'] > count($bogang_list))
                            <tr>
                                <th>수업불참강의</th>
                                <td class="w-info tx-left">
                                    <select id="u" name="u" title="" style="width:100%">
                                        <option value="">강의선택</option>
                                        @foreach($bogang_curr as $row)
                                            <option value="{{$row['UnitArr']}}">{{$row['UnitName']}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>불참사유</th>
                                <td class="w-info tx-left"><textarea name="reason" id='reason' maxlength="100" style="height:50px; overflow-h:over; width:100%"></textarea></td>
                            </tr>
                            @endif
                            </tbody>
                    </table>

                    <div class="mb30 lh1_5 tx14">
                        ⓘ 주의사항<br>
                        - 강동영상 1회 신청 시 1회차 신청만 가능합니다.<br>
                        - 보강동영상은 2일 기간으로 제공되며, <span class="tx-red">수강시작을 하지 않으면 7일 이후에 자동으로 수강시작됩니다.</span><br>
                        - 신청한 보강동영상은 <span class="tx-blue">내강의실 > 학원강좌 > 보강동영상</span> 메뉴에서 확인 가능합니다.<br>
                    </div>
                </form>

                <h4>[보강동영상 신청이력]</h4>
                <table>
                    <colgroup>
                        <col style="width: 60px;">
                        <col style="width: 150px;">
                        <col style="width: 70px;">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>신청일</th>
                        <th>신청자</th>
                        <th>불참사유</th>
                    </tr>
                    </thead>
                    </tbody>
                    @foreach($bogang_list as $key => $row)
                        <tr class="tx-center">
                            <td>{{count($bogang_list) - $key}}</td>
                            <td>{{$row['OrderDate']}}</td>
                            <td>{{sess_data('mem_name')}}</td>
                            <td>{{$row['AdminEtcReason']}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        @if($lec['SuppAbleCnt'] > count($bogang_list))
            <div class="lec-btns w100p">
                <ul>
                    <li><a href="javascript:;" onclick="fnTake();" class="btn-purple">보강동영상신청 ></a></li>
                </ul>
            </div>
        @endif

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>


        <!-- Topbtn -->
    </div>
    <!-- End Container -->
    <script>
        function fnTake()
        {
            if($.trim($('#reason').val().trim()) == ''){
                alert('불참사유를 입력해주십시요.');
                return;
            }

            if($('#u').val() == ''){
                alert('신청할 회차를 선택해주십시요.');
                return;
            }

            url = "{{ site_url("/classroom/off/takeBogang/") }}";
            data = $('#bogangForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert(d.ret_msg);
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'json');
        }
    </script>
@stop