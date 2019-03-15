@if(empty($data['study_comment']) === false)
    <div class="smallTit mb30">
        <p><span>솔직한 <strong>수강후기</strong><a href="#none" class="btn-study-comment" data-board-idx=""><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a></span></p>
    </div>
    <div class="reviewBx">
        <div class="sliderNumV vSlider">
            @foreach($data['study_comment'] as $row)
                <div class="lecReview">
                    <div class="imgBox cover">
                        <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                        <img src="{{ $row['ProfLecListImg'] }}" width="82" height="82">
                    </div>
                    <ul>
                        <li>[{{ $row['SubjectName'] }}] {{ $row['ProfName'] }}</li>
                        <li>{{ $row['ProdName'] }}</li>
                        <li><a href="#none" class="btn-study-comment" data-board-idx="{{ $row['BoardIdx'] }}">{{ hpSubString($row['Title'], 0, 40, '...') }}</a></li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.sliderNumV').bxSlider({
                mode: 'vertical',
                auto: true,
                controls: true,
                infiniteLoop: true,
                slideWidth: 1120,
                pagerType: 'short',
                minSlides: 3,
                pause: 3000,
                pager: true,
                onSliderLoad: function(){
                    $(".vSlider").css("visibility", "visible").animate({opacity:1});
                }
            });

            $('.btn-study-comment').click(function() {
                var ele_id = 'WrapStudyComment';
                var data = {
                    'ele_id' : ele_id,
                    'show_onoff' : 'off',
                    'cate_code' : '{{$__cfg['CateCode']}}',
                    'board_idx' : $(this).data('board-idx')
                };
                sendAjax('{{ front_url('/support/studyComment/') }}', data, function(ret) {
                    $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                }, showAlertError, false, 'GET', 'html');
            });
        });
    </script>
@endif