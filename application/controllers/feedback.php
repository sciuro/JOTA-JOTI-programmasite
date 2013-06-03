<?php
    class feedback extends CI_Controller {

        public function index()
        {
            // Controleren of er wel iets binnenkomt.
            if ($this->input->post('spel') == '') {
                redirect('info/pagina/404');
            }

            // Model laden
            $this->load->model('feedback_model');

            $spel = $this->input->post('spel');
            $groepsnr = $this->input->post('groepsnr');
            $bruikbaar = $this->input->post('bruikbaar');
            $opmerking = $this->input->post('opmerking');
            $email = $this->input->post('email');

            if (($bruikbaar == '') && ($opmerking == '')) {
                redirect('spellen/spel/'.$spel);
            }

            // Data opslaan
            $this->feedback_model->opslaan_feedback($spel, $bruikbaar, $opmerking, $email);

            // Submit toggle zetten
            $this->session->set_flashdata('submit', true);

            // Redirect naar vorige pagina
            redirect('spellen/spel/'.$spel);

        }
       
    }