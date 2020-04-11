<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function getDanhsach()
    {
    	$user = User::where('level','<>',0)->get();
    	return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getTaikhoankhach()
    {
        $user = User::where('level',0)->get();
        return view('admin.user.taikhoankhach',['user'=>$user]);
    }

    public function getThem()
    {
    	return view('admin.user.them');
    }

    public function postThem(Request $req)
    {
    	 $this->validate($req,
            [
                'fullname'=>'required',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'fullname.required'=>'Bạn chưa nhập tên',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Email sai định dạng',
                'email.unique'=>'Email đã được sử dụng',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu chứa ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu chứa nhiều nhất 20 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Không giống mật khẩu đã nhập'
            ]);

            $user = new User;
            $user->full_name = $req->fullname;
            $user->email = $req->email;
            $user->password = Hash::make($req->password); //mã hóa password
            $user->level = $req->level;
            $user->phone = $req->phone;
            $user->address = $req->address;
            $user->save();

    	return redirect('admin/user/them')->with('thongbao','Thêm thành công !');
    }

    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $req, $id)
    {
        $this->validate($req,
            [
                'fullname'=>'required',
            ],
            [
                'fullname.required'=>'Bạn chưa nhập tên'
            ]);

            $user = User::find($id);
            $user->full_name = $req->fullname;
            $user->level = $req->level;
            $user->phone = $req->phone;
            $user->address = $req->address;

            if($req->changePassword == "on")
                {
                    $this->validate($req,
                [
                    'password'=>'required|min:6|max:20',
                    'passwordAgain'=>'required|same:password'
                ],
                [
                    'password.required'=>'Bạn chưa nhập mật khẩu',
                    'password.min'=>'Mật khẩu chứa ít nhất 6 ký tự',
                    'password.max'=>'Mật khẩu chứa nhiều nhất 20 ký tự',
                    'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same'=>'Không giống mật khẩu đã nhập'
                ]);
                    $user->password = Hash::make($req->password); //mã hóa password
                }

            $user->save();

        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công !');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công !');
    }

    public function getDangnhapAdmin()
    {
        return view('admin.login');
    }

    public function postDangnhapAdmin(Request $req)
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
        if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password]))
        {
            return redirect('admin/loaisp/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công !');
        }
    }

    public function getDangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

}
