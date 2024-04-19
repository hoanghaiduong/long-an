<?php

namespace App\Http\Controllers\Seller;

use App\CPU\ImageManager;
use App\Http\Controllers\Controller;
use App\Model\DeliveryMan;
use App\Model\DeliverymanWallet;
use App\Model\Order;
use App\Model\OrderStatusHistory;
use App\Model\Review;
use App\Traits\CommonTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function App\CPU\translate;
use App\CPU\Helpers;

class DeliveryManController extends Controller
{
    use CommonTrait;

    private $shippingMethod;
    public function __construct()
    {
        $this->shippingMethod = Helpers::get_business_settings('shipping_method');
    }

    public function index()
    {
        if($this->shippingMethod=='inhouse_shipping') {
            Toastr::warning(translate('access_denied!!'));
            return redirect('/');
        }
        $telephone_codes = TELEPHONE_CODES;

        return view('seller-views.delivery-man.index', compact('telephone_codes'));
    }

    public function list(Request $request)
    {
        $shippingMethod=Helpers::get_business_settings('shipping_method');
        if($shippingMethod=='inhouse_shipping')
        {
            Toastr::warning(translate('access_denied!!'));
            return redirect()->route('seller.auth.login');
        }

        $shippingMethod=Helpers::get_business_settings('shipping_method');
        if($shippingMethod=='inhouse_shipping')
        {
            Toastr::warning(translate('access_denied!!'));
            return redirect()->route('seller.auth.login');
        }
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $delivery_men = DeliveryMan::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('f_name', 'like', "%{$value}%")
                        ->orWhere('l_name', 'like', "%{$value}%")
                        ->orWhere('phone', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $delivery_men = new DeliveryMan();
        }

        $delivery_men = $delivery_men->withCount(['orders'=> function($q){
                            $q->where(['seller_is'=>'seller']);
                        }])
                        ->latest()
                        ->where(['seller_id' => auth('seller')->id()])
                        ->paginate(25)
                        ->appends($query_param);
        return view('seller-views.delivery-man.list', compact('delivery_men', 'search'));
    }

