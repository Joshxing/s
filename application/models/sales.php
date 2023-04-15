<?php
class Sales_model extends CI_Model {

    public function get_sales_data() {
        // get sales data from database or API
        // and return it as an array
        return [
            ['month' => 'Jan', 'sales' => 500],
            ['month' => 'Feb', 'sales' => 750],
            ['month' => 'Mar', 'sales' => 1000],
            ['month' => 'Apr', 'sales' => 1250],
            ['month' => 'May', 'sales' => 1500],
            ['month' => 'Jun', 'sales' => 1750],
            ['month' => 'Jul', 'sales' => 2000],
            ['month' => 'Aug', 'sales' => 2250],
            ['month' => 'Sep', 'sales' => 2500],
            ['month' => 'Oct', 'sales' => 2750],
            ['month' => 'Nov', 'sales' => 3000],
            ['month' => 'Dec', 'sales' => 3250],
        ];
    }
}
