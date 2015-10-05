class Seo_model extends CI_Model {

    /*
    * Get current SEO and META data
    *
    * @param $url String the url of SEO (ex.: index, categories)
    * return formattad array of results
    */
    public function get($url = 'index'){

        $url = strtolower($url);
        $query = $this->db->get_where('seo_data', array("url" => $url));
        $ret = $query->result_array();

        if(count($ret) == 0){
            $query = $this->db->get_where('seo_data', array("url" => 'index'));
            $ret = $query->result_array();
        }

        return $this->format($ret[0]);

    }

   /*
    * Format current SEO and META data
    *
    * @param $data Array from get function
    * return array of title & meta data
    */
    public function format($data){

        $ret = array();
        extract($data);

        $ret['title'] = '<title>'.$title.'</title>';

        $meta = array();

        if(!empty($description)){
            $meta[] = "    <meta property=\"description\" content=\"$description\" >";
        }

        if(!empty($keywords)){
            $meta[] = "    <meta property=\"keywords\" content=\"$keywords\" >";
        }

        if(!empty($og_title)){
            $meta[] = "    <meta property=\"og:title\" content=\"$og_title\" >";
        }

        if(!empty($og_title)){
            $meta[] = "    <meta property=\"og:image\" content=\"$og_image\" >";
        }

        if(count($meta) >0){
            $ret['meta'] = "\n".implode($meta, "\n")."\n";
        }else{
            $ret['meta'] = "";
        }


        return $ret;
    }

}
