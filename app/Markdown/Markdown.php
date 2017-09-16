<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 16:57
 */

namespace App\Markdown;


class Markdown
{
    private $parser;

    /**
     * Markdown constructor.
     * @param $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function markdown($text)
    {
        $html = $this->parser->makeHtml($text);
        return $html;
    }

    public static function makeHtml($text)
    {
//        $html = self::parser->makeHtml($text);
//        return $html;
    }

}