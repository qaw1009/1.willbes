@extends('lcms.layouts.master')

@section('content')
    <h5>- 특정 강좌를 구매한 회원들에게 제공하는 학습자료를 관리하는 메뉴입니다. (운영자 패키지만 사용)</h5>
    <h5>- {{$arr_prof_info['ProfNickName']}} 교수 T-pass 자료실</h5>
    {!! form_errors() !!}
    <div class="x_panel">
        <div class="x_content">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>대비학년도</th>
                    <th>패키지유형</th>
                    <th>운영자패키지명</th>
                    <th>판매가</th>
                    <th>판매여부</th>
                    <th>사용여부</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$product_data['SchoolYear']}}</td>
                    <td>{{str_replace('패키지','',$product_data['PackTypeCcd_Name'])}}</td>
                    <td>[{{$product_data['ProdCode']}}] {{$product_data['ProdName']}}</td>
                    <td>
                        {{number_format($product_data['RealSalePrice'])}}원<BR><strike>{{number_format($product_data['SalePrice'])}}원</strike>
                    </td>
                    <td>
                        @if($product_data['SaleStatusCcd_Name'] == '판매불가')
                            <span class="red">{{$product_data['SaleStatusCcd_Name']}}</span>
                        @else
                            {{$product_data['SaleStatusCcd_Name']}}
                        @endif
                    </td>
                    <td>
                        {!! ($product_data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right form-inline">
                <button type="button" class="btn btn-sm btn-primary ml-10 btn-main-list">전체강좌목록</button>
            </div>
        </div>
    </div>

    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_title">
                <h2>학습자료실 정보</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">제목</label>
                    <div class="form-control-static col-md-10">
                        {!! ($data['IsBest'] == '1') ? '<span class="red">[HOT]</span>' : '' !!} {{$data['Title']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">운영사이트</label>
                    <div class="form-control-static col-md-4">
                        {{$data['SiteName']}}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">카테고리</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        @foreach($data['arr_cate_code'] as $key => $val)
                            {{$val}} @if ($loop->last === false) | @endif
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">과목</label>
                    <div class="form-control-static col-md-4">
                        {{$data['SubjectName']}}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">자료유형</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['TypeCcdName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">강좌적용구분</label>
                    <div class="form-control-static col-md-4">
                        {{$data['ProdApplyTypeName']}}
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">강좌명</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{$data['ProdName']}}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">조회수(생성)</label>
                    <div class="form-control-static col-md-4">
                        {{$data['ReadCnt']}} ({{$data['SettingReadCnt']}})
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">사용</label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        {{ ($data['IsUse'] == 'Y') ? '사용' : '미사용' }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">첨부</label>
                    <div class="col-md-10">
                        @for($i = 0; $i < $attach_file_cnt; $i++)
                            @if(empty($data['arr_attach_file_path'][$i]) === false)
                                <p class="form-control-static">
                                    [ <a href="javascript:void(0);" class="file-download" data-file-path="{{ urlencode($data['arr_attach_file_path'][$i].$data['arr_attach_file_name'][$i])}}" data-file-name="{{ urlencode($data['arr_attach_file_real_name'][$i]) }}" target="_blank">
                                        {{ $data['arr_attach_file_real_name'][$i] }}
                                    </a> ]
                                </p>
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">내용</label>
                    <div class="form-control-static col-md-10">{!! $data['Content'] !!}</div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종 수정일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="button" class="pull-left btn btn-danger" id="btn_delete">삭제</button>
                    <button type="button" class="pull-right btn btn-primary" id="btn_list">목록</button>
                    <button type="button" class="pull-right btn btn-success mr-10" id="btn_modify">수정</button>
                </div>
            </div>
        </div>
    </form>

    <div class="x_panel">
        <div class="x_title">
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1-1" for="btn_previous" style="margin-top: 7px;">이전글</label>
            <div class="form-control-static col-md-10">
                @if(count($board_previous) <= 0)
                    이전글이 없습니다.
                @else
                    <a href='javascript:void(0);' id='btn_previous' data-idx='{{$board_previous->BoardIdx}}'><u>{{$board_previous->Title}}</u></a>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1-1" for="btn_next" style="margin-top: 7px;">다음글</label>
            <div class="form-control-static col-md-10">
                @if(count($board_next) <= 0)
                    다음글이 없습니다.
                @else
                    <a href='javascript:void(0);' id='btn_next' data-idx='{{$board_next->BoardIdx}}'><u>{{$board_next->Title}}</u></a>
                @endif
            </div>
        </div>
    </div>


    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            //전체강좌목록
            $('.btn-main-list').click(function() {
                location.href = '{{ site_url("/board/professor/{$boardName}/productList") }}/' + getQueryString();
            });
            
            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}") }}/registForBoard/' + '{!! $prod_code !!}' + getQueryString() + '{!! $boardDefaultQueryString !!}';
            });

            //데이터 수정 폼
            $('#btn_modify').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}/createBoardForTpass/{$prod_code}") }}/' + getQueryString() + '{!! $boardDefaultQueryString !!}' + '&board_idx=' + '{{$board_idx}}';
            });

            $('#btn_previous').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}/readBoardForTpass/{$prod_code}") }}/' + getQueryString() + '{!! $boardDefaultQueryString !!}' + '&board_idx=' + $(this).data('idx');
            });

            $('#btn_next').click(function() {
                location.href='{{ site_url("/board/professor/{$boardName}/readBoardForTpass/{$prod_code}") }}/' + getQueryString() + '{!! $boardDefaultQueryString !!}' + '&board_idx=' + $(this).data('idx');
            });

            $('.file-download').click(function() {
                var _url = '{{ site_url("/board/professor/{$boardName}/download") }}/' + getQueryString() + '&path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
                window.open(_url, '_blank');
            });

            //데이터 삭제
            $('#btn_delete').click(function() {
                var _url = '{{ site_url("/board/professor/{$boardName}/deleteBoardForTpass") }}/' + {{$board_idx}} + getQueryString();
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE'
                };

                if (!confirm('해당 자료를 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/board/professor/{$boardName}") }}/registForBoard/' + '{!! $prod_code !!}' + getQueryString() + '{!! $boardDefaultQueryString !!}');
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop