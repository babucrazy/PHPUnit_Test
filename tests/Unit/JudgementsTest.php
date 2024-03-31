<?php

namespace Tests\Unit;

use App\Judgement;
use Exception;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class JudgementTest extends TestCase
{
    //プロパティを定義
    private $target;

    protected function setUp(): void
    {
        //共通で利用するインスタンス生成
        $this->target = new Judgement();
    }

    public function testJudge_得点が80の場合の結果を取得する()
    {
        $score = 80;
        $expected = "合格";
        $actual = $this->target->judge($score);

        $this->assertSame($expected, $actual);
    }

    public function testJudge_得点が30の場合の結果を取得する()
    {
        $score = 30;
        $expected = "不合格";
        $actual = $this->target->judge($score);

        $this->assertSame($expected, $actual);
    }

    public function isValid($score) {
        if ($score < 0 | $score > 100) {
            return false;
        }
        return true;
    }

    public function testIsValid_得点が101の場合falseを返すこと()
    {
        $score = 101;
        $actual = $this->target->isValid($score);
        $this->assertFalse($actual);
    }

    public function testNotNull_得点が30の場合に判定結果がNULLではないことを検証する()
    {
        $score = 30;
        $actual = $this->target->judge($score);
        $this->assertNotNull($actual);
    }

    public function testJudge_得点が101の場合例外が発生すること()
    {
        $score = 101;

        $this->expectException(Exception::class);
        $actual = $this->target->judge($score);
    }

    #[DataProvider('judgeProvider')]
    public function testJudge_パラメータ化のテスト($score,$expected)
    {
        $actual = $this->target->judge($score);
        $this->assertSame($expected,$actual);
    }

    public function judgeProvider():array
    {
        return [
            '得点が100の場合、合格'  => [100, '合格'],
            '得点が99の場合、合格'  => [99, '合格'],
            '得点が81の場合、合格'  => [81, '合格'],
            '得点が80の場合、合格'  => [80, '合格'],
            '得点が79の場合、合格'  => [79, '不合格'],
            '得点が1の場合、合格'  => [1, '不合格'],
            '得点が0の場合、合格'  => [0, '不合格'],
        ];
    }
}
