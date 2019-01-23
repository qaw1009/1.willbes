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
            @elseif($data['ViewType'] == 'G')
                {{-- 공무원학원 --}}
                var txt_pack = '{{ isset($data['OrderSubProdData']) === true ? '[종합] ' : '' }}';
                var txt_blank = '{{ str_repeat(' ', 15) }}';

                ctkprint_bar.prt_text_L4 = '{{ $data['MemName'] }}({{ $data['OrderNo'] }})' + ';굴림;10;true;left';
                ctkprint_bar.prt_text_L8 = txt_blank + txt_pack + '{{ $data['ProdName'] }}' + ';굴림;8;false;left';

                @if(isset($data['OrderSubProdData']) === true)
                    ctkprint_bar.prt_text_L11 = txt_blank + txt_pack + '{{ element('0', $data['OrderSubProdData'], '') }}' + ';굴림;8;false;left';

                    @if(empty(element('1', $data['OrderSubProdData'])) === false)
                        ctkprint_bar.prt_text_L14 = txt_blank + txt_pack + '{{ element('1', $data['OrderSubProdData']) }}' + ';굴림;8;false;left';
                    @endif

                    @if(empty(element('2', $data['OrderSubProdData'])) === false)
                        ctkprint_bar.prt_text_L17 = txt_blank + txt_pack + '{{ element('2', $data['OrderSubProdData']) }}' + ';굴림;8;false;left';
                    @endif

                    @if(empty(element('3', $data['OrderSubProdData'])) === false)
                        ctkprint_bar.prt_text_L20 = txt_blank + txt_pack + '{{ element('3', $data['OrderSubProdData']) }}' + ';굴림;8;false;left';
                    @endif

                    @if(empty(element('4', $data['OrderSubProdData'])) === false)
                        ctkprint_bar.prt_text_L23 = txt_blank + txt_pack + '{{ element('4', $data['OrderSubProdData']) }}' + ';굴림;8;false;left';
                    @endif

                    @if(empty(element('5', $data['OrderSubProdData'])) === false)
                        ctkprint_bar.prt_text_L26 = txt_blank + txt_pack + '{{ element('5', $data['OrderSubProdData']) }}' + ';굴림;8;false;left';
                    @endif

                    @if(empty(element('6', $data['OrderSubProdData'])) === false)
                        ctkprint_bar.prt_text_L29 = txt_blank + txt_pack + '{{ element('6', $data['OrderSubProdData']) }}' + ';굴림;8;false;left';
                    @endif

                    @if(empty(element('7', $data['OrderSubProdData'])) === false)
                        ctkprint_bar.prt_text_L32 = txt_blank + txt_pack + '{{ element('7', $data['OrderSubProdData']) }}' + ';굴림;8;false;left';
                    @endif
                @endif
            @endif

            ctkprint_bar.prt_text_L28 = '{{ date('Y-m-d H:i') }}' + ';굴림;8;false;left';

            // 인쇄 관련 부분 시작
            ctkprint_bar.CT_DOC_Prt = 1;	    // 인쇄 요청 코드
            ctkprint_bar.CT_DOC_Prt2 = 1; 	// 미리보기 코드 (일반 프린터 인쇄)
        }
    </script>
@stop

@section('add_buttons')
    <button type="button" name="_btn_print" class="btn btn-success">프린트</button>
@endsection

@section('popup_footer')
@endsection