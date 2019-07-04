@extends('main')
@section('extra_style')
<style type="text/css">
    .d-block{
        display: block;
    }
</style>
@endsection
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Hasil Tindakan</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">Home</a>
            </li>
            <li>
                <span>Manajemen Service Advisor</span>
            </li>
            <li class="active">
                <strong>Hasil Tindakan</strong>
            </li>
        </ol>
    </div>
</div>

@include('data_sales.summary_tindakan.detail_status')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#tab-1"><i class="fa fa-dice-one"></i> <span class="tab-title">Result Suspect</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-2"><i class="fa fa-dice-two"></i> <span class="tab-title">Bersedia + Booking</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-3"><i class="fa fa-dice-three"></i> <span class="tab-title">Bersedia + Belum Booking</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-4"><i class="fa fa-dice-four"></i> <span class="tab-title">Minta Dihubungi Lagi</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-5"><i class="fa fa-dice-five"></i> <span class="tab-title">Tidak Bersedia</span></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane animated fadeIn active">
                        <div class="ibox float-e-margins">
                            {{-- 
                            <div class="ibox-title">
                                <h5>Manajemen Tindakan Customer</h5>
                            </div> --}}
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="table_summary" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th width="1%">No.</th>
                                                <th>Status Follow Up</th>
                                                <th width="1%">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td align="center">1</td>
                                                <td><a class="d-block" href="#detail_status" data-toggle="modal">Daftar Kendaraan Suspect</a></td>
                                                <td align="center" id="all"></td>
                                            </tr>
                                            <tr>
                                                <td align="center">2</td>
                                                <td><a class="d-block" href="#detail_status" data-toggle="modal">Daftar Kendaraan Yang Sudah Difollow Up</a></td>
                                                <td align="center" id="done"></td>
                                            </tr>
                                            <tr>
                                                <td align="center">3</td>
                                                <td><a class="d-block" href="#detail_status" data-toggle="modal">Daftar Kendaraan Yang Sudah Booking</a></td>
                                                <td align="center" id="booking"></td>
                                            </tr>
                                            <tr>
                                                <td align="center">4</td>
                                                <td><a class="d-block" href="#detail_status" data-toggle="modal">Daftar Kendaraan Yang Belum Booking</a></td>
                                                <td align="center" id="nbooking"></td>
                                            </tr>
                                            <tr>
                                                <td align="center">5</td>
                                                <td><a class="d-block" href="#detail_status" data-toggle="modal">Daftar Kendaraan Yang Dihubungi Lagi</a></td>
                                                <td align="center" id="refu"></td>
                                            </tr>
                                            <tr>
                                                <td align="center">6</td>
                                                <td><a class="d-block" href="#detail_status" data-toggle="modal">Daftar Kendaraan Yang Tidak Bersedia</a></td>
                                                <td align="center" id="not"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                   
                            </div>

                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane animated fadeIn">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="table_kendaraan_1" style="width: 100%">
                                        <thead>
                                            <tr>
                                                
                                                <th width="10%">Tanggal Service</th>
                                                <th>No. Rangka</th>
                                                <th>No. Polisi</th>
                                                <th>Type Kendaraan</th>
                                                <th>Type Pekerjaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MHFM1BA2JBK035948</td>
                                                <td>B1295PKO</td>
                                                <td>AVANZA</td>
                                                <td>Service 10.000 Kilometer</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MR053AK50E4506151</td>
                                                <td>L3PY</td>
                                                <td>CAMRY</td>
                                                <td> Service 50.000 Kilometer </td>
                                            </tr>

                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MHKM1BA2JDK041994</td>
                                                <td>B1182BYK</td>
                                                <td>AVANZA</td>
                                                <td> Service 90.000 kilometer </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane animated fadeIn">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="table_kendaraan_2" style="width: 100%">
                                        <thead>
                                            <tr>
                                                
                                                <th width="10%">Tanggal Service</th>
                                                <th>No. Rangka</th>
                                                <th>No. Polisi</th>
                                                <th>Type Kendaraan</th>
                                                <th>Type Pekerjaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MHFM1BA2JBK035948</td>
                                                <td>B1295PKO</td>
                                                <td>AVANZA</td>
                                                <td>Service 10.000 Kilometer</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MR053AK50E4506151</td>
                                                <td>L3PY</td>
                                                <td>CAMRY</td>
                                                <td> Service 50.000 Kilometer </td>
                                            </tr>

                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MHKM1BA2JDK041994</td>
                                                <td>B1182BYK</td>
                                                <td>AVANZA</td>
                                                <td> Service 90.000 kilometer </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane animated fadeIn">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="table_kendaraan_3" style="width: 100%">
                                        <thead>
                                            <tr>
                                                
                                                <th width="10%">Tanggal Service</th>
                                                <th>No. Rangka</th>
                                                <th>No. Polisi</th>
                                                <th>Type Kendaraan</th>
                                                <th>Type Pekerjaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MHFM1BA2JBK035948</td>
                                                <td>B1295PKO</td>
                                                <td>AVANZA</td>
                                                <td>Service 10.000 Kilometer</td>
                                            </tr>
                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MR053AK50E4506151</td>
                                                <td>L3PY</td>
                                                <td>CAMRY</td>
                                                <td> Service 50.000 Kilometer </td>
                                            </tr>

                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MHKM1BA2JDK041994</td>
                                                <td>B1182BYK</td>
                                                <td>AVANZA</td>
                                                <td> Service 90.000 kilometer </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-5" class="tab-pane animated fadeIn">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="table_kendaraan_4" style="width: 100%">
                                        <thead>
                                            <tr>
                                                
                                                <th width="10%">Tanggal Service</th>
                                                <th>No. Rangka</th>
                                                <th>No. Polisi</th>
                                                <th>Type Kendaraan</th>
                                                <th>Type Pekerjaan</th>
                                                <th>Alasan Tidak Bersedia</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MHFM1BA2JBK035948</td>
                                                <td>B1295PKO</td>
                                                <td>AVANZA</td>
                                                <td>Service 10.000 Kilometer</td>
                                                <th>Mobilnya sudah dijual</th>
                                            </tr>
                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MR053AK50E4506151</td>
                                                <td>L3PY</td>
                                                <td>CAMRY</td>
                                                <td> Service 50.000 Kilometer </td>
                                                <th>Mobilnya sudah dijual</th>
                                            </tr>

                                            <tr>
                                                
                                                <td>2018-10-01</td>
                                                <td>MHKM1BA2JDK041994</td>
                                                <td>B1182BYK</td>
                                                <td>AVANZA</td>
                                                <td> Service 90.000 kilometer </td>
                                                <th>Mobilnya sudah dijual</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>   
   
        </div>
    </div>
