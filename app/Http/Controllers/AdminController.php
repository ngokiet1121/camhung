<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use Auth;
use Hash;
use App\Admin;
use App\Role;
use App\Product;
use App\Contact;
use App\Order;

class AdminController extends Controller
{
    
    public function __construct() {
    	$this->middleware('admin',['except' => 'getLogout']);
    }
    public function getIndex()
    {
        $products = Product::select('id','name','price','quantity','is_active','created_at')->orderBy('id','ASC')->get()->toArray();
        $contacts = Contact::select('id','name','address','email','phone','content','is_active')->orderBy('id','ASC')->get()->toArray();
        $allOrders = Order::select('id','name','email','content','address','phone','status','admin_id','created_at')->orderBy('id','ASC')->get()->toArray();
        return view('admin.home.dashboard',compact('products','contacts','allOrders'));
    }
    public function getLogout() {
    	Auth::guard('admin')->logout();
    	return redirect('admin');
    }


    public function getInfo(){
        $admin= Auth::guard('admin')->user();
    
        return view('admin.infoadmin.infoadmin',compact('admin'));
    }


    public function postInfo(Request $request){
        
        $id = Auth::guard('admin')->user();
        $admin = Admin::findorFail($id['id']); 
        $now = time();        
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        if ($request->hasFile('fuImage')){
            $file_name = ($request->file('fuImage')->getClientOriginalName());
            $name = "$now$file_name";
            $request->file('fuImage')->move("uploads/images/",$name);

            $admin->img = "uploads/images/$name";
        }
        if($admin->save()){   
            return redirect()->route('admin.infoadmin.getInfo')->with(['flash_message'=>'Thành công']);
        }else{
             return redirect()->route('admin.infoadmin.getInfo')->with(['err_message'=>'Thất Bại']);
        }
    }

    public function getChangePass(){
        return view('admin.infoadmin.changepass');
    }


   public function postChangePass(Request $request)
        {

            $admin = Auth::guard('admin')->user();
            $password = $request->txtOldPass;
            if($request->input('txtNewPass')!= null)
            {

                if(Hash::check($password,$admin['password']))//kiểm tra password có đúng với pass trong csdl
                {
                    $this->validate($request,
                    [ 'txtNewPass' => 'different:txtOldPass',
                      'txtConfirmPass' => 'same:txtNewPass',
 
                    ],
                    [
                        'txtNewPass.different' => 'Mật khẩu mới và cũ không được trùng',
                        'txtConfirmPass.same' => 'Xác nhận mật khẩu không đúng',
                    ]);
                    $admin['password'] = bcrypt($request->txtNewPass);
                }
                else{
                    return redirect()->route('admin.infoadmin.getChangePass')->with(['err_message'=>'Sai mật khẩu cũ']);
                }

                $admin->save();
                return redirect()->route('admin.getLogout')->with(['flash_message'=>'Đổi mật khẩu thành công']);

            }
            else{
                return redirect()->route('admin.infoadmin.getChangePass')->with(['err_message'=>"Vui lòng nhập mật khẩu mới"]);
            }        
        }


    public function getAddStaff(){
        $roles = Role::select('id','name','content')->get()->toArray();
        $admin = Auth::guard('admin')->user();     
        if($admin['role_id'] != 1)
        {
            return view('admin.limit');
        }
        else
        {
            return view('admin.staff.add',compact('roles'));
        }
           
        
    }
    public function postAddStaff(Request $request){

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->email = $request->email;
        $admin->role_id= $request->role_id;
        
        if($request->input('password')!= null)
        {
            $this->validate($request,
            [   'com_password' => 'same:password',
            ],
            [
                'com_password.same' => 'Xác nhận mật khẩu không đúng',
            ]);
            $admin['password'] = bcrypt($request->password);
        }

        $admin->save();
        return redirect()->route('admin.staff.getAddStaff')->with(['flash_message'=>'Thêm nhân viên thành công']);
    }

    public function getList(){
        $admin = Auth::guard('admin')->user();         
        $staffs = Admin::select('id','name', 'email','phone','img','address','role_id')->get()->toArray(); 
        if($admin['role_id'] != 1)
        {
            return view('admin.limit');
        }
        else
        {
            return view('admin.staff.list',compact('staffs'));
        }
    }

    public function getDeleteStaff($id){
        $admin = Auth::guard('admin')->user();         
        $staff = Admin::findorFail($id);    
        if($admin['role_id'] != 1)
        {
            return view('admin.limit');
        }
        else
        {
            $staff->delete($id);
            return redirect()->route('admin.staff.getList')->with(['flash_message'=>'Xóa thành công']);
        }
    }
}