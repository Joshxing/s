<?php
class Sales extends CI_Controller {

    public function index() {
        $this->load->model('sales_model');
        $sales_data = $this->sales_model->get_sales_data();
        $data = [
            'sales_data' => $sales_data,
        ];
        $this->load->view('sales', $data);
    }

}
