<?php

    function get_house_hold_infomations($data_id)
    {
        return \DB::table('house_hold_infomations')->where([ "data_id" => $data_id])->first();
    }

    function get_enumratore($enumerator_code)
    {
        return \DB::table('enumerator_datas')->where([ "enumerator_code" => $enumerator_code])->first();
    }

?>
