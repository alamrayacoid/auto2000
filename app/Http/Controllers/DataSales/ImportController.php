<?php

namespace App\Http\Controllers\DataSales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\d_customer;
use DataTables;
use Carbon\Carbon;
use Excel;
use App\d_hcustommer;
use DB;

class ImportController extends Controller
{
   	public function import_excel()
   	{
   		$urutan = d_customer::all()->count();
      setlocale(LC_TIME, 'IND');
   		$code = 'S'.$urutan.Carbon::now()->format('ds');
   		return view('monitoring_kinerja.import_excel.import_excel',array(
   			'code' => $code,
   		));
   	}

      public function tablerekap(){
         $data = DB::table('d_recap')->get();
         setlocale(LC_TIME, 'IND');
         return DataTables::of($data)
         ->make(true);
      }

      public function table(){
         $data = DB::table('d_customerremovable')->get();
         return DataTables::of($data)
         ->addIndexColumn()
         ->addcolumn('rangka',function($data){
            return $data->cr_serial .'<input type="hidden" value="'.$data->cr_serial.'" class="serialc" name="serial[]"><input type="hidden" value="'.$data->cr_id.'" class="serial" name="idd[]">';
         })
         ->addcolumn('plate',function($data){
            return $data->cr_plate .'<input type="hidden" value="'.$data->cr_plate.'" class="plate" name="plate[]">';
         })
         ->addcolumn('type',function($data){
            return $data->cr_typecar .'<input type="hidden" value="'.$data->cr_typecar.'" class="car" name="car[]">';
         })
         ->addcolumn('job',function($data){
            return $data->cr_jobdesc .'<input type="hidden" value="'.$data->cr_jobdesc.'" class="job" name="job[]">';
         })
         ->addcolumn('date',function($data){
            return Carbon::parse($data->cr_dateservice)->formatLocalized('%d %B %Y').'<input type="hidden" value="'.setlocale(LC_TIME, 'IND').'"><input type="hidden" value="'.$data->cr_dateservice.'" class="date" name="date[]">';
         })
         ->addcolumn('servicead',function($data){
            return $data->cr_serviceadvisor .'<input type="hidden" value="'.$data->cr_serviceadvisor.'" class="advisor" name="advisor[]">';
         })
         ->addcolumn('action',function($data){
            return '<button class="btn btn-danger btn-sm hapus" data-id="'.$data->cr_id.'" type="button"><i class="fa fa-trash"></i></button>';
         })
         ->rawColumns(['rangka', 'plate', 'type', 'job', 'date', 'servicead', 'action'])
         ->make(true);
      }

   	public function hstoredata(Request $request){
          $code = $request->code;
         $check = DB::table('d_customerremovable')->count();
         if ($check == 0) {
      		    $alldata = [];
               for ($i=1; $i < $request->datacount ; $i++) { 
              $datetime = Carbon::parse($request->result['Sheet1'][$i][4])->format('Y,m,d');
              $arr = array(
         			'cr_serial' => $request->result['Sheet1'][$i][0],  
         			'cr_plate' => $request->result['Sheet1'][$i][1],
         			'cr_typecar' => $request->result['Sheet1'][$i][2],
         			'cr_jobdesc' => $request->result['Sheet1'][$i][3],
         			'cr_dateservice' => $datetime,
         			'cr_serviceadvisor' => $request->result['Sheet1'][$i][5],
         			'cr_code' => 'true',
         			'status_data' => 'true',

         		    );

      		 array_push($alldata, $arr);
               }
      		d_hcustommer::insert($alldata);
         }else{
            d_hcustommer::truncate();

            for ($i=1 ; $i < $request->datacount ; $i++) { 
                $datetime = Carbon::parse($request->result['Sheet1'][$i][4])->format('Y,m,d');
               $arr = array(
                  'cr_serial' => $request->result['Sheet1'][$i][0],  
                  'cr_plate' => $request->result['Sheet1'][$i][1],
                  'cr_typecar' => $request->result['Sheet1'][$i][2],
                  'cr_jobdesc' => $request->result['Sheet1'][$i][3],
                  'cr_dateservice' => $datetime,
                  'cr_serviceadvisor' => $request->result['Sheet1'][$i][5],
                  'cr_code' => 'true',
                  'status_data' => 'true',

                   );

             array_push($alldata, $arr);
               }
            d_hcustommer::insert($alldata);
         }

   	}

      public function storedata(Request $request){
      $ns1 = Carbon::now('Asia/Jakarta')->subMonth()->format('Y,m');
      $ns2 = Carbon::now('Asia/Jakarta')->subMonths(2)->format('Y,m');
      $ns3 = Carbon::now('Asia/Jakarta')->subMonths(3)->format('Y,m');
      $ns4 = Carbon::now('Asia/Jakarta')->subMonths(4)->format('Y,m');
      $ns5 = Carbon::now('Asia/Jakarta')->subMonths(5)->format('Y,m');
      $di1 = Carbon::now('Asia/Jakarta')->subMonths(4)->format('Y,m');
      $di2 = Carbon::now('Asia/Jakarta')->subMonths(5)->format('Y,m');
      $di3 = Carbon::now('Asia/Jakarta')->subMonths(6)->format('Y,m');
      $di4 = Carbon::now('Asia/Jakarta')->subMonths(7)->format('Y,m');
      $di5 = Carbon::now('Asia/Jakarta')->subMonths(8)->format('Y,m');
        $rcount = $request->serialc;
        $code = $request->code;
          $id = $request->idd;
          $count = DB::table('d_customerremovable')->count();

          if ($count == 0) {
            return response()->json(array(
              'error' => 'Mohon Import Data',
            ));
          }else{
          $alldata = [];
            for ($i=0; $i < $rcount ; $i++) { 
                $cek = DB::table('d_customer')->where('c_serial',$request->serial[$i])->count();
                $td = Carbon::parse($request->date[$i])->format('Y,m');
              if ($td == $di1 || $td == $di2 || $td == $di3 || $td == $di4 || $td == $di5  ) {
                  if ($cek == 0 )  {
            $arr = array(
               'c_serial' => $request->serial[$i],
               'c_plate' => $request->plate[$i],
               'c_typecar' => $request->car[$i],
               'c_jobdesc' => $request->job[$i],
               'c_dateservice' => $request->date[$i],
               'c_serviceadvisor' => $request->advisor[$i],
               'c_code' => $request->code,
               'status_data' => 'true',
                );
                    
                array_push($alldata, $arr);
                DB::table('d_customerremovable')->where('cr_id', $id[$i])->delete();
                    }else{
                      DB::table('d_customer')->where('c_serial',$request->serial[$i])
                      ->update([
                        'c_dateservice' => $request->date[$i],
                        'status_data' => 'true',
                      ]);
                    DB::table('d_customerremovable')->where('cr_id', $id[$i])->delete();
                    }
                }
            }
         d_customer::insert($alldata);
         d_hcustommer::truncate();
          }


      }

      public function rekap(Request $request){
        $rcount = $request->serial;
        $code = $request->code;
        $data = DB::table('d_customer')->where('c_code',$code)->count();
        $avaible = $request->cout - 1;
          DB::table('d_recap')->insert([
            're_dataadded' => $data,
            're_availabledata' => $avaible,
            're_totaldata' => $request->cout - 1,
            're_dateupload' => Carbon::now(),
            're_ccustomer' => $code,
            'status_data' => 'true',
          ]);
      }

      public function delete(Request $request){
          $id = $request->id;
          DB::table('d_customerremovable')->where('cr_id',$id)->delete();

      }

      public function reset(Request $request){
          d_hcustommer::truncate();
      }


}
