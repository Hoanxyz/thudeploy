<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\ProductType;

class LoaiSpController extends Controller
{
    //
    public function getDanhSach()
    {
    	$loai = ProductType::all();
    	return view('admin.loaisp.danhsach', ['loai'=>$loai]);
    }

    public function getThem()
    {
    	return view('admin.loaisp.them');
    }
    public function postThem(Request $req)
    {
    	$this->validate($req,
    	[
    		'name'=>'required|min:3|max:100|unique:type_products,name',
    		'description'=>'required'
    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên của loại sản phẩm',
    		'name.min'=>'Tên của loại sản phẩm chứa ít nhất 3 ký tự',
            'name.max'=>'Tên của loại sản phẩm chứa nhiều nhất 100 ký tự',
            'name.unique'=>'Tên loại sản phẩm đã tồn tại',

            'description.required'=>'Bạn chưa nhập mô tả của loại sản phẩm'
    	]);

    	$loai = new ProductType;
    	$loai->name = $req->name;
    	$loai->description = $req->description;

        if($req->hasFile('image'))
        {
            $filesp = $req->file('image');
            $duoisp = $filesp->getClientOriginalExtension();
            if($duoisp != 'jpg' && $duoisp != 'png' && $duoisp != 'jpeg')
                {
                    return redirect('admin/loaisp/them')->with('thongbao','Ảnh sai định dạng!');
            }
            $namesp = $filesp->getClientOriginalName();
            $Hinhsp = Str::random(4)."_".$namesp;
            while (file_exists("source/image/type_product".$Hinhsp)) {
                $Hinhsp = Str::random(4)."_".$namesp;
            }
            $filesp->move("source/image/type_product",$Hinhsp);
            $loai->image = $Hinhsp;
        }
        else
        {
            $loai->image = "Không có hình";
        }

    	$loai->save();

    	return redirect('admin/loaisp/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id)
    {
    	$loai = ProductType::find($id);
    	return view('admin.loaisp.sua',['loai'=>$loai]);
    }
    public function postSua(Request $req, $id)
    {
    	$loai = ProductType::find($id);

    	$this->validate($req,
    	[
    		'name'=>'required|min:3|unique:type_products,name,'.$id,
    		'description'=>'required'
    	],
    	[
    		'name.required'=>'Bạn chưa nhập tên của loại sản phẩm',
    		'name.unique'=>'Tên loại sản phẩm đã tồn tại',
    		'name.min'=>'Tên của loại sản phẩm chứa ít nhất 3 ký tự',
            // 'name.max'=>'Tên của loại sản phẩm chứa nhiều nhất 100 ký tự',

            'description.required'=>'Bạn chưa nhập mô tả của loại sản phẩm'
    	]);

    	$loai->name = $req->name;
    	$loai->description = $req->description;

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/loaisp/sua')->with('thongbao','Ảnh sai định dạng!');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while (file_exists("source/image/type_product".$Hinh)) {
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("source/image/type_product",$Hinh);
            unlink("source/image/type_product/".$loai->image);
            $loai->image = $Hinh;
        }
        
    	$loai->save();

    	return redirect('admin/loaisp/sua/'.$id)->with('thongbao','Sửa thành công !');
    }

    public function getXoa($id){
    	$loai = ProductType::find($id);
        File::delete('source/image/type_product/'.$loai->image);
    	$loai->delete();

    	return redirect('admin/loaisp/danhsach')->with('thongbao','Xóa thành công !');
    }
}
