@if(empty($data['study_comment']) === false)
    <div id="WrapStudyComment" class="p_re"></div>
    <div class="will-nTit bd-none">윌비스 임용 <span class="tx-color">수강후기</span></div>
    <div class="goBtns">
        <ul>
            <li><a href="{{ front_url('support/review/index') }}">합격수기 ></a></li>
            <li><a href="#none" class="btn-study-comment" onclick="fnStudyComentLayer('', '', '', '', '', 'willbes-Layer-ReplyBox-1120');">수강후기 전체보기 ></a></li>
        </ul>
    </div>
    <div class="reviewBox">
        <div class="review">
            <ul>
                @foreach($data['study_comment'] as $row)
                    <li onclick="fnStudyComentLayer('{{ $row['SubjectIdx'] }}', '{{ $row['ProfIdx'] }}', '{{ $row['BoardIdx'] }}'); return false;" style="cursor: pointer">
                        <div class="reviewInfo">{{ $row['SubjectName'] }} <span>|</span> {{ $row['ProfName'] }} <span>|</span> {{ $row['ProdName'] }}</div>
                        <div class="title"><img src="{{ img_url("sub/star" . $row['LecScore'] . ".gif") }}"/> {{ $row['Title'] }} <span class="f_right">{{ hpSubString($row['RegName'],0,2,'*') }}</span></div>
                        <div class="reviewTxt">{!! $row['Content'] !!}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <style>
        .ssam .willbes-Layer-ReplyBox { top:0;}
    </style>

    <script type="text/javascript">
        function fnStudyComentLayer(subject_idx, prof_idx, board_idx, cate_code, div_id, add_class){
            var ele_id = (typeof div_id === 'undefined' || div_id == '') ? 'WrapStudyComment' : div_id;
            var data = {
                'ele_id' : ele_id,
                'show_onoff' : 'off',
                'cate_code' : (typeof cate_code === 'undefined' || cate_code == '') ? '{{$__cfg['CateCode']}}' : cate_code,
                'subject_idx' : subject_idx,
                'prof_idx' : prof_idx,
                'board_idx' : board_idx,
                'add_class' : (typeof add_class === 'undefined' || add_class == '') ? '' : add_class,
            };
            sendAjax('{{ front_url('/support/studyComment/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        }

        $(document).ready(function() {
            //수강후기
            var reviewBox = $(".review ul").bxSlider({
                auto : true,
                pause : 8000,
                mode : 'vertical',
                pager : false,
                slideMargin : 20,
                onSlideAfter : function(){
                    reviewBox.startAuto();
                }
            });
        });
    </script>
@endif