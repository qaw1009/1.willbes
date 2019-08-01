@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <div class="willbes-Mocktest INFOZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 모의고사
                </div>
            </div>

            <div class="willbes-Mypage-Tabs mt10">
                <ul class="tabMock three">
                    @include('willbes.pc.site.mocktest.tab_menu_partial')
                </ul>
                <div class="LeclistTable">
                    <div class="willbes-Mock-Subject NG">
                        · 이의제기
                        <div class="subBtn mock black f_right"><a href="{{front_url('/mockTest/board/cate/'.$__cfg['CateCode'])}}">전체 모의고사 목록</a></div>
                    </div>
                    <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 150px;">
                            <col style="width: 610px;">
                            <col style="width: 180px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>응시분야<span class="row-line">|</span></th>
                            <th>모의고사명<span class="row-line">|</span></th>
                            <th>이의제기</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-type">{{$prod_data['CateName']}}</td>
                            <td class="w-list tx-left pl20">{{$prod_data['ProdName']}}</td>
                            <td class="w-graph">{{$prod_data['qnaTotalCnt']}} 개</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="willbes-Leclist mt40 c_both">
                    <form id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                    {!! csrf_field() !!}
                    {!! method_field($method) !!}
                    @foreach($arr_board_post_data as $key => $val)
                        <input type="hidden" name="{{$key}}" value="{{$val}}">
                    @endforeach
                    <div class="LecWriteTable">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                            <colgroup>
                                <col style="width: 120px;">
                                <col style="width: 350px;">
                                <col style="width: 120px;">
                                <col style="width: 350px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">직렬선택<span class="tx-light-blue">(*)</span></td>
                                <td class="tx-left pl30">{{$prod_data['TakeMockPart_Name']}}</td>
                                <td class="w-tit bg-light-white tx-left strong pl30">공개여부<span class="tx-light-blue">(*)</span></td>
                                <td class="w-radio tx-left pl30">
                                    <ul>
                                        <li><input type="radio" id="is_public_y" name="is_public" class="goods_chk" value="Y" @if($board_data['IsPublic']=='N')checked="checked"@endif><label>공개</label></li>
                                        <li><input type="radio" id="is_public_n" name="is_public" class="goods_chk" value="N" @if($method == 'POST' || $board_data['IsPublic']=='N')checked="checked"@endif><label>비공개</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                                <td class="w-text tx-left pl30" colspan="3">
                                    <input type="text" id="board_title" name="board_title" class="iptTitle" maxlength="30" value="{{$board_data['Title']}}">
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                                <td class="w-textarea write tx-left pl30" colspan="3">
                                    <textarea id="board_content" name="board_content" class="form-control" title="내용" placeholder="">{!! $board_data['Content'] !!}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">첨부</td>
                                <td class="w-file answer tx-left" colspan="4">
                                    <ul class="attach">
                                        @for($i = 0; $i < $attach_file_cnt; $i++)
                                            <li>
                                                <!--div class="filetype">
                                                    <input type="text" class="file-text" />
                                                    <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                    <span class="file-select"-->
                                                        <input type="file" id="attach_file{{ $i }}" name="attach_file[]" class="input-file" size="3">
                                                    <!--/span>
                                                    <input class="file-reset NSK" type="button" value="X" />
                                                </div-->
                                            </li>
                                        @endfor
                                        <li>
                                            • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                            • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="search-Btn mt20 h36 p_re">
                            <button type="button" id="btn_list" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                <span class="tx-purple-gray">취소</span>
                            </button>
                            <button type="submit" id="btn_submit" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                                <span>저장</span>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        $(document).ready(function() {
            $('#btn_list').click(function() {
                location.href = '{!! front_url('/mockTest/board/cate/'.$__cfg['CateCode'].'?'.$get_params) !!}';
            });

            $regi_form.submit(function() {
                var _url = '{!! front_url('/mockTest/boardQnaStore/cate/'.$__cfg['CateCode'].'?'.$get_params) !!}';
                if (!confirm('저장하시겠습니까?')) { return true; }

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.href = '{!! front_url('/mockTest/listQna/cate/'.$__cfg['CateCode'].'?'.$get_params) !!}';
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });

        function addValidate() {
            var is_public = $(":input:radio[name=is_public]:checked").length;

            if (is_public < 1) {
                alert('공개여부를 선택해 주세요.');
                return false;
            }

            if ($('#board_title').val() == '') {
                alert('제목을 입력해 주세요.');
                return false;
            }

            if ($('#board_content').val() == '') {
                alert('내용을 입력해 주세요.');
                return false;
            }
            return true;
        }
    </script>
@stop