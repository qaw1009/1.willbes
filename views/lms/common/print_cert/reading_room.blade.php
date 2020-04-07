@extends('lcms.layouts.master_popup')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')
    {{-- activex load --}}
    @include('lms.common.print_cert.print_cert_partial')
    <script type="text/javascript">
        function printBar() {
            {{--
                # ctkprint_bar 설명
                ctkprint_bar.prt_text_L[숫자] => 숫자 = 라인번호 (1~25), L = Left, R = Right
			    입력값 구성 => '내용;글씨체;글씨크기;글씨굵기(true/false);정렬(left/right)';
            --}}
            ctkprint_bar.prt_text_L4 = ' {{ $data['MemName'] }}' + ';굴림;12;true;left';
            ctkprint_bar.prt_text_L28 = '  {{ date('Y-m-d') }}' + ';굴림;8;false;left';

            @foreach($data['OrderProdNameData'] as $i => $arr_prod_name)
                ctkprint_bar.prt_text_R{{ $data['StartLine'] + ($i * 2) }} = '{!! array_get($arr_prod_name, 'Name', '') !!}' + ';굴림;8;' + '{{ array_get($arr_prod_name, 'Bold', 'false') }}' + ';left';
            @endforeach

            ctkprint_bar.prt_text_R{{ $data['StartLine'] + (count($data['OrderProdNameData']) * 2) }} = '({{ $data['UseStartDate'] . '~' . $data['UseEndDate'] }})' + ';굴림;8;false;left';

            startPrint();
        }

        function startPrint() {
            // 인쇄 시작
            ctkprint_bar.CT_DOC_Prt = 1;    // 인쇄 요청 코드
            ctkprint_bar.CT_DOC_Prt2 = 1; 	// 미리보기 코드 (일반 프린터 인쇄)
        }
    </script>
@stop

@section('add_buttons')
    <button type="button" name="_btn_print" class="btn btn-success">프린트</button>
@endsection

@section('popup_footer')
@endsection