<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Product;
use App\ProductType;

class SanPhamController extends Controller
{
    //
    public function getDanhsach()
    {
    	$sanpham = Product::orderBy('id','DESC')->get();
        // $sanpham = Product::with(type_products())->get();
        $loaisp = ProductType::all();
    	return view('admin.sanpham.danhsach', ['sanpham'=>$sanpham, 'loaisp'=>$loaisp]);
    }

    public function getDanhsachhet()
    {
        $sanpham = Product::orderBy('id','DESC')->get();
        $loaisp = ProductType::all();
        return view('admin.sanpham.danhsachhet', ['sanpham'=>$sanpham, 'loaisp'=>$loaisp]);
    }

    public function getDanhsachngungban()
    {
        $sanpham = Product::orderBy('id','DESC')->get();
        $loaisp = ProductType::all();
        return view('admin.sanpham.danhsachngungban', ['sanpham'=>$sanpham, 'loaisp'=>$loaisp]);
    }

    public function getThem()
    {
        $loaisp = ProductType::all();
    	return view('admin.sanpham.them',['loaisp'=>$loaisp]);
    }
    public function postThem(Request $req)
    {
    	$this->validate($req,
    	[
            'ProductType'=>'required',           
    		'name'=>'required|min:3|max:100|unique:products,name',
    		'description'=>'required',
            'unit_price'=>'required',
            'promotion_price'=>'required',
            // "image"=>'required',
            'unit'=>'required'
    	],
    	[
            'ProductType.required'=>'Bạn chưa chọn loại cho sản phẩm',

    		'name.required'=>'Bạn chưa nhập tên của sản phẩm',
    		'name.min'=>'Tên của sản phẩm chứa ít nhất 3 ký tự',
            'name.max'=>'Tên của sản phẩm chứa nhiều nhất 100 ký tự',
            'name.unique'=>'Tên sản phẩm đã tồn tại',

            'description.required'=>'Bạn chưa nhập mô tả của sản phẩm',

            'unit_price.required'=>'Bạn chưa nhập giá của sản phẩm',

            'promotion_price.required'=>'Bạn chưa nhập giá khuyến mại của sản phẩm',

            // 'image.required'=>'Bạn chưa chọn ảnh cho sản phẩm',

            'unit.required'=>'Bạn chưa nhập đơn vị của sản phẩm'
    	]);

    	$sanpham = new Product;
        $sanpham->id_type = $req->ProductType;
    	$sanpham->name = $req->name;
    	$sanpham->description = $req->description;
        $sanpham->status = $req->status;
    	$sanpham->unit_price = $req ->unit_price;
        $sanpham->promotion_price = $req ->promotion_price;
        $sanpham->new = $req ->new;
        $sanpham->unit = $req ->unit;

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/sanpham/them')->with('thongbao','Ảnh sai định dạng!');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while (file_exists("source/image/product".$Hinh)) {
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("source/image/product",$Hinh);
            $sanpham->image = $Hinh;
        }
        else
        {
            $sanpham->image = "Không có hình";
        }

    	$sanpham->save();

    	return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công !');
    }

    public function getSua($id)
    {
    	$sanpham = Product::find($id);
        $loaisp = ProductType::all();
    	return view('admin.sanpham.sua',['sanpham'=>$sanpham,'loaisp'=>$loaisp]);
    }
    public function postSua(Request $req, $id)
    {
    	$sanpham = Product::find($id);

    	$this->validate($req,
        [
            'ProductType'=>'required', 
            'name'=>'required|min:3|unique:products,name,'.$id,
            'description'=>'required',
            'unit_price'=>'required',
            'promotion_price'=>'required',
            // "image"=>'required',
            'unit'=>'required'
        ],
        [
            'ProductType.required'=>'Bạn chưa chọn loại cho sản phẩm',

            'name.required'=>'Bạn chưa nhập tên của sản phẩm',
            'name.min'=>'Tên của sản phẩm chứa ít nhất 3 ký tự',
            // 'name.max'=>'Tên của sản phẩm chứa nhiều nhất 100 ký tự',
            'name.unique'=>'Tên sản phẩm đã tồn tại',

            'description.required'=>'Bạn chưa nhập mô tả của sản phẩm',

            'unit_price.required'=>'Bạn chưa nhập giá của sản phẩm',

            'promotion_price.required'=>'Bạn chưa nhập giá khuyến mại của sản phẩm',

            // 'image.required'=>'Bạn chưa chọn ảnh cho sản phẩm',

            'unit.required'=>'Bạn chưa nhập đơn vị của sản phẩm'
        ]);

        $sanpham->id_type = $req->ProductType;
        $sanpham->name = $req->name;
        $sanpham->description = $req->description;
        $sanpham->status = $req->status;
        $sanpham->unit_price = $req ->unit_price;
        $sanpham->promotion_price = $req ->promotion_price;
        $sanpham->unit = $req ->unit;
        $sanpham->new = $req ->new;

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/sanpham/sua')->with('thongbao','Ảnh sai định dạng!');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while (file_exists("source/image/product".$Hinh)) {
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("source/image/product",$Hinh);
            unlink("source/image/product/".$sanpham->image);
            $sanpham->image = $Hinh;
        }
        $sanpham->save();

        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công !');
    }

    public function getXoa($id){
        $sanpham = Product::find($id);
        File::delete('source/image/product/'.$sanpham->image);
        $sanpham->delete();
        return redirect('admin/sanpham/danhsach/')->with('thongbao','Xóa thành công !');
    }
}
