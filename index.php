<?php

interface iParser {
    public function parse(String $str):Array;
}


class xmlParser implements iParser {
    public function parse(string $str): array
    {
        // TODO: Implement parse() method.
        return str_split("xml $str", 1);
    }
}

class csvParser implements iParser {
    public function parse(string $str): array
    {
        // TODO: Implement parse() method.
        return str_split("csv $str", 1);
    }
}


class parserFactory {
    private iParser $parser;

    public function getParser(String $type):iParser{
        switch ($type){
            case 'xml':
                $this->parser = new xmlParser();
                break;
            case 'csv':
                $this->parser = new csvParser();
                break;
            default:
                throw new \Exception('Unexpected value');

        }

        return $this->parser;
    }
}


class parseHandler {

    public function handle(String $type, String $str):Array{
        $parseFactory = new parserFactory();
        $parser= $parseFactory->getParser($type);
        return $parser->parse($str);
    }
}

$parser = new parseHandler();
$parseResult = $parser->handle('xml', 'string');

echo "<pre>";
print_r($parseResult);
echo "</pre>";
