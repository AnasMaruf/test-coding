<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\VoucherClaim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function index(){
        $vouchers = Voucher::all();
        $vouchersAktif = Voucher::where('status','aktif')->get();
        $categories = Voucher::selectRaw('MIN(id) as id, kategori')
        ->groupBy('kategori')
        ->get();
        $user = Auth::user()->nama;
        return view('voucher.dashboard',compact('vouchersAktif','vouchers','categories','user'));
    }
    public function history(){
        $voucherClaimed = VoucherClaim::all()->count();
        // $categories = Voucher::selectRaw('MIN(id) as id, kategori')
        // ->groupBy('kategori')
        // ->get();
        $categories = Voucher::selectRaw('MIN(vouchers.id) as id, kategori, COUNT(voucher_claims.id) as total')
        ->leftJoin('voucher_claims', 'vouchers.id', '=', 'voucher_claims.voucher_id')
        ->groupBy('kategori')
        ->get();
        $user = Auth::user()->nama;
        $voucherClaims = VoucherClaim::all();
        return view('voucher.history',compact('user','voucherClaims','categories','voucherClaimed'));
    }

    public function fetchAllHistories(){
        $voucherHistories = VoucherClaim::with('voucher')->get();
        return response()->json([
            'histories' => $voucherHistories
        ]);
    }
    public function fetchVoucherClaimed(){
        $voucherClaimed = VoucherClaim::all()->count();
        $categories = Voucher::selectRaw('MIN(vouchers.id) as id, kategori, COUNT(voucher_claims.id) as total')
        ->leftJoin('voucher_claims', 'vouchers.id', '=', 'voucher_claims.voucher_id')
        ->groupBy('kategori')
        ->get();
        $user = Auth::user()->nama;
        $voucherClaims = VoucherClaim::all();
        return response()->json([
            'voucherClaimed' => $voucherClaimed,
            'categories' => $categories,
            'user' => $user,
            'voucherClaims' => $voucherClaims
        ]);
    }
    public function deleteHistory($id){
        $voucherClaim = VoucherClaim::where('id',$id)->firstOrFail();
        $voucherClaim->delete();

        $voucher = Voucher::where('id',$voucherClaim->voucher_id)->firstOrFail();
        $voucher->status = 'aktif';
        $voucher->save();
        return response()->json([
            'msg' => 'Delete Success',
        ]);
    }
    public function fetchAllVouchers()
    {
        $vouchersAktif = Voucher::where('status','aktif')->get();;
        return response()->json([
            'vouchers' => $vouchersAktif,
        ]);
    }
    public function claim($id){
        try {
            $voucher = Voucher::where('id',$id)->firstOrFail();
            $voucher->status = 'nonaktif';
            $voucher->save();

            $voucherClaim = new VoucherClaim();
            $voucherClaim->voucher_id = $id;
            $voucherClaim->tanggal_claim = now();
            $voucherClaim->save();
            return response()->json([
                'msg' => 'Claim Success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Claim Failed',
            ]);
        }
    }
    public function filterVoucher($kategori){
        $voucher = Voucher::where('kategori',$kategori)->where('status','aktif')->get();
        return response()->json([
            'vouchers' => $voucher,
        ]);
    }

    public function filterVoucherClaim($kategori){
        $voucherHistories = VoucherClaim::with('voucher')
        ->whereHas('voucher', function ($query) use ($kategori) {
            $query->where('kategori', $kategori);
        })->get();
        return response()->json([
            'histories' => $voucherHistories
        ]);
    }

}
