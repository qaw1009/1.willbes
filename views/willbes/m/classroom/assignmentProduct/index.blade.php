@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    온라인첨삭
                </div>
            </div>
        </div>

        <div class="paymentWrap">
            <div class="paymentCts">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    <tr class="replyList willbes-Open-Table">
                        <td>유의사항 안내</td>
                        <td class="MoreBtn tx-center">></td>
                    </tr>
                    <tr>
                        <td class="pl0 pr0" colspan="2">
                            <div class="SubTit tx14">- 제출상태</div>
                            <div class="Txt">
                                <span class="aBox redBox NSK">답안제출</span>
                                <div class="SubTxt">‘답안제출’을 클릭하여 첨삭과제를 확인하고 답안을 제출하세요.</div>
                            </div>
                            <div class="Txt mt5">
                                <span class="aBox blueBox NSK">답안수정</span>
                                <div class="SubTxt">첨삭 체출을 완료했으나 답안수정이 필요한 경우 제출기간 내에 답안 수정이 가능합니다.</div>
                            </div>
                            <div class="SubTit mt10 tx14">- 채점상태</div>
                            <div class="Txt">
                                <span class="aBox blueBoxborder NSK">채점중</span>
                                <div class="SubTxt">
                                    제출기간이 지나면 채점이 진행됩니다. 채점은 2-3일 소요됩니다.‘채점중'을 클릭하여 제출한 답안을 확인할 수 있습니다.
                                </div>
                            </div>
                            <div class="Txt mt5">
                                <span class="aBox waitBox_block NSK">채점완료</span>
                                <div class="SubTxt">채점이 완료되었습니다. '채점완료'를 클릭하여 채점 결과를 확인하세요.</div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="willbes-Txt2 tx-blue">{{ $lec_data['subProdName'] }}</div>

        <div class="lineTabs lecListTabs c_both">
            <div class="tabContent">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    @forelse($list as $row)
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">{{ $row['Title'] }}</div>
                                <ul class="w-info acad tx-gray">
                                    <li>제출기간 {{ $row['StartDate'] }} ~ {{ $row['EndDate'] }}</li>
                                </ul>
                                <div class="mt10">
                                    @if ($row['IsReply'] == 'Y')
                                        <span class="btnSt02 mr10">제출완료</span>
                                    @else
                                        @if(str_replace('-','',$row['StartDate']) > date('Ymd'))
                                            {{-- 제출기간이 아직 아닌경우 --}}
                                        @elseif(str_replace('-','',$row['StartDate']) <= date('Ymd') && str_replace('-','',$row['EndDate']) >= date('Ymd'))
                                            @if (empty($row['CuaIdx']) === true)
                                                <a href="javascript:;" class="btnSt03border mr10 btn-create-assignment" data-correct-idx="{{ $row['CorrectIdx'] }}">답안제출</a>
                                            @else
                                                <a href="javascript:;" class="btnSt01 mr10 btn-create-assignment" data-correct-idx="{{ $row['CorrectIdx'] }}" data-cua-idx="{{ $row['CuaIdx'] }}">답안수정</a>
                                            @endif
                                        @elseif(str_replace('-','',$row['EndDate']) < date('Ymd'))
                                            @if (empty($row['CuaIdx']) === true || $row['AssignmentStatusCcd'] == $arr_save_type_ccd[0])
                                                <span class="btnSt02 mr10">미제출</span>
                                            @else
                                                <span class="btnSt02 mr10">제출완료</span>
                                            @endif
                                        @endif
                                    @endif

                                    @if(empty($row['CuaIdx']) === false && $row['AssignmentStatusCcd'] != $arr_save_type_ccd[0])
                                        @if($row['IsReply'] == 'Y')
                                            <a href="javascript:;" class="btnSt02border mr10 btn-show-assignment" data-edit-id="3" data-correct-idx="{{ $row['CorrectIdx'] }}" data-cua-idx="{{ $row['CuaIdx'] }}">채점완료</a>
                                        @else
                                            <a href="javascript:;" class="btnSt01border mr10 btn-show-assignment" data-edit-id="2" data-correct-idx="{{ $row['CorrectIdx'] }}" data-cua-idx="{{ $row['CuaIdx'] }}">채점중</a>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td>등록된 게시글이 없습니다.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->
    </div>
    <!-- End Container -->

    <form name="assignmentForm" id="assignmentForm" >
        <input type="hidden" name="prod_code" id="prod_code" value="{{ element('prod_code', $form_data) }}" />
        <input type="hidden" name="correct_idx" id="correct_idx" value="">
        <input type="hidden" name="cua_idx" id="cua_idx" value="">
        <input type="hidden" name="edit_id" id="edit_id" value="">
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-create-assignment').on('click', function () {
                $('#correct_idx').val($(this).data('correct-idx'));
                $('#cua_idx').val($(this).data('cua-idx'));

                var data = $('#assignmentForm').serialize();
                location.href = "{{ front_url("/classroom/assignmentProduct/createModal?") }}" + data;
            });

            $('.btn-show-assignment').on('click', function () {
                $('#correct_idx').val($(this).data('correct-idx'));
                $('#edit_id').val($(this).data('edit-id'));
                $('#cua_idx').val($(this).data('cua-idx'));

                var data = $('#assignmentForm').serialize();
                location.href = "{{ front_url("/classroom/assignmentProduct/showModal?") }}" + data;
            });
        });
    </script>
@stop