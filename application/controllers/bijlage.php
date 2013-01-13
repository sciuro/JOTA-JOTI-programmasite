<?php
    class bijlage extends CI_Controller {

        public function view($naam)
        {
            // Model laden
            $this->load->model('bijlage_model');

            // Item ophalen
            $data = $this->bijlage_model->get_bijlage($naam);

            // Download opzetten
            header("Content-type: ".$data->type);
            header("Content-Disposition: inline; filename=".$data->filename);
            print($data->file);
        }

        public function download($naam)
        {
            // Model laden
            $this->load->model('bijlage_model');

            // Item ophalen
            $data = $this->bijlage_model->get_bijlage($naam);

            // Download opzetten
            header("Content-type: ".$data->type);
            header("Content-Disposition: attachment; filename=".$data->filename);
            print($data->file);

        }
        
    }