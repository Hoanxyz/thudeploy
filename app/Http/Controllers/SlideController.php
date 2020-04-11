<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Slide;

class SlideController extends Controller
{
    public function getDanhsach()
    {
    	$slide = Slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem()
    {
    	return view('admin.slide.them');
    }

    public function postThem(Request $req)
    {
    	$slide = new Slide;
    	if($req->has('link'))
    		$slide->link = $req->link;

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/slide/them')->with('thongbao','Ảnh sai định dạng!');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while (file_exists("source/image/slide".$Hinh)) {
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("source/image/slide",$Hinh);
            $slide->image = $Hinh;
        }
        else
        {
            $slide->image = "Không có hình";
        }

    	$slide->save();

    	return redirect('admin/slide/them')->with('thongbao','Thêm thành công !');
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }

    public function postSua(Request $req, $id)
    {
        $slide = Slide::find($id);
        if($req->has('link'))
            $slide->link = $req->link;

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                {
                    return redirect('admin/slide/sua')->with('thongbao','Ảnh sai định dạng!');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while (file_exists("source/image/slide".$Hinh)) {
                $Hinh = Str::random(4)."_".$name;
            }
            unlink("source/image/slide/".$slide->image);
            $file->move("source/image/slide",$Hinh);
            $slide->image = $Hinh;
        }
       
        $slide->save();

        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công !');
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        File::delete('source/image/slide/'.$slide->image);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công !');
    }

}
