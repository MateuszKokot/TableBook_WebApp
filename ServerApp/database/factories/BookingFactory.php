<?php

namespace Database\Factories;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;
use function GuzzleHttp\Promise\all;
use function GuzzleHttp\Psr7\str;

class BookingFactory extends Factory
{
    public $id_restaurant;
    public $id_user_min;
    public $id_user_max;
    public $start_date;
    public $booking_on_the_day;
    public $current_date;
    public $booking_counter;
    public $table_counter;
    public $start_booking_time;
    public $current_time;
    public $max_number_of_hours_to_be_booked;
    public $max_number_of_hours_of_break_between_bookings;
    public $table_minutes_list;
    public $size_table_minutes_list;
    public $how_many_people_min;
    public $how_many_people_max;
    public $table_number_list;
    public $size_table_number_list;

    function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);

        //Żeby obliczyć ile pętli trzeba wykonać pomnóż ilość stolików i ilość bookingów dla jednego dnia.

        //Konfiguracja dodawania rezerwacji dla fabryki
        $this->id_restaurant = 1;
        $this->id_user_min = 1;
        $this->id_user_max = 999999;
        $this->start_date = '2021-06-07';
        $this->booking_on_the_day = 5;
        $this->booking_counter = 1; // !!! DON'T TOUCH !!!
        $this->table_counter = 1; // !!! DON'T TOUCH !!!!
        $this->start_booking_time = '12:00';
        $this->max_number_of_hours_to_be_booked = 2;
        $this->max_number_of_hours_of_break_between_bookings = 0;
        $this->table_minutes_list = array('00','15','30','45');
        $this->size_table_minutes_list = count($this->table_minutes_list); // !!! DON'T TOUCH !!!!
        $this->how_many_people_min = 1;
        $this->how_many_people_max = 6;
        $this->table_number_list = array(1,2,3,4,5,6,7,8,9,10);
        $this->size_table_number_list = count($this->table_number_list); // !!! DON'T TOUCH !!!!

        //

        $request = DB::table('bookings')
            ->select('booking_date')
            ->where('id_restaurant', $this->id_restaurant)
            ->orderByDesc('booking_date')
            ->first();
        if ($request === null){
            $this->current_date = $this->start_date;
        } else {
            $this->current_date = $request->booking_date;
        }

    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $id_restaurant = function (){

                return $this->id_restaurant;
        };

        //

        $id_user = function (){

                return rand($this->id_user_min, $this->id_user_max);
        };

        //

        $booking_date = function() {

            if ( ($this->table_counter == $this->size_table_number_list) && ($this->booking_counter == $this->booking_on_the_day) ){

                $return = $this->current_date;
                $carbon = Carbon::create($this->current_date)->addDays(1);
                $this->current_date = date($carbon);

                return $return;
            } else {

                return $this->current_date;
            }
        };

        //

        $from_hour = function () {

            if ($this->booking_counter == 1) {
                $old_hour = (integer)substr($this->start_booking_time, 0, 2);
                $new_hour = rand($old_hour, $old_hour + $this->max_number_of_hours_of_break_between_bookings);
                $minutes = $this->table_minutes_list[rand(0, $this->size_table_minutes_list - 1)];
                $new_time = '' . $new_hour . ":" . $minutes . '';
                $this->current_time = $new_time;
                return $this->current_time;
            } else {
                $old_hour = (integer)substr($this->current_time, 0, 2);
                $new_hour = rand($old_hour, $old_hour + $this->max_number_of_hours_of_break_between_bookings);
                $minutes = $this->table_minutes_list[rand(0, $this->size_table_minutes_list - 1)];
                $new_time = '' . $new_hour . ":" . $minutes . '';
                $this->current_time = $new_time;
                return $this->current_time;
            }
        };

        //

        $to_hour = function (){
            $old_hour = (integer)substr($this->current_time, 0, 2);
            $new_hour = rand($old_hour, $old_hour + $this->max_number_of_hours_to_be_booked);
            $minutes = $this->table_minutes_list[rand(0, $this->size_table_minutes_list - 1)];
            $new_time = '' . $new_hour . ":" . $minutes . '';
            $this->current_time = $new_time;

            return $this->current_time;
        };

        //

        $table_number = function (){

            if ($this->booking_counter == $this->booking_on_the_day) {

                $return = $this->table_number_list[$this->table_counter - 1];
                if ($this->table_counter == $this->size_table_number_list) {
                    $this->table_counter = 1;
                }else {
                    $this->table_counter += 1;
                }
                $this->booking_counter = 1;

                return $return;

            } else {

                $this->booking_counter += 1;
                return $this->table_number_list[$this->table_counter - 1];
            }

        };

        //

        $how_many_people = function (){
            return rand($this->how_many_people_min, $this->how_many_people_max);
        };

        //

        return [
            'id_restaurant' => $id_restaurant,
            'id_user' => $id_user,
            'booking_date' => $booking_date,
            'from_hour' => $from_hour,
            'to_hour' => $to_hour,
            'table_number' => $table_number,
            'how_many_people' => $how_many_people
        ];
    }

}
