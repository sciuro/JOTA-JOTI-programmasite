<?php

    class Statistics_model extends CI_Model{

		public function get_hits($from, $to) {
			SELECT CONCAT(
    YEAR(timestamp),
    MONTH(timestamp),
    DAY(timestamp),
    HOUR(timestamp),
    COUNT(*)
FROM `statistics`
GROUP BY
    YEAR(timestamp),
    MONTH(timestamp),
    DAY(timestamp),
    HOUR(timestamp)
    
			return;
		}

    }
