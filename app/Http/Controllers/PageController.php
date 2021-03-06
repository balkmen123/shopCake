<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Slide;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\ProductType;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide= Slide::all();
        $new_product= Product::where("new",1)->paginate(4);
        $sanpham_khuyenmai=Product::where("promotion_price",'<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }
    public function getLoaiSP($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac=Product::where('id_type','<>',$type)->paginate(3);
        $loai= ProductType::all();
        $loai_sp=ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function chitietSP(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    public function lienhe(){
        return view('page.lienhe');
    }
    public function gioithieu(){
        return view('page.gioithieu');
    }
    public function getAddtoCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart ->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        
        return redirect()->back();
    }
    public function getCheckout(){
        
        return view('page.dat_hang');
    }
    
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name=$req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->adress;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();
        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note=$req->notes;
        $bill->save();
        foreach($cart->items as $key=>$value){
            $bill_detail= new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=$value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thong bao','dat hang thanh cong');
       
    }

}
