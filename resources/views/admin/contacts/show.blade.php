@extends('admin.layouts.app')
@section('style')

    <!-- ================== BEGIN PAGE CSS ================== -->
    <link href="{!! asset('/backend/plugins/summernote/dist/summernote.css') !!}" rel="stylesheet"/>
    <!-- ================== END PAGE CSS ================== -->
    <!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="{!! asset('/backend/plugins/switchery/switchery.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/abpetkov-powerange/dist/powerange.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/select2/dist/css/select2.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/tag-it/css/jquery.tagit.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') !!}" rel="stylesheet"/>
    <!-- ================== END PAGE CSS STYLE ================== -->
@endsection
@section('content')
    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb float-xl-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
            <li class="breadcrumb-item active">Summernote</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Slider Paylaşın <small> Karışma olmaması için lütfen url ile oynamayın.</small>
        </h1>
        <!-- end page-header -->
        <!-- begin row -->
        <div class="row">

            <!-- begin col-10 -->
            <div class="col-xl-12">
                <!-- begin panel -->
                <div class="panel panel-inverse m-b-0" data-sortable-id="form-plugins-15">
                    <div class="panel-heading">
                        <h4 class="panel-title">Slider Paylaşın</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                               data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                               data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                               data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                               data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body p-0">

                        <div class="col-xl-12">
                            <!-- begin nav-tabs -->

                            <!-- end tab-content -->
                            <!-- begin nav-pills -->
                            <ul class="nav nav-pills mb-2">
                                <li class="nav-item">
                                    <a href="#nav-pills-tab-1" data-toggle="tab" class="nav-link active">
                                        <span class="d-sm-none">Adı</span>
                                        <span class="d-sm-block d-none">Gönderen Adı</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#nav-pills-tab-2" data-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">E-Mail</span>
                                        <span class="d-sm-block d-none">Gönderen E-Mail</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#nav-pills-tab-3" data-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Konu</span>
                                        <span class="d-sm-block d-none">Konu</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#nav-pills-tab-4" data-toggle="tab" class="nav-link">
                                        <span class="d-sm-none">Mesaj</span>
                                        <span class="d-sm-block d-none">Mesaj</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- end nav-pills -->
                            <!-- begin tab-content -->
                            <div class="tab-content p-15 rounded bg-white mb-4">
                                <!-- begin tab-pane -->
                                <div class="tab-pane fade active show" id="nav-pills-tab-1">
                                    <h3 class="m-t-10">Gönderen Adı</h3>
                                    <p>
                                        {!! $contact->name !!}
                                    </p>
                                </div>
                                <!-- end tab-pane -->
                                <!-- begin tab-pane -->
                                <div class="tab-pane fade" id="nav-pills-tab-2">
                                    <h3 class="m-t-10">Gönderen E-Mail</h3>
                                    <p>
                                       {!! $contact->mail !!}
                                    </p>
                                </div>
                                <!-- end tab-pane -->
                                <!-- begin tab-pane -->
                                <div class="tab-pane fade" id="nav-pills-tab-3">
                                    <h3 class="m-t-10">Mesajın Konusu</h3>
                                    <p>
                                        {!! $contact->subject !!}
                                    </p>
                                </div>
                                <!-- end tab-pane -->
                                <!-- begin tab-pane -->
                                <div class="tab-pane fade" id="nav-pills-tab-4">
                                    <h3 class="m-t-10">Mesaj</h3>
                                    <p>
                                        {!! $contact->content !!}
                                    </p>
                                </div>
                                <!-- end tab-pane -->

                                    <a href="{!! route('admin.contact.destroy',$contact->id) !!}" class="btn btn-outline-danger btn-block">Sil</a>


                            </div>

                            <!-- end tab-content -->
                        </div>




                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-10 -->
        </div>
        <!-- end row -->
    </div>

