<?php

namespace Katas\Tests\WordWrap;

use Katas\WordWrap\WordWrapper;
use PHPUnit\Framework\TestCase;

class WordWrapperTests extends TestCase
{
    /** @var WordWrapper */
    private $wrapper;

    protected function setUp()
    {
        $this->wrapper = new WordWrapper();
    }

    public function testOneWord()
    {
        $this->assertSame('test', $this->wrapper->wrap('test', 6));
    }

    public function testBreakWordOneTime()
    {
        $this->assertSame("long\nword", $this->wrapper->wrap('longword', 4));
    }

    public function testBreakWordTwoTimes()
    {
        $this->assertSame("really\nlongwo\nrd", $this->wrapper->wrap('reallylongword', 6));
    }

    public function testSecondWordOnNewLine()
    {
        $this->assertSame("test\ncase", $this->wrapper->wrap('test case', 4));
    }

    public function testLongSecondWordWithNewLines()
    {
        $this->assertSame("test\nlong\nseco\nnd\nword", $this->wrapper->wrap('test longsecond word', 4));
    }

    public function testLotOfWordsForASingleLine()
    {
        $this->assertSame("a lot of\nwords for\na single\nline", $this->wrapper->wrap("a lot of words for a single line", 10));
    }

    public function testTwoWordOnSecondLine()
    {
        $this->assertSame("this\nis a\ntest", $this->wrapper->wrap("this is a test", 4));
    }

    public function testALongWord()
    {
        $this->assertSame("a long\nword", $this->wrapper->wrap("a longword", 6));
    }
}
