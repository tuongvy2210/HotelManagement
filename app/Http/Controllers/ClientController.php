<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\RoomType;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $roomTypes = RoomType::display()->paginate(6);

            view()->share(['roomTypes' => $roomTypes]);

            return $next($request);
        });
    }

    public function index()
    {
        $indexRoomTypes = RoomType::display()->limit(3)->get();

        return view('clients.pages.index', compact('indexRoomTypes'));
    }

    public function about()
    {
        return view('clients.pages.about');
    }

    public function contact()
    {
        return view('clients.pages.contact');
    }

    public function bookingList()
    {
        $bookings = Auth::guard('user')->user()->customer->bookings()->latest()->get();

        return view('clients.pages.booking_list', compact('bookings'));
    }

    public function cancelBooking(Booking $booking)
    {
        $booking->update(['is_cancelled' => 1]);

        return back();
    }

    public function login()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('index');
        }

        return view('clients.pages.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::guard('user')->attempt([
            fn (Builder $query) => $query->whereNotNull('customer_id'),
            'username' => $request->username,
            'password' => $request->password,
            'is_active' => 1,
        ])) {
            return redirect()->route('index');
        }

        return back();
    }

    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect()->route('index');
    }

    public function signup()
    {
        if (Auth::guard('user')->check()) {
            return redirect()->route('index');
        }

        return view('clients.pages.signup');
    }

    public function register(Request $request)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::create([
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'customer_id' => $customer->id,
            ]);
            DB::commit();

            return redirect()->route('login');
        } catch (Exception $e) {
            DB::rollBack();

            return back();
        }
    }

    public function room()
    {
        return view('clients.pages.room');
    }

    public function detail(RoomType $roomType)
    {
        return view('clients.pages.detail', compact('roomType'));
    }

    public function booking()
    {
        $roomTypes = RoomType::display()->get();

        return view('clients.pages.booking', compact('roomTypes'));
    }

    public function service()
    {
        return view('clients.pages.service');
    }

    public function storeBooking(Request $request)
    {
        Booking::create([
            'customer_id' => 1,
            'room_type_id' => $request->room_type_id,
            'booking_at' => now(),
            'checkin_at' => Carbon::createFromFormat('m/d/Y h:i A', $request->checkin_at),
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->note,
        ]);

        return redirect()->route('booking_list');
    }

    public function changePasswordView()
    {
        return view('clients.pages.change_password');
    }

    public function changePassword(Request $request)
    {
        if (Hash::check($request->old_password, Auth::user()->password)) {
            Auth::guard('user')->user()->update([
                'password' => bcrypt($request->password),
            ]);

            return redirect()->route('index');
        }

        return back();
    }

    public function changeInfoView()
    {
        return view('clients.pages.change_info');
    }

    public function changeInfo(Request $request)
    {
        Auth::guard('user')->user()->customer->update($request->all());

        return redirect()->route('index');
    }
}
