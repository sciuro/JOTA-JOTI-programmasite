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
                WHERE timestamp >= (NOW() - INTERVAL 1 MONTH)
                GROUP BY
                    YEAR(timestamp),
                    MONTH(timestamp),
                    DAY(timestamp),
                    HOUR(timestamp)
                ', FALSE);

            $query = $this->db->get();
            return $query->result_array();
		}

        public function get_stats_today() {
            $this->db->select('count(*) AS count');
            $this->db->from('(select session
                                from statistics
                                where timestamp >= curdate()
                                group by session) AS s');

            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_popular() {
            $this->db->select('uri, COUNT(uri) AS hits');
            $this->db->from('statistics');

            $this->db->where('error_code', '200');

            $this->db->group_by('uri');
            $this->db->order_by('hits', 'DESC');

            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_browsers() {
            $this->db->select('browser, version, count(browser) AS hits');
            $this->db->from('statistics');

            $this->db->where('error_code', '200');

            $this->db->group_by('browser, version');
            $this->db->order_by('hits DESC, browser, version');

            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_os() {
            $this->db->select('platform, mobile, count(platform) AS hits');
            $this->db->from('statistics');

            $this->db->where('error_code', '200');

            $this->db->group_by('platform, mobile');
            $this->db->order_by('hits DESC, platform, mobile');

            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_referrer() {
            $this->db->select('referrer, COUNT(referrer) AS count');
            $this->db->from('statistics');

            $this->db->not_like('referrer', base_url());
            $this->db->like('referrer', 'http://');

            $this->db->group_by('referrer');
            $this->db->order_by('count DESC, referrer');

            $query = $this->db->get();
            return $query->result_array();

        }

        public function get_404() {
            $this->db->select('uri, referrer, COUNT(uri) AS count');
            $this->db->from('statistics');

            $this->db->where('error_code', '404');

            $this->db->group_by('uri, referrer');
            $this->db->order_by('count DESC, uri, referrer');

            $query = $this->db->get();
            return $query->result_array();
        }

        public function get_returning_visitors() {
            $this->db->select('
                count(s.tracking) as count
                from (
                    select session, tracking
                    from statistics
                    group by tracking, session
                ) AS s
                group by s.tracking
                order by count desc
            ', FALSE);

            $query = $this->db->get();
            return $query->result_array();
        }
    }
