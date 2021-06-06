<?php

namespace Database\Factories;

use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TableFactory extends Factory
{
    public $id_restaurant;
    public $number_of_tables_for_restaurant;
    public $start_of_table_numbering;
    public $tables_counter;
    public $table_models_list;
    public $size_table_models_list;
    public $max_number_of_chairs;

    public function __construct($count = null, ?Collection $states = null, ?Collection $has = null, ?Collection $for = null, ?Collection $afterMaking = null, ?Collection $afterCreating = null, $connection = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection);

        $this->id_restaurant = 1;
        $this->number_of_tables_for_restaurant = 10;
        $this->start_of_table_numbering = 1;
        $this->tables_counter = 1; // !!! DON'T TOUCH !!!
        $this->table_models_list = array('Okragly','Kwadratowy','Prostokatny','Trojkatny',);
        $this->size_table_models_list = count($this->table_models_list);
        $this->max_number_of_chairs = 6;


    }

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Table::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $table_number = function (){
            $return = $this->tables_counter;
            $this->tables_counter += 1;
            return $return;
        };

        $table_model = function (){
            $return = rand(0, $this->size_table_models_list - 1);

            return $return;
        };

        $how_many_chairs = function (){
            $return = rand(1, $this->max_number_of_chairs);

            return $return;
        };

        return [
            'id_restaurant' => $this->id_restaurant,
            'restaurant_floor' => 1,
            'table_number' => $table_number,
            'table_name' => $this->faker->word(),
            'table_comment' => $this->faker->text(500),
            'reservable' => $this->faker->boolean(),
            'table_model' => $table_model,
            'table_zoom_size' => 0,
            'table_stretch_X' => 0,
            'table_stretch_Y' => 0,
            'table_position_X' => 0,
            'table_position_Y' => 0,
            'table_rotation' => 0,
            'chair_model' => 0,
            'how_many_chairs' => $how_many_chairs,
            'how_many_chair_slots' => 0,
            'chair_positions_set_of_setting' => 0
        ];
    }
}
