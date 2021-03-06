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
        return Booking::paginate(10);
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
        $test = new Booking();
        $test->id_restaurant = $request->id_restaurant;
        $test->id_user = $request->id_user;
        $test->booking_date = $request->booking_date;
        $test->from_hour = $request->from_hour;
        $test->to_hour = $request->to_hour;
        $test->table_number = $request->table_number;
        $test->how_many_people = $request->how_many_people;
        $test->save();

        return response($test->toArray(),200,);

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

    public function getOneDayBookings($idRestaurant, $bookingDate, Request $request)
    {

        $daneZBD=  Booking::where('id_restaurant', '=', $idRestaurant)
            ->where('booking_date', '=', $bookingDate)
            ->get();
        return $this->convertToOutputFormJSON($daneZBD);
    }

    private function convertToOutputFormJSON($rawFormJSON)
    {
        $prettyFormJSON = [];
        foreach ($rawFormJSON as $item){
            //$prettyFormJSON[$item['booking_date']][$item['table_number']][] = $item ;
            $prettyFormJSON['stolik' . $item['table_number']][] = $item ;
        }
        return $prettyFormJSON;
    }

    public function createBooking (Request $request) {

//        $boooking = new Booking([
//            'id_restaurant' => $request->get('id_restaurant')
//
//        ]);

//        $product = new Product([
//            'name' => $request->get('name'),
//            'price' => $request->get('price'),
//            'description'  => $request->get('description'),
//            'active'  => $request->get('active')
//        ]);
        //$boooking->save();
        //return response()->json($boooking);

        //print_r("print");
        return response($request->get('id_restaurant'), 200);
    }
}
