@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Product Details</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <div class="col-6" style="font-size: 25px">
                                Product Name:

                                <div class="card">
                                Eng:
                                {{$product->product_name_en}}
                                </div>

                                <div class="card">
                                Hin:
                                {{$product->product_name_hin}}
                                </div>

                            </div>

                            <div class="col-4" style="font-size: 25px">
                                
                                Product Price/Stocks:

                                    <div class="card">
                                        Selling Price:
                                        {{$product->selling_price}}
                                    </div>

                                    <div class="card">
                                        Discount Price:
                                        {{$product->discount_price}}
                                    </div>

                                    <div class="card">
                                        Quantity:
                                        {{$product->product_qty}}
                                    </div>

                            </div>
                            
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <div class="col-4" style="font-size: 25px">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="card-title">
                                            Thambnail:
                                        </div>

                                        <div class="card-body">
                                            <img src="{{ asset($product->product_thambnail) }}"
                                            style="width: 300px; height: 300px;">
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

    </div>

@endsection