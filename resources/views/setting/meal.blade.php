@extends('layouts.master')
@section('title')
    الوجبات
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
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة وجبة</span>
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
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">إضافة وجبة</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم الوجبة </th>
                                <th class="border-bottom-0">رقم تصنيف الوجبة</th>
                                <th class="border-bottom-0">الوصف</th>
                                <th class="border-bottom-0">صورة الوجبة</th>
                                <th class="border-bottom-0">السعر</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach($meals as $meal)
                                    <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    {{-- <td>{{$ord->id}}</td>--}}
                                    <td>{{$meal->name}}</td>
                                    <td>{{$meal->category_id}}</td>
                                    <td>{{$meal->description}}</td>
                                    <td>{{$meal->image}}</td>
                                    <td>{{$meal->price}}</td>


                                    <td>

                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                           data-id="{{$meal->id}}" data-name="{{$meal->name}}"
                                           data-category_id="{{$meal->category_id}}" data-description="{{$meal->description}}"
                                           data-image="{{$meal->image}}"   data-price="{{$meal->price}}"

                                           data-toggle="modal"
                                           href="#exampleModal2" title="تعديل"><i class="las la-pen"></i></a>


                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                           data-id="{{$meal->id}}" data-name="{{$meal->name}}"
                                           data-description="{{$meal->description}}"

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
                        <h6 class="modal-title">إضافة وجبة </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('meal.store')}}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم الوجبة</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">رقم تصنيف الوجبة</label>
                                <input type="text" class="form-control" name="category_id" id="category_id" required>
                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">الوصف</label>
                                <input type="text" class="form-control" name="description" id="description" required>
                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">صورة الوجبة </label>
                                <input type="file" class="form-control" name="image" id="image" required>

                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">السعر </label>
                                <input type="text" class="form-control" name="price" id="price" required>
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
                        <h5 class="modal-title" id="exampleModalLabel">تعديل الوجبة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{route('meal.update')}}" method="post" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="exampleInputEmail1">اسم الوجبة</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">رقم تصنيف الوجبة</label>
                                <input type="text" class="form-control" name="category_id" id="category_id" required>
                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">الوصف</label>
                                <input type="text" class="form-control" name="description" id="description" required>
                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">صورة الوجبة </label>
                                <input type="text" class="form-control" name="image" id="image" required>
                            </div>

                            <div class="form-group" >
                                <label for="exampleInputEmail1">السعر </label>
                                <input type="text" class="form-control" name="price" id="price" required>
                            </div>

                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">تأكيد</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
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
                        <h6 class="modal-title">حذف الوجبة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                      type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <form action="{{route('meal.destroy')}}" method="post">
                        @csrf
                        @method('DELETE')

                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="name" id="name" type="text" readonly>
                            <input class="form-control" name="description" id="description" type="text" readonly>
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
            var name=button.data('name')
            var category_id=button.data('category_id')
            var description=button.data('description')
            var image=button.data('image')
            var price=button.data('price')

            var modal=$(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #category_id').val(category_id);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #image').val(image);
            modal.find('.modal-body #price').val(price);

        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id=button.data('id')
            var name=button.data('name')
            var description=button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #description').val(description);

        })
    </script>
@endsection

