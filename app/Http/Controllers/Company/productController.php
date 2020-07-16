<?php

namespace App\Http\Controllers\Company;

use Illuminate\Support\Facades\Session;
use App\Product;
use App\Company_product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function view() {
        $user=Session::get('user_id');
        //$product=Company_product::where('status','active')->where('company_id',$user)->get();
        $mproduct=Product::where('status','active')->get();
        return view('Company/add-products')->with('user',$user)->with('mproduct',$mproduct);
    }

    public function create(Request $request) {
        

            $data=$request->all();
            if(count($request->product_name)>0) {
                foreach($request->product_name as $item=>$v) {

                    $json_value=$request->product_category_id[$item];
                    $json_array = json_decode($json_value, true);
                        $cate_name= $json_array[0]["name"];
                        $cate_id= $json_array[1]["id"];

                     $data2=array(
                        'product_name' => $request->product_name[$item],
                        'product_price' => $request->product_price[$item],
                        'product_category' => $cate_name,
                        'product_category_id' => $cate_id,
                        'company_id' => $request->company_id[$item],
                        'status' => $request->status[$item]
                    );

                    //($cate_name);
                    //dd($cate_name);
                    //dd($data2);
                    DB::table('company_products')->insert($data2);
                }
            }
            return redirect()->back()->with('message', 'successfully added');
    }
    
    public function delete(Request $request) {
        $city = Company_product::find($request->id);
        $city->status='deactive';
        $city->save();
        return redirect()->back()->with('dmessage', 'successfully deleted');
    }

    public function getProduct() {
        
        $product = Company_product::where('status', 'active')->get()->toJson();

        return response()->json($product);

    }
    
    public function get($id) {
        
        $product = Company_product::where('id', $id)->get()->toJson();

        return response()->json($product);

    }
    
    public function upload(Request $request) {
        
        //dd("hari");

        $file = $request->file('file');
    
        // File Details 
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
    
        // Valid File Extensions
        $valid_extension = array("csv");
    
        // 2MB in Bytes
        $maxFileSize = 2097152; 
    
        // Check file extension
        if(in_array(strtolower($extension),$valid_extension)) {
    
            // Check file size
            if($fileSize <= $maxFileSize) {
    
                // File upload location
                $location = 'uploads';
    
                // Upload file
                $file->move($location,$filename);
    
                // Import CSV to Database
                $filepath = public_path($location."/".$filename);
    
                // Reading file
                $file = fopen($filepath,"r");
                //dd($file);
    
                $importData_arr = array();
                $i = 0;
    
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata );
                
                    // Skip first row (Remove below comment if you want to skip the first row)
                    if($i == 0) {
                        $i++;
                        continue; 
                    }

                    for ($c=0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata [$c];
                    }

                    $i++;
                }
                fclose($file);

                // Insert to MySQL database
                foreach($importData_arr as $importData) {
    
                    $insertData = array(
                        "product_name"=>$importData[0],
                        "product_price"=>$importData[1],
                        "product_category"=>$importData[2],
                        "product_category_id"=>$importData[3],
                        "company_id"=>Session::get('user_id'),
                        "status"=>"active");
                        Company_product::insert($insertData);
                
                }
                //dd($insertData);
    
                Session::flash('message','Import Successful.');

            }
            else {
                Session::flash('message','File too large. File must be less than 2MB.');
            }
    
        }
        else {
            Session::flash('message','Invalid File Extension.');
        }
            
        return redirect()->action('Company\productController@view');
  

    }

}
