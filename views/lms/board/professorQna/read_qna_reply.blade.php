@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 고객센터 1:1 상담 게시판을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <div class="x_panel">
        <form class="form-horizontal form-label-left" novalidate>
            <div class="x_title">
                <h2>경찰 > 신광은 교수 학습Q&A</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="">제목</label>
                    <div class="form-control-static col-md-9">
                        제목입니다.
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">운영사이트</label>
                    <div class="form-control-static col-md-2">
                        경찰
                    </div>
                    <label class="control-label col-md-3" for="">구분</label>
                    <div class="form-control-static col-md-5">
                        일반경찰 | 해양경찰 | 일반경찰 | 해양경찰
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">분류</label>
                    <div class="form-control-static col-md-1">
                        일반경찰
                    </div>
                    <label class="control-label col-md-1" for="">과목</label>
                    <div class="form-control-static col-md-1">
                        수사
                    </div>
                    <label class="control-label col-md-2" for="">질문유형</label>
                    <div class="form-control-static col-md-1">
                        수강
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">질문강좌</label>
                    <div class="form-control-static col-md-7">
                        강좌명
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">등록자</label>
                    <div class="form-control-static col-md-2">
                        회원명(아이디)
                    </div>
                    <label class="control-label col-md-3" for="">휴대폰 번호</label>
                    <div class="form-control-static col-md-5">
                        010-1234-1234 (Y)
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">등록일</label>
                    <div class="form-control-static col-md-2">
                        2018-01-01 00:00:00
                    </div>
                    <label class="control-label col-md-3" for="">사용</label>
                    <div class="form-control-static col-md-5">
                        <span class="red">미사용</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">첨부</label>
                    <div class="form-control-static col-md-2">
                        첨부파일.jpg
                    </div>
                    <label class="control-label col-md-3" for="">조회수</label>
                    <div class="form-control-static col-md-5">
                        5
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="">질문</label>
                    <div class="form-control-static col-md-9">
                        질문내용용
                   </div>
                </div>
            </div>
        </form>
    </div>

    <div class="x_panel">
        <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field($method) !!}
            <input type="hidden" name="board_idx" id="board_idx" value="{{$boardIdx}}"/>
            <div class="row">
                <label class="col-md-2 mt-15 text-right" for="">답변</label>
                <div class="form-control-static col-md-1">
                    <div class="form-control-static col-md-12 short-div"><b>답변자</b></div>
                    <div class="form-control-static col-md-12 short-div"><b>수정자</b></div>
                    <div class="form-control-static col-md-12 short-div"><b>첨부파일</b></div>
                </div>

                <div class="form-control-static col-md-2">
                    <div class="form-control-static short-div">
                        관리자
                    </div>
                    <div class="form-control-static short-div">
                        관리자
                    </div>
                    <div class="form-control-static short-div">
                        @for($i = 1; $i <= $attach_img_cnt; $i++)
                            @if(empty($data{'AttachImgName' . $i}) === false)
                                [ <a href="{{ $data['AttachImgPath'] . $data{'AttachImgName' . $i} }}" rel="popup-image">{{ $data{'AttachImgName' . $i} }}</a> ]
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="form-control-static col-md-1">
                    <div class="form-control-static short-div"><b>답변일</b></div>
                    <div class="form-control-static short-div"><b>수정일</b></div>
                </div>

                <div class="form-control-static col-md-2">
                    <div class="form-control-static short-div">2018-00-00 00:00:00</div>
                    <div class="form-control-static short-div">2018-00-00 00:00:00</div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label class="col-md-2 mt-15 text-right" for=""></label>
                    <div class="col-md-7 ml-10">
                        답변내용
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="ln_solid"></div>
                <div class="form-group text-center mb-30">
                    <div class="col-md-10">
                        <button type="button" class="pull-left btn btn-danger" id="btn_delete">삭제</button>
                        <button type="button" class="btn btn-success mr-10" id="btn_modify">답변등록</button>
                        <button type="button" class="pull-right btn btn-primary" id="btn_list">목록</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="x_panel">
        <div class="x_content">
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
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            // 목록 버튼 클릭
            $('#btn_list').click(function() {
                location.replace('{{ site_url("/board/{$boardName}") }}' + getQueryString());
            });

            /*
            //데이터 수정 폼
            $('#btn_modify').click(function() {
                location.replace('{{ site_url("/board/{$boardName}") }}/create/1' + getQueryString());
            });*/
        });
    </script>
@stop