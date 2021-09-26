<?php

namespace App\Http\Controllers;

use App\Models\BItem;
use App\Models\Business;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function home(){
        $data = Business::all();
        $bitm = BItem::all();
        return view("admin.home",["data"=>$data,"bitm"=>$bitm]);
    }
    public function details(){
        if(Auth::check()){
            $data = ["data"=>Auth::user()->id];
            $user_detail = BItem::where("user_id",$data)->get();
            return view("admin.details",$data,["user_detail"=>$user_detail]);
        }
        else{
            $link = route("login");
            session()->flash("msg","login first <a href='$link'>click here<a/>");
        }
        return view("admin.details");
    }
    public function deletedetail($id){
        BItem::find($id)->delete();
        return redirect()->back();
    }

    
    public function update(Request $re){
        $re->validate([
            "b_name"=>"required|unique:b_items",
        ]);
        $filename = time() ."." . $re->image->extension();
        $re->image->move(public_path('image'),$filename);

        $req = BItem::find($re->id);
        $req->contact = $re->input('contact');
        $req->business_id = $re->input('business_id');
        $req->slugs = Str::slug($re->b_name,"-");
        $req->address = $re->input('address');
        $req->city = $re->input('city');
        $req->state = $re->input('state');
        $req->b_name = $re->input('b_name');
        $req->open_time = $re->input('open_time');
        $req->close_time = $re->input('close_time');
        $req->add_link = $re->input('add_link');
        $req->type_of_service = $re->input('type_of_service');
        $req->description = $re->input('description');
        $req->image = $filename;
        $req->save();
        return redirect()->back();
    } 
    public function edit($id){
        $data = BItem::find($id);
        $bus = Business::all();
         return view("admin.edit",["data"=>$data,'bus'=>$bus]);
     }
   
    public function filter($urls){
        $business = Business::where('urls',$urls)->first();
       
        $data = BItem::where('business_id',$business->id)->get();
        
        return view("user.filter",["data"=>$data]);
    }
  
    public function single($slugs){
        
        $item = BItem::where('slugs',$slugs)->first();
        $re = Review::where('b_id',$item->id)->get();
        return view("user.single",["item"=>$item,"re"=>$re,"pro"=>BItem::where("id","!=",$item->id)->where("Business_id",$item->business_id)->get()]);
      
        // return view("user.single",["item"=>BItem::where('slugs',$slugs),"re"=>$re,"pro"=>BItem::where("id","!=",$item_id)->where("Business_id",$busId)->get()]);
    }

   

    public function businessInsert(Request $re){
        $user =User::all();
        $bus =Business::all();
       
        if(Auth::check()){
           
        if($re->isMethod('post')){
            $re->validate([
                "user_id"=>"required",
                "b_name"=>"required|unique:b_items",
                "business_id"=>"required",
                "city"=>"required",
                "state"=>"required",
                "address"=>"required",
                "contact"=>"required",
                "type_of_service"=>"required",
                "description"=>"required",
    
             ]);
        $filename = time() ."." . $re->image->extension();
        $re->image->move(public_path('image'),$filename);

        $req = new BItem();
        $req->user_id = $re->input('user_id');
        $req->business_id = $re->input('business_id');
        $req->contact = $re->input('contact');
        $req->slugs = Str::slug($re->b_name,"-");
        $req->address = $re->input('address');
        $req->city = $re->input('city');
        $req->state = $re->input('state');
        $req->b_name = $re->input('b_name');
        $req->open_time = $re->input('open_time');
        $req->close_time = $re->input('close_time');
        $req->add_link = $re->input('add_link');
        $req->type_of_service = $re->input('type_of_service');
        $req->description = $re->input('description');
        $req->image = $filename;
        $req->save();
        }
    }
    else{
        $link = route("login");
        session()->flash("msg","login first <a href='$link'>click here<a/>");
    }
        return view("admin.businessInsert",['user'=>$user,'bus'=>$bus]);
    }
    public function insert(Request $re){
        if($re->isMethod('post')){
            $re->validate([
                "bname"=>"required|unique:businesses",
                "description"=>"required",
    
             ]);
            $filename = time() ."." . $re->img->extension();
            $re->img->move(public_path('img'),$filename);
    
            $req = new Business();
            $req->bname = $re->input('bname');
            $req->urls = Str::slug($re->bname,"-");
            $req->description = $re->input('description');
            $req->img = $filename;
            $req->save();
            return redirect()->back();
            
    }
}
    public function review(Request $re){
        if($re->isMethod('post')){
            $req = new Review();
            $req->name = $re->input('name');
            $req->comment = $re->input('comment');
            $req->b_id = $re->input('b_id');
            $req->rating = $re->input('rating');
            $req->save();
            return redirect()->back();
    }
  
}

public function vote($id){
  
         $vo = BItem::find($id);
         $vo->vote++;
         $vo->save();
    
         
     
 return redirect()->back();
}
public function unlike($id){
         $vo = BItem::find($id);
         $vo->vote--;
         $vo->save();
         return redirect()->back();
     }
}
