<?php

class Encoder
{
    const COUNT_SYMBOL_REPLACEMENT = 'CZ';

    public function encode(?string $url): string
    {
        if ($url) {
            $params = parse_url($url);
            $queryParams = [];
            if (!empty($params['query'])) {
                parse_str($params['query'], $queryParams);
                $encodedParams = $this->encodeParams($queryParams);
                $params['query'] = urldecode(http_build_query($encodedParams));
                $url = $params['scheme'] . '://' . $params['host'] . '?' . $params['query'];
            }
        }
        return $url;
    }

    private function encodeString(string $string): string
    {
        $encodedStr = base64_encode(uniqid() . $string);
        $count = substr_count($encodedStr,'=');
        if ($count){
            $equalSymbols = str_repeat('=', $count);
            $encodedStr = str_replace($equalSymbols, self::COUNT_SYMBOL_REPLACEMENT.$count, $encodedStr);
        }
        return $encodedStr;
    }

    private function encodeParams(array $params): array
    {
        $params = array_flip($params);
        foreach ($params as &$param) {
            $param = $this->encodeString($param);
        }
        return array_flip($params);
    }




}