</div>
@endsection

@section('extra_script')
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
                url : '{{route("getcount.summary")}}',
                type : 'POST',
                dataType:'json',
                data: {
                    '_token' :'{{csrf_token()}}',
                    '_method' :'PUT',
                },
                success: function(get){
                        console.log(get);
                    $('#all').html(' ');
                    $('#done').html(' ');
                    $('#booking').html(' ');
                    $('#nbooking').html(' ');
                    $('#refu').html(' ');
                    $('#not').html(' ');
                    
                    setTimeout(function(){
                        $('#all').html(get['all']);
                        $('#done').html(get['done']);
                        $('#booking').html(get['booking']);
                        $('#nbooking').html(get['notbooking']);
                        $('#refu').html(get['refu']);
                        $('#not').html(get['denied']);
                    },300)
                }
            })

        $('#table_summary').DataTable();
        $('#table_kendaraan_1').DataTable({
            responsive: true,
            serverSide: true,
            destroy: true,
            ajax : {
                url: "{{ route('booking.summary') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns : [
            {data : 'tanggal' , name : 'tanggal'},
            {data : 'c_serial' , name : 'c_serial'},
            {data : 'c_plate' , name : 'c_plate'},
            {data : 'c_typecar' , name : 'c_typecar'},
            {data : 'c_jobdesc' , name : 'c_jobdesc'},

            ],
            pageLength: 10,
            lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
        });
        $('#table_kendaraan_2').DataTable({
            responsive: true,
            serverSide: true,
            destroy: true,
            ajax : {
                url: "{{ route('notbooking.summary') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns : [
            {data : 'tanggal' , name : 'tanggal'},
            {data : 'c_serial' , name : 'c_serial'},
            {data : 'c_plate' , name : 'c_plate'},
            {data : 'c_typecar' , name : 'c_typecar'},
            {data : 'c_jobdesc' , name : 'c_jobdesc'},


            ],
            pageLength: 10,
            lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
        });
        $('#table_kendaraan_3').DataTable({
            responsive: true,
            serverSide: true,
            destroy: true,
            ajax : {
                url: "{{ route('refu.summary') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns : [
            {data : 'tanggal' , name : 'tanggal'},
            {data : 'c_serial' , name : 'c_serial'},
            {data : 'c_plate' , name : 'c_plate'},
            {data : 'c_typecar' , name : 'c_typecar'},
            {data : 'c_jobdesc' , name : 'c_jobdesc'},

            ],
            pageLength: 10,
            lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
        });
        $('#table_kendaraan_4').DataTable(
        {
            responsive: true,
            serverSide: true,
            destroy: true,
            ajax : {
                url: "{{ route('denied.summary') }}",
                type: "post",
                data: {
                    "_token": "{{ csrf_token() }}"
                }
            },
            columns : [
            {data : 'tanggal' , name : 'tanggal'},
            {data : 'c_serial' , name : 'c_serial'},
            {data : 'c_plate' , name : 'c_plate'},
            {data : 'c_typecar' , name : 'c_typecar'},
            {data : 'c_jobdesc' , name : 'c_jobdesc'},
            {data : 'rf_reason' , name : 'rf_reason'},

            ],
            pageLength: 10,
            lengthMenu: [[10, 20, 50, -1], [10, 20, 50, 'All']]
        }
        );


        $('.input-daterange').datepicker();
    });
</script>
@endsection
