<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Booking::paginate(2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function getBookings($idRestaurant, $bookingDate, Request $request)
    {
        $zakres_dni = 7;
        $data_poczatku = Carbon::create($bookingDate)->addDays(-$zakres_dni);
        $data_konca = Carbon::create($bookingDate)->addDays($zakres_dni);
        $daneZBD=  Booking::where('id_restaurant', '=', $idRestaurant)
            ->where('booking_date', '>=', $data_poczatku)
            ->where('booking_date', '<=', $data_konca)
            ->get();
        return $this->convertToOutputFormJSON($daneZBD);
    }

    public function nextBite($idRestaurant, $bookingDate, Request $request)
    {
        $zakres_dni = 7;
        $data_konca = Carbon::create($bookingDate)->addDays($zakres_dni);
        $daneZBD=  Booking::where('id_restaurant', '=', $idRestaurant)
            ->where('booking_date', '>=', $bookingDate)
            ->where('booking_date', '<=', $data_konca)
            ->get();
        return $this->convertToOutputFormJSON($daneZBD);
    }

    public function previousBite($idRestaurant, $bookingDate, Request $request)
    {
        $zakres_dni = 7;
        $data_poczatku = Carbon::create($bookingDate)->addDays(-$zakres_dni);
        $daneZBD=  Booking::where('id_restaurant', '=', $idRestaurant)
            ->where('booking_date', '>=', $data_poczatku)
            ->where('booking_date', '<=', $bookingDate)
            ->get();
        return $this->convertToOutputFormJSON($daneZBD);
    }

    private function convertToOutputFormJSON($rawFormJSON)
    {
        $prettyFormJSON = [];
        foreach ($rawFormJSON as $item){
            $prettyFormJSON[$item['booking_date']][$item['table_number']][] = $item ;
        }
        return $prettyFormJSON;
    }
}
