{{-- 레이어팝업 레이아웃 --}}
@yield('layer_header')

<div class="modal-header bg-green">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">@yield('layer_title')</h4>
</div>
<div class="modal-body">
    @yield('layer_content')
</div>
<div class="modal-footer">
    @yield('add_buttons')
    <button type="button" class="btn btn-default" id="btn_modal_close">닫기</button>
</div>

@yield('layer_footer')

<script type="text/javascript">
    {{-- 동적 이벤트 바인딩 --}}
    $(document).ready(function() {
        init_iCheck();
        init_datatable();
    });
</script>
