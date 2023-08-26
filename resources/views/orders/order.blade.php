@extends('layouts.master')
@section('title')
    الطلبات
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
                <h4 class="content-title mb-0 my-auto">قائمة الطلبات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/اضافة طلب</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">

        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

                        {{--                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">انشاء طلب</a>--}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم المطعم </th>

                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">ملاحظات</th>
                                <th class="border-bottom-0">العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach($order as $ord)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    {{--                                <td>{{$ord->restaurant_id}}</td>--}}
                                    <td>{{$ord->restaurant->name}}</td>
{{--                                    <td>{{$ord->name_meal()}}</td>--}}

{{--                                   <td>--}}
{{--                                        @foreach($meal as $m)--}}
{{--                                        <td>{{$m->orders->name[1]}}</td>--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
                                    <td>{{$ord->status}}</td>
                                    <td>{{$ord->note}}</td>

                                    <td>

                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-id="{{$ord->id}}" data-restaurant_id="{{$ord->restaurant_id}}"
                                           data-status="{{$ord->status}}"  data-note="{{$ord->note}}"

                                           data-toggle="modal"
                                           href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>



                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{$ord->id}}" data-restaurant_id="{{$ord->restaurant_id}}"
                                           data-status="{{$ord->status}}"
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
                    {{--                <div class="modal-header">--}}
                    {{--                    <h6 class="modal-title">انشاء طلب </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>--}}
                    {{--                </div>--}}
                    <div class="modal-body">
                        <form action="{{route('order.store')}}" method="post">
                            @csrf

                            <select name="restaurant_id" id="restaurant_id" class="form-control" required>
                                <option value="" selected disabled> اسم المطعم</option>
                                @foreach ($rest as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>


                            <div class="form-group" >
                                <label for="exampleInputEmail1">حالة الطلب</label>
                                <input type="text" class="form-control" name="status" id="status" required>
                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">ملاحظات </label>
                                <input type="text" class="form-control" name="note" id="note" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">{{trans('Orders_trans.Name_Meal')}}</label>
                                <select  name="meal_id[]" class="form-control" id="meal_id">
                                    @foreach($meal as $m)
                                        <option value="{{$m->id}}">{{$m->name}}</option>
                                    @endforeach
                                </select>
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
                        <h5 class="modal-title" id="exampleModalLabel">تعديل الطلب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{route('order.update')}}" method="post" autocomplete="off">

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="exampleInputEmail1">اسم المطعم</label>
                                {{--                            <input type="text" class="form-control" name="restaurant_id" id="restaurant_id" required>--}}
                                <select name="restaurant_id" id="restaurant_id" class="form-control" required>
                                    <option value="" selected disabled> اسم المطعم</option>
                                    @foreach ($rest as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach

                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">حالة الطلب</label>
                                <input type="text" class="form-control" name="status" id="status"  required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> ملاحظات</label>
                                <input type="text" class="form-control" name="note" id="note"  required>
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">{{trans('Orders_trans.Name_Meal')}}</label>
                                <select multiple name="meal_id[]" class="form-control" id="exampleFormControlSelect2">
                                    {{--                                @foreach($order->meals as $mel)--}}
                                    {{--                                    <option value="{{$mel['id']}}">{{$mel['name']}}</option>--}}
                                    {{--                                @endforeach--}}
                                    @foreach($meal as $m)
                                        <option value="{{$m->id}}">{{$m->name}}</option>
                                    @endforeach
                                </select>
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
                        <h6 class="modal-title">حذف الطلب</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                      type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <form action="{{route('order.destroy')}}" method="post">
                        @csrf
                        @method('DELETE')

                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="restaurant_id" id="restaurant_id" type="text" readonly>
                            <input class="form-control" name="status" id="status" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
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

            var button=$(event.relatedTarget)
            var id=button.data('id')
            var restaurant_id=button.data('restaurant_id')
            var status=button.data('status')
            var note=button.data('note')

            var modal=$(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #restaurant_id').val(restaurant_id);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #note').val(note);

        })
    </script>
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var restaurant_id = button.data('restaurant_id')
            var status = button.data('status')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #restaurant_id').val(restaurant_id);
            modal.find('.modal-body #status').val(status);


    </script>
@endsection

