<!-- Scripts -->
<!-- Libs JS -->
<script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/feather-icons/dist/feather.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('assets/admin/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/prismjs/plugins/toolbar/prism-toolbar.min.js') }}"></script>
<script
    src="{{ asset('assets/admin/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('assets/admin/js/theme.min.js') }}"></script>
<script>
    {{-- $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }); --}}
    tinymce.init({
        // selector: 'textarea#announce',
        selector: 'textarea.mcetxt',
        language: 'ru',
        // width: 600,
        height: 300,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
            'media', 'table', 'emoticons', 'help'
        ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | help',
        menu: {
            favs: {title: 'Мои инструменты', items: 'code visualaid | searchreplace | emoticons'}
        },
        menubar: 'favs file edit view insert format tools table help',
    });
</script>
{{--@yield('script_buttom')--}}
@section('script_buttom')
    <script src="{{ asset('assets/admin/js/sortable-content-block.js') }}"></script>
@show
</body>
</html>
