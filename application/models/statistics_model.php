<?php

    class Statistics_model extends CI_Model{

		public function get_hits() {
            $this->db->select('
                UNIX_TIMESTAMP(
                CONCAT(
                    YEAR(timestamp), "-",
                    MONTH(timestamp), "-",
                    DAY(timestamp), " ",
                    HOUR(timestamp), ":00:00"
                    )
                ) * 1000
                AS timestamp,
                COUNT(*) AS hits
                FROM    statistics
                GROUP BY
                    YEAR(timestamp),
                    MONTH(timestamp),
                    DAY(timestamp),
                    HOUR(timestamp)
                ', FALSE);

            $query = $this->db->get();
            return $query->result_array();
		}

    }
