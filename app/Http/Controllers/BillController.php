<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Customer;
use App\BillDetail;
use App\Product;
use App\User;

class BillController extends Controller
{
    //
    public function getDanhSach()
    {
    	$bill = Bill::all();
        $user = User::where('level',2)->get();
        $customer = Customer::all();
    	return view('admin.hoadon.danhsach', ['bill'=>$bill,'customer'=>$customer,'user'=>$user]);
    }

    public function getChitiet($id)
    {
        $bill = Bill::find($id);
        $customer = Customer::all();
        $billdetail = BillDetail::all();
        $sanpham = Product::all();
        return view('admin.hoadon.chitiethoadon',['bill'=>$bill, 'customer'=>$customer, 'billdetail'=>$billdetail, 'sanpham'=>$sanpham]);
    }

    public function getSua($id)
    {
        $user = User::where('level',2)->get();
    	$bill = Bill::find($id);
    	return view('admin.hoadon.sua',['bill'=>$bill, 'user'=>$user]);
    }
    public function postSua(Request $req, $id)
    {
        $bill = Bill::find($id);
    	$bill->status = $req->status;
        $user->full_name = $rep->full_name;
        
    	$bill->save();

    	return redirect('admin/hoadon/danhsach')->with('thongbao','Sửa thành công !');
    }

    public function getXoa($id){
    	$bill = Bill::find($id);
    	$bill->delete();

    	return redirect('admin/hoadon/danhsach')->with('thongbao','Xóa thành công !');
    }

    public function getDanhsachchitiet()
    {
        $danhsachchitiet = BillDetail::all();
        $sanpham = Product::all();
        return view('admin/hoadon/danhsachchitiethoadon',['danhsachchitiet'=>$danhsachchitiet,'sanpham'=>$sanpham]);
    }

    public function getXoachitiet($id){
        $danhsachchitiet = BillDetail::find($id);
        $danhsachchitiet->delete();

        return redirect('admin/hoadon/danhsachchitiethoadon')->with('thongbao','Xóa thành công !');
    }

    public function getDanhsachkhach()
    {
        $khach = Customer::all();
        return view('admin/hoadon/danhsachkhach',['khach'=>$khach]);
    }

    public function getXoakhach($id){
        $khach = Customer::find($id);
        $khach->delete();

        return redirect('admin/hoadon/danhsachkhach')->with('thongbao','Xóa thành công !');
    }
}
