{{-- 팝업기본화면 --}}
@include('lcms.layouts.header')
<body class="single">
@yield('popup_header')
<div class="modal-header bg-green">
    <h4 class="modal-title">@yield('popup_title')</h4>
</div>
<div class="modal-body">
    @yield('popup_content')
</div>
<div class="modal-footer">
    @yield('add_buttons')
    <button type="button" class="btn btn-default" onclick="self.close();" >닫기</button>
</div>
@yield('layer_footer')
{{-- Main Scripts --}}
@include('lcms.layouts.footer_script')
</body>
</html>
