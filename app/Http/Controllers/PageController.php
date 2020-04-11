<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getIndex()
    {	
    	$slide = Slide::all();
    	$new_product = Product::where('new',1)->paginate(4, ['*'], 'pag');
    	$sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8); 
    	return view('pages.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type)
    {
    	$sp_theoloai = Product::where('id_type',$type)->get();
    	$sp_khac = Product::where('id_type','<>','$type')->paginate(3);
    	$loai = ProductType::all();
    	$loai_sp = ProductType::where('id',$type)->first();
    	return view('pages.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

        public function getChitiet(Request $req)
    {
    	$sanpham = Product::where('id',$req->id)->first();
    	$sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
        $sp_moi = Product::where('new',1)->limit(5)->get();
    	return view('pages.chitiet_sanpham', compact('sanpham','sp_tuongtu','sp_moi'));
    }

     public function getLienhe()
    {
    	return view('pages.lienhe');
    }

     public function getGioithieu()
    {
    	return view('pages.gioithieu');
    }

    public function getAddtoCart(Request $req, $id)
    {
        $product = Product::find($id);
        if($product->status == 0)
        {
            $oldCart = Session('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->add($product, $id);
            $req->Session()->put('cart', $cart);
            return redirect()->back();
        }
        else
        {
            return redirect()->back()->with('thongbao','Sản phẩm hiện đang hết hàng !');
        }
        
    }

    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    // public function getCart()
    // {
    //     return view('pages.giohang');
    // }

    // public function postCart(Request $req)
    // {
    //     if(Session::has('cart'))
    //     {
    //         $cart = Session::get('cart');

    //         $customer = new Customer;
    //         $customer->name = $req->name;
    //         $customer->gender = $req->gender;
    //         $customer->email = $req->email;
    //         $customer->address = $req->address;
    //         $customer->phone_number = $req->phone;
    //         $customer->note = $req->note;
    //         $customer->save();

    //         $bill = new Bill;
    //         $bill->id_customer = $customer->id;
    //         $bill->date_order = date('Y-m-d');
    //         $bill->total = $cart->totalPrice;
    //         $bill->payment = $req->payment_method;
    //         $bill->note = $req->note;
    //         $bill->save();

    //         foreach($cart->items as $key => $value)
    //         {
    //             $bill_detail = new BillDetail;
    //             $bill_detail->id_bill = $bill->id;
    //             $bill_detail->id_product = $key;
    //             $bill_detail->quantity = $value['qty'];
    //             $bill_detail->unit_price = ($value['price']/$value['qty']);
    //             $bill_detail->save();
    //         }

    //         Session::forget('cart');

    //         return redirect()->back()->with('thongbao','Đặt hàng thành công !');
    //     }
    //     else
    //     {
    //         return redirect()->back()->with('thongbao','Bạn chưa chọn mua sản phẩm nào !');
    //     }

    public function getCheckout()
    {
        return view('pages.dathang');
    }

    public function postCheckout(Request $req)
    {
        if(Session::has('cart'))
        {
            $cart = Session::get('cart');

            $customer = new Customer;
            $customer->name = $req->name;
            $customer->gender = $req->gender;
            $customer->email = $req->email;
            $customer->address = $req->address;
            $customer->phone_number = $req->phone;
            $customer->note = $req->note;
            $customer->save();

            $bill = new Bill;
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $cart->totalPrice;
            $bill->payment = $req->payment_method;
            $bill->note = $req->note;
            $bill->save();

            foreach($cart->items as $key => $value)
            {
                $bill_detail = new BillDetail;
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->unit_price = ($value['price']/$value['qty']);
                $bill_detail->save();
            }

            Session::forget('cart');

            return redirect()->back()->with('thongbao','Đặt hàng thành công !');
        }
        else
        {
            return redirect()->back()->with('thongbao','Bạn chưa chọn mua sản phẩm nào !');
        }
        
    }

    public function getLogin()
    {
        return view('pages.dangnhap');
    }

    public function postLogin(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Email sai định dạng',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu chứa ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu chứa nhiều nhất 20 ký tự',
            ]);

            $credentials = array('email'=>$req->email, 'password'=>$req->password);
            if(Auth::attempt($credentials))
            {
                return redirect('index');
            }
            else
            {
                return redirect()->back()->with(['flag'=>'success','message'=>'Bạn nhập sai tên hoặc mật khẩu !']);
            }

    }

    public function getSignin()
    {
        return view('pages.dangki');
    }

    public function postSignin(Request $req)
    {
         $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'fullname.required'=>'Bạn chưa nhập tên',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Email sai định dạng',
                'email.unique'=>'Email đã được sử dụng',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu chứa ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu chứa nhiều nhất 20 ký tự',
                're_password.required'=>'Bạn chưa nhập lại mật khẩu',
                're_password.same'=>'Không giống mật khẩu đã nhập'
            ]);

        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password); //mã hóa password
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Đăng kí thành công');
    }

    public function postLogout()
    {
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('name','like','%'.$req->key.'%')
                            ->orwhere('unit_price',$req->key)
                            ->paginate(8);
        return view('pages.search', compact('product'));
    }
}
