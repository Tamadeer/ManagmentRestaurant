@extends('layouts.master_order')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    اضافة طلب
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة طلب</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data"
                          autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الاقسام</label>
                                <select id="section" name="section_name" class="form-control SlectBox" onclick="section_func()"
                                        onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد القسم</option>
                                    @foreach ($category as $section)
                                        <option value="{{$section->id}}"> {{ $section->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                        </div>
                        <br>
                        {{-- 2 --}}
                        <div class="row">
                            <div class="form-group col-lg-12 col-lg-12 col-lg-12 child-repeater-table">
                                {{--                                <form action="{{route('form.submit')}}" method="post">--}}
                                @csrf
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <th><a href="javascript:void(0)" class="btn.btn-success addRow">اضافة وجبة</a> </th>
                                        <th class="col-lg-4  ">الوجبة</th>
                                        <th>كمية الوجبة</th>
                                        <th>سعر الوجبة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="javascript:void(0)" class="btn.btn-danger deleteRow">حذف وجبة</a> </td>
                                        <td><select id="meal_name[]" name="meal_name[]" class="form-control" onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')">
                                            </select>
                                            {{--   <select name="meal_id[]" class="form-control "--}}
                                            {{--  --}}{{--                                                    onclick="console.log($(this).val())"--}}
                                            {{--  onchange="console.log('change is firing')">--}}
                                            {{--  <option value="1">1</option>--}}
                                            {{--  <option value="2">2</option>--}}
                                            {{--  <option value="3">3</option>--}}
                                            {{-- </select>--}}
                                        </td>
                                        <td>
                                            <select id="quantity_id[]" name="quantity_id[]" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </td>
                                        <td>
                                            {{-- Z <input type="text" class="form-control" id="inputName" name="price_num">--}}
                                            <select id="price_num" name="price_num" class="form-control" onclick="console.log($(this).val())"
                                                    onchange="console.log('change is firing')">
                                            </select>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>


                        {{-- 3 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">المطاعم</label>
                                <select id="rest_name" name="rest_name" class="form-control">
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">الحالة</label>
                                <select id="status" name="status" class="form-control ">
                                    <option value="1">منفذ</option>
                                    <option value="2">غير منفذ</option>
                                </select>
                            </div>
                        </div>
                        <br/>


                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                            </div>
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>


                    </form>
                </div>
            </div>


    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!---Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>
    <script>
        function section_func()
        {
            var SectionId = document.getElementById("section").value;
            // dd(SectionId);
            if (SectionId) {

                $.ajax({

                    url:"{{ URL::to('order/show') }}/" +SectionId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="meal_name[]"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="meal_name[]"]').append('<option value="' +
                                value + '">' + value + '</option>');
                        });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        }
    </script>
{{--    <script>--}}
{{--        $(document).ready(function() {--}}

{{--            $('select[name="section_name"]').on('click', function() {--}}
{{--                var SectionId = $(this).val();--}}
{{--                // dd(SectionId);--}}
{{--                if (SectionId) {--}}

{{--                    $.ajax({--}}

{{--                       url:"{{ URL::to('order/show') }}/" +SectionId,--}}
{{--                        type: "GET",--}}
{{--                        dataType: "json",--}}
{{--                        success: function(data) {--}}
{{--                            $('select[name="meal_name[]"]').empty();--}}
{{--                            $.each(data, function(key, value) {--}}
{{--                                $('select[name="meal_name[]"]').append('<option value="' +--}}
{{--                                    value + '">' + value + '</option>');--}}
{{--                            });--}}
{{--                        },--}}
{{--                    });--}}

{{--                } else {--}}
{{--                    console.log('AJAX load did not work');--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}

{{--    </script>--}}

    <script>
        $(document).ready(function() {

            $('select[name="section_name"]').on('change', function() {
                var SectionId = $(this).val();
                // dd(SectionId);
                if (SectionId) {
console.log(111);
                    $.ajax({

                        url:"{{ URL::to('order/show1') }}/" +SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(222);
                            $('select[name="rest_name"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="rest_name"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>

    <script>
        $(document).ready(function() {

            $('select[name="meal_name[]"]').on('click', function() {
                var SectionId = $(this).val();
                console.log('priceee');
                console.log(1111+SectionId);
                if (SectionId) {
                    console.log('11111111111111111111');
                    $.ajax({

                        url:"{{ URL::to('order/show_price') }}/" +SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(1+data);
                            $('select[name="price_num"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="price_num"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>
    <script>
        function myFunction() {

            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            var Discount = parseFloat(document.getElementById("Discount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

            var Amount_Commission2 = Amount_Commission - Discount;


            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

                alert('يرجي ادخال مبلغ العمولة ');

            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;

                var intResults2 = parseFloat(intResults + Amount_Commission2);

                sumq = parseFloat(intResults).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("Value_VAT").value = sumq;

                document.getElementById("Total").value = sumt;

            }

        }

    </script>
    <script>
        $('thead').on('click','.addRow',function(){
            var tr= "<tr>"+
                "<td><a href='javascript:void(0)' class='btn.btn-danger deleteRow'>حذف وجبة</a></td>"+
                "<td>"+"<select name='meal_name[]' class='form-control SlectBox' onclick='console.log($(this).val())' onclick='console.log(0)'>" +
                "</select>"+
                "</td>"+
                "<td>"+"<select id='quantity_id[]' name='quantity_id[]' class='form-control'>" +
                "<option value='1'>4</option>"+
                "<option value='2'>5</option>"+
                "<option value='3'>6</option>"+
                "</select>"+
                "</td>"+
                "<td>"+
                "<select id='price_num[]' name='price_num[]' class='form-control' onclick='console.log($(this).val())'>"+
                "</select>"
            "</td>"+"</tr>"





            $('tbody').append(tr);
        });
        $('tbody').on('click','.deleteRow',function(){
            $(this).parent().parent().remove();
        });
    </script>


@endsection
