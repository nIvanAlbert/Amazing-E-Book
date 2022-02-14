<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\EBook;
use App\Models\Order;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('userCheck')->except('langSet');
        $this->middleware('adminCheck')->only('accMaintenance','editRole','updateRole','deleteAcc');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $books = EBook::all();
        $data = [
            'books' => $books
        ];
        return view('home',$data);
    }

    public function profile(Request $request)
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        if($request->email == Auth::user()->email){
            $rules = Validator::make($request->all(), [
                'first_name' => ['required', 'string', 'max:25','alpha'],
                'middle_name' => ['nullable','string', 'max:25','alpha'],
                'last_name' => ['required', 'string', 'max:25','alpha'],
                'gender_id'=> ['required'],
                'password' => ['required', Password::min(8)
                                                ->numbers()],
                'profile_img' => ['image']
            ]);
        }else{
            $rules = Validator::make($request->all(), [
                'first_name' => ['required', 'string', 'max:25','alpha'],
                'middle_name' => ['string', 'max:25','alpha'],
                'last_name' => ['required', 'string', 'max:25','alpha'],
                'gender_id'=> ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts'],
                'password' => ['required', Password::min(8)
                                                ->numbers()],
                'profile_img' => ['image']
            ]);
        }
        $rules->validate();
        $acc = Account::where('id',Auth::user()->id)->first();
        $acc->first_name = $request->first_name;
        if($request->middle_name == null){
            $acc->middle_name = null;
        }
        else{
            $acc->middle_name = $request->middle_name;
        }
        $acc->last_name = $request->last_name;
        $acc->gender_id = $request->gender_id;
        $acc->email = $request->email;
        $acc->password = Hash::make($request->password);
        if($request->profile_img){
            $link = $request->file('profile_img')->getClientOriginalName();
            Storage::putFileAs("public/",$request->file('profile_img'),$link);
            $acc->display_picture_link="storage/$link";
        }
        $acc->save();
        return redirect()->route('profile')->with('status','Profile Update Sucess');
    }

    
    public function detail(Request $request){
        $id = $request->id;
        $book = EBook::where('id',$id)->first();
        $data=[
            'book'=>$book,
        ];
        return view('detail',$data);
    }

    public function rent(Request $request){
        $rent = new Order();
        $rent->account_id = Auth::user()->id;
        $rent->isSubmitted = 0;
        $rent->ebook_id = $request->id;
        $rent->save();
        return redirect()->route('home');
    }

    public function rentCart(){
        $carts = Order::where('account_id',Auth::user()->id)->where('isSubmitted',0)->get();
        $histories = Order::where('account_id',Auth::user()->id)->where('isSubmitted',1)->get();

        $data = [
            'carts'=> $carts,
            'histories' => $histories
        ];
        return view('cart',$data);
    }
    public function deleteCart(Request $request){
        $cart = Order::where('id',$request->id);
        $cart->delete();
        return redirect()->route('cart');
    }
    public function submitRent(){
        $carts = Order::where('account_id',Auth::user()->id)->where('isSubmitted',0)->get();
        foreach ($carts as $cart) {
            $cart->isSubmitted=1;
            $cart->save();
        }
        return redirect()->route('cart')->with('status','Book Rent Submisiion Sucess');
    }

    public function accMaintenance(){
        $accounts= Account::all();
        
        $data = [
            'accounts'=>$accounts
        ];
        return view('acc-maintenance',$data);
    }
    public function editRole(Request $request){
        $acc = Account::where('id',$request->id)->first();
        $data =[
            'acc'=>$acc
        ];
        return view('updateRole',$data);
    }

    public function updateRole(Request $request){
        $acc = Account::where('id',$request->id)->first();
        $acc->role_id = $request->role_id;
        $acc->modified_by = Auth::user()->first_name.' '.Auth::user()->middle_name.' '.Auth::user()->last_name;
        $acc->save();
        return redirect()->route('accMaintenance')->with('status','Role Update Sucess');
    }

    public function deleteAcc(Request $request){
        $acc = Account::where('id',$request->id)->first();
        $acc->delete();
        return redirect()->route('accMaintenance')->with('status','Account Deletion Sucess');
    }
}
