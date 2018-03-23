@extends('lcms.layouts.master')

@section('content')
    <h5>- 고객센터 FAQ 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" novalidate>
        <div class="x_panel">
            <div class="x_title">
                <h2>FAQ 게시판</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="">제목</label>
                    <div class="form-control-static col-md-9">
                        <span class="red">[BEST]</span> FAQ 제목입니다.
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">운영사이트</label>
                        <div class="form-control-static col-md-2">
                        경찰
                    </div>
                    <label class="control-label col-md-2" for="">구분</label>
                    <div class="form-control-static col-md-5">
                        일반경찰 | 해양경찰 | 일반경찰 | 해양경찰
                    </div>
                </div>

                @if($campusOnOff == 'on')
                    <div class="form-group">
                        <label class="control-label col-md-2" for="">캠퍼스</label>
                        <div class="form-control-static col-md-5">
                            노량진
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label class="control-label col-md-2" for="">FAQ구분</label>
                    <div class="form-control-static col-md-2">
                        결제관련
                    </div>
                    <label class="control-label col-md-2" for="">FAQ 분류</label>
                    <div class="form-control-static col-md-5">
                        결제방법
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">사용</label>
                    <div class="form-control-static col-md-2">
                        <span class="red">미사용</span>
                    </div>
                    <label class="control-label col-md-2" for="">조회수</label>
                    <div class="form-control-static col-md-5">
                        결제방법
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">첨부</label>
                    <div class="form-control-static col-md-9">
                        첨부파일
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">내용</label>
                    <div class="form-control-static col-md-9"></div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-2">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-2">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-5">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="button" class="pull-left btn btn-primary" id="btn_delete">삭제</button>
                    <button type="button" class="pull-right btn btn-primary mr-10" id="btn_list">목록</button>
                    <button type="button" class="pull-right btn btn-success" id="btn_modify">수정</button>
                </div>
            </div>
        </div>
    </form>

    <div class="x_panel">
        <div class="x_title">
            <div class="clearfix"></div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="">이전글</label>
            <div class="form-control-static col-md-9">
                제목입니다.
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="">다음글</label>
            <div class="form-control-static col-md-9">
                다음글이 없습니다.
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                console.log(1);
                location.replace('{{ site_url("/board/{$boardName}") }}' + getQueryString());
            });

            //데이터 수정 폼
            $('#btn_modify').click(function() {
                console.log(1);
                location.replace('{{ site_url("/board/{$boardName}") }}/create/1' + getQueryString());
            });
        });
    </script>
@stop