@extends('layouts.master')
@section('title')
    العروض
@endsection
@section('css')

    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/اضافة عرض</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
{{--    @if($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <li>{{$error}}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        @if(session()->has('Add'))--}}
{{--            <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                <strong>{{session()->get('Add')}}</strong>--}}
{{--                <button type="button" class="close" data-dismiss="alert" aria-lablel="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        @if(session()->has('Error'))--}}
{{--            <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                <strong>{{session()->get('Error')}}</strong>--}}
{{--                <button type="button" class="close" data-dismiss="alert" aria-lablel="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        @endif--}}
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة قسم</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم العرض</th>
                                <th class="border-bottom-0">الكود</th>
                                <th class="border-bottom-0">نوع العرض</th>
                                <th class="border-bottom-0">قيمة الحسم</th>
                                <th class="border-bottom-0">السعر قبل الحسم</th>
                                <th class="border-bottom-0">السعر بعد الحسم</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">رقم المطعم</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($sections as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $x->name }}</td>
                                    <td>{{ $x->code }}</td>
                                    <td>{{ $x->rabat_type }}</td>
                                    <td>{{ $x->rabat_value }}</td>
                                    <td>{{ $x->valid_from }}</td>
                                    <td>{{ $x->valid_for }}</td>
                                    <td>{{ $x->status }}</td>
                                    <td>{{ $x->restaurant_id }}</td>

                                    <td>

                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-id="{{ $x->id }}" data-name="{{ $x->name }}"
                                           data-code="{{ $x->code }}" data-rabat_type="{{ $x->rabat_type }}"
                                           data-rabat_value="{{ $x->rabat_value }}"  data-valid_from="{{ $x->valid_from }}"
                                           data-valid_for="{{ $x->valid_for }}" data-status="{{ $x->status }}"  data-restaurant_id="{{ $x->restaurant_id }}"
                                           data-toggle="modal"
                                           href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>

                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{ $x->id }}" data-name="{{ $x->name }}"
                                           data-code="{{ $x->code }}" data-rabat_type="{{ $x->rabat_type }}"
                                           data-rabat_value="{{ $x->rabat_value }}"  data-valid_from="{{ $x->valid_from }}"
                                           data-valid_for="{{ $x->valid_for }}" data-status="{{ $x->status }}"  data-restaurant_id="{{ $x->restaurant_id }}"
                                           data-toggle="modal" href="#modaldemo9" title="حذف"><i
                                                class="las la-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


<div class="modal" id="modaldemo8">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                        <form action="{{route('coupons.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم العرض</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">كود العرض</label>
                                <input type="text" class="form-control" name="code" id="code" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">نوع العرض</label>
                                <input type="text" class="form-control" name="rabat_type" id="rabat_type" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">قيمة الحسم</label>
                                <input type="text" class="form-control" name="rabat_value" id="rabat_value" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">السعر قبل الحسم</label>
                                <input type="text" class="form-control" name="valid_from" id="valid_from" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">السعر بعد الحسم</label>
                                <input type="text" class="form-control" name="valid_for" id="valid_for" required>
                            </div>
                            <div class="form-group" >
                                <label for="exampleInputEmail1">الحالة</label>
                                <input type="text" class="form-control" name="status" id="status" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">رقم المطعم</label>
                                <select name="restaurant_id" id="restaurant_id" class="form-control" required>
                                    <option value="" selected disabled> --حدد القسم--</option>
                                    @foreach ($rest as $r)
                                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                                    @endforeach
                                </select>
{{--                                <input type="text" class="form-control" name="restaurant_id" id="restaurant_id" required>--}}
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">تأكيد</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
            <!-- End Basic modal -->
</div>
        <!-- edit -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل عرض</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{route('coupons.update')}}" method="post" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="recipient-name" class="col-form-label">اسم العرض:</label>
                                <input class="form-control" name="name" id="name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">كود العرض</label>
                                <input type="text" class="form-control" name="code" id="code"  required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">نوع العرض</label>
                                <input type="text" class="form-control" name="rabat_type" id="rabat_type"  required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">قيمة الحسم</label>
                                <input type="text" class="form-control" name="rabat_value" id="rabat_value"  required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">السعر قبل الحسم</label>
                                <input type="text" class="form-control" name="valid_from" id="valid_from" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">السعر بعد الحسم</label>
                                <input type="text" class="form-control" name="valid_for" id="valid_for"  required>
                            </div>
                            <div class="form-group" >
                                <label for="exampleInputEmail1">الحالة</label>
                                <input type="text" class="form-control" name="status" id="status"  required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">رقم المطعم</label>
                                <input type="text" class="form-control" name="restaurant_id" id="restaurant_id" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">ملاحظات:</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف القسم</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal"
                                                                      type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="coupons/destroy" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="name" id="name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!-- row closed -->
        </div>
        <!-- Container closed -->
        </div>
        <!-- main-content closed -->
        @endsection
        @section('js')
            <!-- Internal Data tables -->
            <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
            <!--Internal  Datatable js -->
            <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
            <script src="{{URL::asset('assets/js/modal.js')}}"></script>
            <script>
                $('#exampleModal2').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var name = button.data('name')
                    var code = button.data('code')
                    var rabat_type = button.data('rabat_type')
                    var rabat_value = button.data('rabat_value')
                    var valid_from = button.data('valid_from')
                    var valid_for = button.data('valid_for')
                    var status = button.data('status')
                    var restaurant_id = button.data('restaurant_id')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name').val(name);
                    modal.find('.modal-body #code').val(code);
                    modal.find('.modal-body #rabat_type').val(rabat_type);
                    modal.find('.modal-body #rabat_value').val(rabat_value);
                    modal.find('.modal-body #valid_from').val(valid_from);
                    modal.find('.modal-body #valid_for').val(valid_for);
                    modal.find('.modal-body #status').val(status);
                    modal.find('.modal-body #restaurant_id').val(restaurant_id);

                })
            </script>
            <script>
                $('#modaldemo9').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget)
                    var id = button.data('id')
                    var name = button.data('name')
                    var code = button.data('code')
                    var rabat_type = button.data('rabat_type')
                    var modal = $(this)
                    modal.find('.modal-body #id').val(id);
                    modal.find('.modal-body #name').val(name);
                    modal.find('.modal-body #code').val(code);
                    modal.find('.modal-body #rabat_type').val(rabat_type);
                    // modal.find('.modal-body #section_name').val(name);
                })
            </script>
@endsection

