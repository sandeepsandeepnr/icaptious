<?php

namespace iCaptious\Http\Request;

class Query
{
    public function __construct()
    {
        if (!empty($_SERVER['QUERY_STRING'])) {
            $query = explode('&', urldecode($_SERVER['QUERY_STRING']));
            $aQuery = [];
            foreach ($query as $key => $value) {
                $values = explode('=', $value);
                if (!empty($aQuery[$values[0]])) {
                    $aQuery[$values[0]][] = (!empty($values[1]) ? $values[1] : '');
                } else {
                    $aQuery[$values[0]] = [(!empty($values[1]) ? $values[1] : '')];
                }
            }

            return $aQuery;
        }

        return [];
    }
}