    public function search(Request $request)
    {
        $key = explode(' ', $request['search']);
        $delivery_men = DeliveryMan::where(['seller_id' => auth('seller')->id()])->where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('f_name', 'like', "%{$value}%")
                    ->orWhere('l_name', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%")
                    ->orWhere('phone', 'like', "%{$value}%")
                    ->orWhere('identity_number', 'like', "%{$value}%");
            }
        })->get();
        return response()->json([
            'view' => view('seller-views.delivery-man.partials._table', compact('delivery_men'))->render()
        ]);
    }

    public function preview($id)
    {
        $dm = DeliveryMan::with(['reviews'])->where(['id' => $id])->first();
        return view('seller-views.delivery-man.view', compact('dm'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:delivery_men,email',
            'identity_image.0' => 'required|mimes:jpg,jpeg,png',
            'image' => 'required|mimes:jpg,jpeg,png',
            'country_code' => 'required',
            'password' => 'required|same:confirm_password|min:8'

        ], [
            'f_name.required' => 'First name is required!',
            'l_name.required' => 'Last name is required!',
            'identity_image.0.required' => 'The identity Image is required!'
        ]);

        $phone_combo_exists =  DeliveryMan::where(['phone'=> $request->phone, 'country_code'=> $request->country_code])->exists();
        if ($phone_combo_exists) {
            Toastr::error(translate('This_phone_number_is_already_taken'));
            return back();
        }


        $id_img_names = [];
        if (!empty($request->file('identity_image'))) {
            foreach ($request->identity_image as $img) {
                array_push($id_img_names, ImageManager::upload('delivery-man/', 'webp', $img));
            }
            $identity_image = json_encode($id_img_names);
        } else {
            $identity_image = json_encode([]);
        }

        $dm                     = new DeliveryMan();
        $dm->seller_id          = auth('seller')->id();
        $dm->f_name             = $request->f_name;
        $dm->l_name             = $request->l_name;
        $dm->address            = $request->address;
        $dm->email              = $request->email;
        $dm->country_code       = $request->country_code;
        $dm->phone              = $request->phone;
        $dm->identity_number    = $request->identity_number;
        $dm->identity_type      = $request->identity_type;
        $dm->identity_image     = $identity_image;
        $dm->image              = ImageManager::upload('delivery-man/', 'webp', $request->file('image'));
        $dm->password           = bcrypt($request->password);
        $dm->save();

        Toastr::success(translate('Deliveryman_added_successfully'));
        return redirect('seller/delivery-man/list');
    }

    public function edit($id)
    {
        if($this->shippingMethod=='inhouse_shipping') {
            Toastr::warning(translate('access_denied!!'));
            return redirect()->route('seller.auth.login');
        }
        $telephone_codes = TELEPHONE_CODES;
        $delivery_man = DeliveryMan::where(['seller_id' => auth('seller')->id(), 'id' => $id])->first();
        return view('seller-views.delivery-man.edit', compact('delivery_man', 'telephone_codes'));
    }

    public function status(Request $request)
    {
        $delivery_man = DeliveryMan::where(['seller_id'=>auth('seller')->id()])->find($request->id);
        $delivery_man->is_active = $request->status;
        $delivery_man->save();
        return response()->json([], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:delivery_men,email,' . $id,
            'phone' => 'required',
            'country_code' => 'required'
        ], [
            'f_name.required' => 'First name is required!',
            'l_name.required' => 'Last name is required!'
        ]);

        if ($request->password) {
            $request->validate([
                'password' => 'required|min:6|same:confirm_password'
            ]);
        }

        $delivery_man = DeliveryMan::where(['id' => $id, 'seller_id' => auth('seller')->id()])->first();

        $phone_combo_exists =  DeliveryMan::where(['phone'=> $request->phone, 'country_code'=> $request->country_code])->first();

        if (isset($phone_combo_exists) && $phone_combo_exists->id != $delivery_man->id) {
            Toastr::error(translate('This_phone_number_is_already_taken'));
            return back();
        }

        if (isset($delivery_man) && $request['email'] != $delivery_man['email']) {
            $request->validate([
                'email' => 'required|unique:delivery_men',
            ]);
        }

        if (!empty($request->file('identity_image'))) {
            foreach (json_decode($delivery_man['identity_image'], true) as $img) {
                if (Storage::disk('public')->exists('delivery-man/' . $img)) {
                    Storage::disk('public')->delete('delivery-man/' . $img);
                }
            }
            $img_keeper = [];
            foreach ($request->identity_image as $img) {
                array_push($img_keeper, ImageManager::upload('delivery-man/', 'webp', $img));
            }
            $identity_image = json_encode($img_keeper);
        } else {
            $identity_image = $delivery_man['identity_image'];
        }
        $delivery_man->seller_id        = auth('seller')->id();
        $delivery_man->f_name           = $request->f_name;
        $delivery_man->l_name           = $request->l_name;
        $delivery_man->address          = $request->address;
        $delivery_man->email            = $request->email;
        $delivery_man->country_code     = $request->country_code;
        $delivery_man->phone            = $request->phone;
        $delivery_man->identity_number  = $request->identity_number;
        $delivery_man->identity_type    = $request->identity_type;
        $delivery_man->identity_image   = $identity_image;
        $delivery_man->image            = $request->has('image') ? ImageManager::update('delivery-man/', $delivery_man->image, 'webp', $request->file('image')) : $delivery_man->image;
        $delivery_man->password         = strlen($request->password) > 1 ? bcrypt($request->password) : $delivery_man['password'];
        $delivery_man->save();

        Toastr::success(translate('Deliveryman_updated_successfully'));

        return redirect('seller/delivery-man/list');
    }

    public function delete(Request $request,$id)
    {
        if($this->shippingMethod=='inhouse_shipping') {
            Toastr::warning(translate('access_denied!!'));
            return redirect()->route('seller.auth.login');
        }
        $delivery_man = DeliveryMan::where(['seller_id' => auth('seller')->id(), 'id' => $id])->first();


        if (Storage::disk('public')->exists('delivery-man/' . $delivery_man['image'])) {
            Storage::disk('public')->delete('delivery-man/' . $delivery_man['image']);
        }

        foreach (json_decode($delivery_man['identity_image'], true) as $img) {
            if (Storage::disk('public')->exists('delivery-man/' . $img)) {
                Storage::disk('public')->delete('delivery-man/' . $img);
            }
        }

        $delivery_man->delete();
        Toastr::success(translate('Delivery-man removed!'));
        return back();
    }

    public function earning_statement(Request $request, $id)
    {
        if($this->shippingMethod=='inhouse_shipping') {
            Toastr::warning(translate('access_denied!!'));
            return redirect()->route('seller.auth.login');
        }
        $delivery_man = DeliveryMan::where(['seller_id' => auth('seller')->id()])->with('wallet')->find($id);
        if(!$delivery_man){
            Toastr::warning(translate('invalid_deliveryman!'));
            return redirect('seller/delivery-man/list');
        }

        if (isset($delivery_man->wallet)) {
            $withdrawbale_balance = CommonTrait::delivery_man_withdrawable_balance($id);
        } else {
            $withdrawbale_balance = null;
        }

        return view('seller-views.delivery-man.earning-statement.overview', compact( 'delivery_man', 'withdrawbale_balance'));
    }


    public function order_history_log(Request $request, $id)
    {
        if($this->shippingMethod=='inhouse_shipping') {
            Toastr::warning(translate('access_denied!!'));
            return redirect('/');
        }

        $search = $request->search;
        $delivery_man = DeliveryMan::with('wallet')->find($id);
        $orders = Order::select('id', 'deliveryman_charge', 'order_status', 'delivery_man_id')
            ->where(['delivery_man_id' => $id])
            ->whereHas('delivery_man', function($query){
                $query->where('seller_id',auth('seller')->id());
            })
            ->when($search, function ($q) use ($search) {
                $q->where('id', 'like', "%$search%");
            })
            ->latest()
            ->paginate(Helpers::pagination_limit())
            ->appends(['search'=>$request['search']]);

        return view('seller-views.delivery-man.earning-statement.active-log', compact( 'delivery_man', 'orders', 'search'));
    }

    public function order_wise_earning(Request $request, $id)
    {
        if($this->shippingMethod=='inhouse_shipping') {
            Toastr::warning(translate('access_denied!!'));
            return redirect()->route('seller.auth.login');
        }
        $search = $request->search;
        $orders = Order::select('id', 'deliveryman_charge', 'order_status', 'delivery_man_id')
            ->where('delivery_man_id', $id)
            ->whereHas('delivery_man', function($query){
                $query->where('seller_id',auth('seller')->id());
            })
            ->when($search, function ($q) use ($search) {
                $q->where('id', 'like', "%$search%");
            })
            ->latest()
            ->paginate(Helpers::pagination_limit())
            ->appends(['search'=>$request['search']]);


        $delivery_man = DeliveryMan::with('wallet')->find($id);
        $total_earn = self::delivery_man_total_earn($id);
        $withdrawable_balance = self::delivery_man_withdrawable_balance($id);

        return view('seller-views.delivery-man.earning-statement.earning', compact( 'delivery_man', 'total_earn', 'withdrawable_balance', 'orders', 'search'));
    }

    public function ajax_order_status_history($order)
    {
        $histories = OrderStatusHistory::where(['order_id' => $order])
            ->latest()
            ->get();
        return view('seller-views.delivery-man.earning-statement._order-status-history', compact('histories'));
    }

    public function rating(Request $request, $id)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $search = $request->search;
        $rating = $request->rating;

        $delivery_man = DeliveryMan::where(['seller_id' => auth('seller')->user()->id])->with(['review'])->find($id);
        if (!$delivery_man) {
            Toastr::warning(translate('Invaild_review!'));
            return redirect(route('seller.delivery-man.list'));
        }

        $reviews_collection = Review::where(['delivery_man_id' => $id])
            ->when(!empty($request->search), function($query) use($request){
                $query->whereHas('order', function($query) use($request){
                    $query->where('id', 'like', "%{$request->search}%");
                });
            })
            ->when(!empty($from_date) && !empty($to_date), function($query) use($from_date, $to_date) {
                $query->whereDate('updated_at', '>=',$from_date)
                    ->whereDate('updated_at', '<=',$to_date);
            })
            ->when(!empty($rating), function($query) use($rating) {
                $query->where('rating', $rating);
            })
            ->latest('updated_at')
            ->get();

        $reviews = $reviews_collection->paginate(Helpers::pagination_limit());

        $total = $reviews_collection->count();
        $average_setting = $reviews_collection->avg('rating');
        $one = $reviews_collection->where('rating', 1)->count();
        $two = $reviews_collection->where('rating', 2)->count();
        $three = $reviews_collection->where('rating', 3)->count();
        $four = $reviews_collection->where('rating', 4)->count();
        $five = $reviews_collection->where('rating', 5)->count();

        return view('seller-views.delivery-man.rating', compact('delivery_man', 'reviews', 'average_setting', 'total', 'one', 'two', 'three', 'four', 'five', 'from_date', 'to_date', 'rating', 'search'));
    }

}
