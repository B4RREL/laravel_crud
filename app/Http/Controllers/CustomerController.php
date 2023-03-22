<?php

namespace App\Http\Controllers;



use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //direct Create page
    public function createPage(){
        return view('create');
    }

    //create
    public function create(Request $req){
        // dd($req->all());


        $this->validateCheck($req, "create");

        $data = [
            "name" => $req->name,
            "email" => $req->email,
            "phone" => $req->phone,
            "address" => $req->address,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ];
    //  dd($data);
        Customer::create($data);
        return redirect()->route("read")->with('createSuccess',"Customer Account ဖန်တီးမှု အောင်မြင်ပါသည်");
    }

    //read page
    public function readPage(){
        $datas = Customer::orderBy('created_at',"desc")->paginate('3');
        return view("read",compact("datas"));
    }

    //direct update page
    public function updatePage($id){
        $data = Customer::where('id',$id)->first();
        return view('update',compact('data'));
    }

    //update
    public function update($id, Request $req){
        //  dd($req->all());

        $this->validateCheck($req, "update");

        $data = [
            "name" => $req->name,
            "email" => $req->email,
            "phone" => $req->phone,
            "address" => $req->address,
            "updated_at" => Carbon::now(),
        ];
        Customer::where("id",$id)->update($data);
        return redirect()->route('read')->with('updateSuccess',"Customer Account ပြင်ဆင်မှုအောင်မြင်ပါသည်");
    }

    //delete
    public function delete($id){
        Customer::where("id",$id)->delete();
        return back()->with('deleteSuccess',"Customer Account  တစ်ခုဖျက်လိုက်ပါသည်");
    }

    private function validateCheck($input, $status){
         //validation

         $validateMsg = [
            "name.required" => "name ဖြည့်ရန်လိုအပ်ပါသည်",
            "email.required" => "email ဖြည့်ရန်လိုအပ်ပါသည်",
            "phone.required" => "phone no ဖြည့်ရန်လိုအပ်ပါသည်",
            "phone.min" => "phone no သည်အနည်းဆုံးခြောက်လုံးရှိရပါမည်",
            "phone.max" => "phone no သည်ဆယ့်ငါးလုံးမကျော်ရပါ",
            "phone.unique" => "phone no တူနေပါသည်",
            "address.required" => "address ဖြည့်ရန်လိုအပ်ပါသည်",


         ];
    if($status == "create") {
         $validateRule = [
            "name" => "required",
            "email" => "required",
            "phone" => "required|min:6|max:15|unique:Customers,phone",
            "address" => "required",
         ];
        } elseif($status == "update"){
            $validateRule = [
                "name" => "required",
                "email" => "required",
                "phone" => "required|min:6|max:15|unique:Customers,phone,".$input->id,
                "address" => "required",
             ];
        }


        Validator::make($input->all(), $validateRule, $validateMsg)->validate();
        //validation end
    }
}
