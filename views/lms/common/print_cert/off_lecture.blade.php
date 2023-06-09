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
            @if($data['ViewType'] == 'C')
                {{-- 경찰학원 --}}
                ctkprint_bar.prt_text_L4 = '수강증;궁서;18;true;left';
                ctkprint_bar.prt_text_L8 = '{{ $data['ProdName'] }}' + ';굴림;18;true;left';
                ctkprint_bar.prt_text_L12 = '{{ $data['MinLecStartDate'] }} ~ {{ $data['MaxLecEndDate'] }}' + ';굴림;18;true;left';
                ctkprint_bar.prt_text_L16 = '{{ $data['MemName'] }}' + ';굴림;18;true;left';
                ctkprint_bar.prt_text_L19 = '({{ $data['MemId'] }})' + ';굴림;10;false;left';
                ctkprint_bar.prt_text_L22 = '{{ number_format($data['RealPayPrice']) }}원 ({{ $data['PayMethodCcdName'] }})' + ';굴림;10;false;left';
                ctkprint_bar.prt_text_L24 = '{{ $data['OrderNo'] }}' + ';굴림;10;false;left';
                ctkprint_bar.prt_text_L26 = '{{ date('Y-m-d H:i') }}' + ';굴림;8;false;left';
                startPrint();
            @elseif($data['ViewType'] == 'G')
                {{-- 공무원학원 --}}
                //var txt_blank = '{{ str_repeat(' ', 15) }}';  // L, left blank, left
                var txt_blank = '{{ str_repeat(' ', 70) }}';

                ctkprint_bar.prt_text_L4 = '{{ $data['MemName'] }}({{ $data['CertNo'] }})' + ';굴림;10;true;left';

                @for($i = 0; $i <= 8; $i++)
                    @if(empty(element($i, $data['OrderProdNameData'])) === false)
                        ctkprint_bar.prt_text_R{{ 8 + ($i * 3) }} = '{!! str_mb_pad(element($i, $data['OrderProdNameData']), 21) !!}' + txt_blank + ';굴림;8;false;right';
                    @endif
                @endfor

                ctkprint_bar.prt_text_L28 = '{{ date('Y-m-d H:i') }}' + ';굴림;8;false;left';
                startPrint();
            @elseif($data['ViewType'] == 'H')
                {{-- 고등고시, 자격증, 경찰간부 학원 --}}
                ctkprint_bar.prt_text_L4 = ' {{ $data['MemName'] }} ({{ $data['CertNo'] }})' + ';굴림;12;true;left';
                ctkprint_bar.prt_text_L28 = '  {{ date('Y-m-d') }}' + ';굴림;8;false;left';

                @foreach($data['OrderProdNameData'] as $page_idx => $arr_prod_name)
                    @for($i = 0; $i < $data['LineCnt']; $i++)
                        ctkprint_bar.prt_text_R{{ $data['StartLine'] + ($i * 2) }} = '{!! array_get($arr_prod_name, $i . '.Name', '') !!}' + ';굴림;8;' + '{{ array_get($arr_prod_name, $i . '.Bold', 'false') }}' + ';left';
                    @endfor

                    {{-- 페이지별 인쇄 시작 --}}
                    startPrint();
                @endforeach
            @elseif($data['ViewType'] == 'S')
                {{-- 임용학원 --}}
                @foreach($data['OrderProdNameData'] as $page_idx => $arr_prod_name)
                    ctkprint_bar.prt_text_L4 = '{{ $data['MemName'] }}({{ $data['CertNo'] }})' + ';굴림;10;true;left';
                    ctkprint_bar.prt_text_L28 = '{{ date('Y-m-d') }}' + ';굴림;8;false;left';

                    @for($i = 0; $i < $data['LineCnt']; $i++)
                        ctkprint_bar.prt_text_R{{ $data['StartLine'] + ($i * 2) }} = '{!! array_get($arr_prod_name, $i . '.Name', '') !!}' + ';굴림;8;' + '{{ array_get($arr_prod_name, $i . '.Bold', 'false') }}' + ';left';
                    @endfor

                    {{-- 페이지별 인쇄 시작 --}}
                    startPrint();
                @endforeach
            @elseif($data['ViewType'] == 'A')
                {{-- 사이트 공통 (단과/종합반 서브단과별 출력) --}}
                ctkprint_bar.prt_text_L4 = '{{ $data['MemName'] }}({{ $data['CertNo'] }})' + ';굴림;10;true;left';

                @for($i = 0; $i < $data['LineCnt']; $i++)
                    ctkprint_bar.prt_text_R{{ $data['StartLine'] + ($i * 2) }} = '{!! array_get($data['OrderProdNameData'], $i . '.Name', '') !!}' + ';굴림;8;' + '{{ array_get($data['OrderProdNameData'], $i . '.Bold', 'false') }}' + ';left';
                @endfor

                ctkprint_bar.prt_text_L28 = '{{ date('Y-m-d') }}' + ';굴림;8;false;left';
                startPrint();
            @endif
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