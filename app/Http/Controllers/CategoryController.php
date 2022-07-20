<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $result=Category::all();

        return view('admin/category',compact('result'));
    }

    
    public function manage_category(Request $request,$id='')
    {
        if($id>0){
            $arr=Category::where(['id'=>$id])->get();

            $result['product_name']= $arr['0']->product_name;
            $result['product_price']= $arr['0']->product_price;
            if($request->hasFile('product_image'))
            {
                $file = $request->file('product_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/products/',$filename);
                $result->product_image=$filename;
            }
                $result['id']= $arr['0']->id;
            }else{
                $result['product_name']= '';
                $result['product_price']= '';
                $result['product_image']='';
                $result['id']=0;
            }
        return view('admin/manage_category',$result);
    }
    

    public function manage_category_process(Request $request)
    {
        $request->validate([
            'product_name'=>'required|unique:categories,product_name,'.$request->post('id'),
            'product_price'=>'required',
            'product_image'=>'required',
        ]);
        if($request->post('id')>0){
            
        }else{
            $model=new Category();
            if($request->hasFile('product_image'))
            {
                $file = $request->file('product_image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/products/',$filename);
                $model->product_image=$filename;
            }
            $msg="Product inserted";
        }
        $model->product_name=$request->post('product_name');
        $model->product_price=$request->post('product_price');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }

    public function delete(Request $request,$id){
        $model=Category::find($id);
        $destination='uploads/products/'.$model->product_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $model->delete();
        $request->session()->flash('message','Product deleted');
        return redirect('admin/category');
    }


    public function edit($id)
    {
        $result= Category::find($id);
        return view('admin.category_update',compact('result'));
    }

    public function update(Request $request, $id)
    {
        $result = Category::find($id);
        $result->product_name=$request->input('product_name');
        $result->product_price=$request->input('product_price');
        if($request->hasFile('product_image'))
        {
            $destination = 'uploads/products/'.$result->product_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('product_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/products/',$filename);
            $result->product_image=$filename;
        }
        $result->save();

        return redirect('admin/category');
    }
}
