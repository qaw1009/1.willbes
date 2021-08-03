<a class="closeBtn" href="javascript:void(0);" onclick="closeWin('{{$arr_input['close_id']}}'); closeWin('{{$arr_input['ele_id']}}')">
    <img src="{{ img_url('prof/close.png') }}">
</a>
<div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['ProfNickName'] }}</span> {{$data['AppellationCcdName']}} 커리큘럼</div>
<div class="Layer-Cont">
    {!! $data['ProfCurriculum'] !!}

    {{-- 커리큘럼 첨부파일 --}}
    @if(empty($data['ProfReferData']['curri_file']) === false)
        {{-- 이미지 파일 표시 --}}
        @foreach($data['ProfReferData']['curri_file'] as $curri_row)
            {!! make_image_tag($curri_row['ReferValue']) !!}
        @endforeach

        <ul>
            {{-- 첨부파일 전체 표시 및 다운로드 --}}
            @foreach($data['ProfReferData']['curri_file'] as $curri_row)
                <li><a href="javascript:void(0);" class="btn-curri-download" data-refer-idx="{{ $curri_row['ReferIdx'] }}" data-refer-type="{{ $curri_row['ReferType'] }}">{{ $curri_row['ReferEtc'] }}</a></li>
            @endforeach
        </ul>
    @endif
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-curri-download').on('click', function(event) {
            event.preventDefault();

            var params = [];
            params.push({ 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}'});
            params.push({ 'name' : 'prof_idx', 'value' : '{{ $prof_idx }}' });
            params.push({ 'name' : 'refer_idx', 'value' : $(this).data('refer-idx') });
            params.push({ 'name' : 'refer_type', 'value' : $(this).data('refer-type') });

            formCreateSubmit('{{ front_url('/professor/referDownload') }}', params, 'POST');
        });
    });
</script>