@endsection
@section('script')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{!! asset('/backend/plugins/summernote/dist/summernote.min.js') !!}"></script>
    <script src="{!! asset('/backend/js/demo/form-summernote.demo.js') !!}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{!! asset('/backend/plugins/switchery/switchery.min.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/abpetkov-powerange/dist/powerange.min.js') !!}"></script>
    <script src="{!! asset('/backend/js/demo/form-slider-switcher.demo.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/select2/dist/js/select2.min.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/tag-it/js/tag-it.min.js') !!}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>


        $(document).ready(function () {
            $('#parent_categories').select2();
        });


        function url_slug(s, opt) {
            s = String(s);
            opt = Object(opt);

            var defaults = {
                'delimiter': '-',
                'limit': undefined,
                'lowercase': true,
                'replacements': {},
                'transliterate': (typeof (XRegExp) === 'undefined') ? true : false
            };

            // Merge options
            for (var k in defaults) {
                if (!opt.hasOwnProperty(k)) {
                    opt[k] = defaults[k];
                }
            }

            var char_map = {
                // Latin
                'À': 'A', 'Á': 'A', 'Â': 'A', 'Ã': 'A', 'Ä': 'A', 'Å': 'A', 'Æ': 'AE', 'Ç': 'C',
                'È': 'E', 'É': 'E', 'Ê': 'E', 'Ë': 'E', 'Ì': 'I', 'Í': 'I', 'Î': 'I', 'Ï': 'I',
                'Ð': 'D', 'Ñ': 'N', 'Ò': 'O', 'Ó': 'O', 'Ô': 'O', 'Õ': 'O', 'Ö': 'O', 'Ő': 'O',
                'Ø': 'O', 'Ù': 'U', 'Ú': 'U', 'Û': 'U', 'Ü': 'U', 'Ű': 'U', 'Ý': 'Y', 'Þ': 'TH',
                'ß': 'ss',
                'à': 'a', 'á': 'a', 'â': 'a', 'ã': 'a', 'ä': 'a', 'å': 'a', 'æ': 'ae', 'ç': 'c',
                'è': 'e', 'é': 'e', 'ê': 'e', 'ë': 'e', 'ì': 'i', 'í': 'i', 'î': 'i', 'ï': 'i',
                'ð': 'd', 'ñ': 'n', 'ò': 'o', 'ó': 'o', 'ô': 'o', 'õ': 'o', 'ö': 'o', 'ő': 'o',
                'ø': 'o', 'ù': 'u', 'ú': 'u', 'û': 'u', 'ü': 'u', 'ű': 'u', 'ý': 'y', 'þ': 'th',
                'ÿ': 'y',

                // Latin symbols
                '©': '(c)',

                // Greek
                'Α': 'A', 'Β': 'B', 'Γ': 'G', 'Δ': 'D', 'Ε': 'E', 'Ζ': 'Z', 'Η': 'H', 'Θ': '8',
                'Ι': 'I', 'Κ': 'K', 'Λ': 'L', 'Μ': 'M', 'Ν': 'N', 'Ξ': '3', 'Ο': 'O', 'Π': 'P',
                'Ρ': 'R', 'Σ': 'S', 'Τ': 'T', 'Υ': 'Y', 'Φ': 'F', 'Χ': 'X', 'Ψ': 'PS', 'Ω': 'W',
                'Ά': 'A', 'Έ': 'E', 'Ί': 'I', 'Ό': 'O', 'Ύ': 'Y', 'Ή': 'H', 'Ώ': 'W', 'Ϊ': 'I',
                'Ϋ': 'Y',
                'α': 'a', 'β': 'b', 'γ': 'g', 'δ': 'd', 'ε': 'e', 'ζ': 'z', 'η': 'h', 'θ': '8',
                'ι': 'i', 'κ': 'k', 'λ': 'l', 'μ': 'm', 'ν': 'n', 'ξ': '3', 'ο': 'o', 'π': 'p',
                'ρ': 'r', 'σ': 's', 'τ': 't', 'υ': 'y', 'φ': 'f', 'χ': 'x', 'ψ': 'ps', 'ω': 'w',
                'ά': 'a', 'έ': 'e', 'ί': 'i', 'ό': 'o', 'ύ': 'y', 'ή': 'h', 'ώ': 'w', 'ς': 's',
                'ϊ': 'i', 'ΰ': 'y', 'ϋ': 'y', 'ΐ': 'i',

                // Turkish
                'Ş': 'S', 'İ': 'I', 'Ç': 'C', 'Ü': 'U', 'Ö': 'O', 'Ğ': 'G',
                'ş': 's', 'ı': 'i', 'ç': 'c', 'ü': 'u', 'ö': 'o', 'ğ': 'g',

                // Russian
                'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'G', 'Д': 'D', 'Е': 'E', 'Ё': 'Yo', 'Ж': 'Zh',
                'З': 'Z', 'И': 'I', 'Й': 'J', 'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N', 'О': 'O',
                'П': 'P', 'Р': 'R', 'С': 'S', 'Т': 'T', 'У': 'U', 'Ф': 'F', 'Х': 'H', 'Ц': 'C',
                'Ч': 'Ch', 'Ш': 'Sh', 'Щ': 'Sh', 'Ъ': '', 'Ы': 'Y', 'Ь': '', 'Э': 'E', 'Ю': 'Yu',
                'Я': 'Ya',
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'yo', 'ж': 'zh',
                'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
                'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c',
                'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu',
                'я': 'ya',

                // Ukrainian
                'Є': 'Ye', 'І': 'I', 'Ї': 'Yi', 'Ґ': 'G',
                'є': 'ye', 'і': 'i', 'ї': 'yi', 'ґ': 'g',

                // Czech
                'Č': 'C', 'Ď': 'D', 'Ě': 'E', 'Ň': 'N', 'Ř': 'R', 'Š': 'S', 'Ť': 'T', 'Ů': 'U',
                'Ž': 'Z',
                'č': 'c', 'ď': 'd', 'ě': 'e', 'ň': 'n', 'ř': 'r', 'š': 's', 'ť': 't', 'ů': 'u',
                'ž': 'z',

                // Polish
                'Ą': 'A', 'Ć': 'C', 'Ę': 'e', 'Ł': 'L', 'Ń': 'N', 'Ó': 'o', 'Ś': 'S', 'Ź': 'Z',
                'Ż': 'Z',
                'ą': 'a', 'ć': 'c', 'ę': 'e', 'ł': 'l', 'ń': 'n', 'ó': 'o', 'ś': 's', 'ź': 'z',
                'ż': 'z',

                // Latvian
                'Ā': 'A', 'Č': 'C', 'Ē': 'E', 'Ģ': 'G', 'Ī': 'i', 'Ķ': 'k', 'Ļ': 'L', 'Ņ': 'N',
                'Š': 'S', 'Ū': 'u', 'Ž': 'Z',
                'ā': 'a', 'č': 'c', 'ē': 'e', 'ģ': 'g', 'ī': 'i', 'ķ': 'k', 'ļ': 'l', 'ņ': 'n',
                'š': 's', 'ū': 'u', 'ž': 'z'
            };

            // Make custom replacements
            for (var k in opt.replacements) {
                s = s.replace(RegExp(k, 'g'), opt.replacements[k]);
            }

            // Transliterate characters to ASCII
            if (opt.transliterate) {
                for (var k in char_map) {
                    s = s.replace(RegExp(k, 'g'), char_map[k]);
                }
            }

            // Replace non-alphanumeric characters with our delimiter
            var alnum = (typeof (XRegExp) === 'undefined') ? RegExp('[^a-z0-9]+', 'ig') : XRegExp('[^\\p{L}\\p{N}]+', 'ig');
            s = s.replace(alnum, opt.delimiter);

            // Remove duplicate delimiters
            s = s.replace(RegExp('[' + opt.delimiter + ']{2,}', 'g'), opt.delimiter);

            // Truncate slug to max. characters
            s = s.substring(0, opt.limit);

            // Remove delimiter from ends
            s = s.replace(RegExp('(^' + opt.delimiter + '|' + opt.delimiter + '$)', 'g'), '');

            return opt.lowercase ? s.toLowerCase() : s;
        }


        $('#title').on('input', function () {
            let random = Math.floor(Math.random() * 1000000) + 1;
            $('#slug').val(url_slug($(this).val()) + random);

        });
    </script>
@endsection
