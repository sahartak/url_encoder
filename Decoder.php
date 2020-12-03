<?php


class Decoder
{
    const COUNT_SYMBOL_REPLACEMENT = 'CZ';

    public function decode(?string $url): string
    {
        if ($url) {
            $params = parse_url($url);
            $queryParams = [];
            if (!empty($params['query'])){
                parse_str($params['query'], $queryParams);
                $decodedParams = $this->decodeParams($queryParams);
                $params['query'] = urldecode(http_build_query($decodedParams));
                $url = $params['scheme'] . '://'.$params['host'] . '?'. $params['query'];
            }
        }
        return $url;
    }

    private function decodeString(string $string): string
    {

        $symbolReplacementPos = strrpos($string, self::COUNT_SYMBOL_REPLACEMENT);
        if ($symbolReplacementPos){
            $symbolCount = substr($string, $symbolReplacementPos);
            $count = str_replace(self::COUNT_SYMBOL_REPLACEMENT, '',$symbolCount);
            if (is_numeric($count)){
                $string = str_replace($symbolCount, str_repeat('=', $count), $string) ;
            }
        }

        $decoded = base64_decode($string);
        return substr($decoded, 13);
    }

    private function decodeParams(array $params): array
    {
        $params = array_flip($params);
        foreach ($params as &$param){
            $param = $this->decodeString($param);

        }
        return array_flip($params);
    }

}