@extends('layouts.master')
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
<form action="echo.php" class="repeater" enctype="multipart/form-data">
  <div data-repeater-list="group-a">
    <div data-repeater-item>
      <input name="untyped-input" value="A"/>

      <input type="text" name="text-input" value="A"/>

      <input type="date" name="date-input" value="2018-05-01"/>

      <input type="url" name="url-input" value="https://exemple.com/a"/>

      <input type="color" name="color-input" value="#aaaaaa"/>

      <input type="datetime-local" name="datetime-local-input" value="2018-05-12T19:30"/>

      <input type="month" name="month-input" value="2018-05"/>

      <input type="number" name="number-input" value="42"/>

      <input type="search" name="search-input" value="A"/>

      <input type="tel" name="tel-input" value="1112223333"/>

      <input type="time" name="time-input" value="13:30"/>

      <input type="week" name="week-input" value="2018-W26"/>

      <textarea name="textarea-input">A</textarea>

      <input type="radio" name="radio-input" value="A" checked/>
      <input type="radio" name="radio-input" value="B"/>

      <input type="checkbox" name="checkbox-input" value="A" checked/>
      <input type="checkbox" name="checkbox-input" value="B"/>

      <select name="select-input">
        <option value="A" selected>A</option>
        <option value="B">B</option>
      </select>

      <select name="multiple-select-input" multiple>
        <option value="A" selected>A</option>
        <option value="B" selected>B</option>
      </select>

      <input data-repeater-delete type="button" value="Delete"/>
    </div>
    <div data-repeater-item>
      <input name="untyped-input" value="A"/>

      <input type="text" name="text-input" value="B"/>

      <input type="date" name="date-input" value="2019-05-01"/>

      <input type="url" name="url-input" value="https://exemple.com/b"/>

      <input type="color" name="color-input" value="#bbbbbb"/>

      <input type="datetime-local" name="datetime-local-input" value="2019-05-12T19:30"/>

      <input type="month" name="month-input" value="2019-05"/>

      <input type="number" name="number-input" value="43"/>

      <input type="search" name="search-input" value="B"/>

      <input type="tel" name="tel-input" value="4442223333"/>

      <input type="time" name="time-input" value="14:30"/>

      <input type="week" name="week-input" value="2019-W26"/>

      <textarea name="textarea-input">B</textarea>

      <input type="radio" name="radio-input" value="A" />
      <input type="radio" name="radio-input" value="B" checked/>

      <input type="checkbox" name="checkbox-input" value="A"/>
      <input type="checkbox" name="checkbox-input" value="B" checked/>

      <select name="select-input">
        <option value="A">A</option>
        <option value="B" selected>B</option>
      </select>

      <select name="multiple-select-input" multiple>
        <option value="A" selected>A</option>
        <option value="B" selected>B</option>
      </select>

      <input data-repeater-delete type="button" value="Delete"/>
    </div>
  </div>
  <input data-repeater-create type="button" value="Add"/>
</form>
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
    $(document).ready(function() {

        $('select[name="restaurant_name"]').on('change', function() {
            var SectionId = $(this).val();
            // dd(SectionId);
            if (SectionId) {

                $.ajax({

                    url:"{{ URL::to('order/show') }}/" +SectionId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Section"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="Section"]').append('<option value="' +
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


@endsection
