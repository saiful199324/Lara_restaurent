<?php

namespace App\Http\Controllers\admin;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
  public function index(){
    $reservations = Reservation::all();
    // print_r($reservations);
    return view('admin.reservation.index',compact('reservations'));
  }

  public function status($id)
  {
    $reservation = Reservation::find($id);
    $reservation ->status = true;
    $reservation ->save();
    Toastr::success('Reservation Successfully Confirmed','success',["position"=>"toast-top-right"]);
    return redirect()->back();

  }

  public function destory($id){
      Reservation::find($id)->delete();
      Toastr::success('Reservation successfully deleted.','Success',["positionClass" => "toast-top-right"]);
      return redirect()->back();
  }



}
