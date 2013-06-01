<?php
    class bijlage extends CI_Controller {

        public function index()
        {
            redirect('info/pagina/404');
        }

        public function view($naam = NULL)
        {
            if (!$naam) {
                redirect('info/pagina/404');
            }

            // Model laden
            $this->load->model('bijlage_model');

            // Item ophalen
            $data = $this->bijlage_model->get_bijlage($naam);

            if (!$data) {
                redirect('info/pagina/404');
            }

            // Download opzetten
            header("Content-type: ".$data->type);
            header("Content-Disposition: inline; filename=".$data->filename);
            print($data->file);
        }

        public function download($id = NULL)
        {
             if (!$id) {
                redirect('info/pagina/404');
            }

            // Helpers laden
            $this->load->helper('file');
            $this->load->helper('download');

            // Model laden
            $this->load->model('bijlage_model');

            // Item ophalen
            $bijlage = $this->bijlage_model->get_bijlage($id);

            if (!$bijlage) {
                redirect('info/pagina/404');
            }

            // Data ophalen
            $filename = "./bijlagen/".$bijlage->id;
            $file = read_file($filename);

            if (!$file) {
                redirect('info/pagina/404');
            }

            // Download opzetten
            force_download($bijlage->filename, $file);

        }
        
    }