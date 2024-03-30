<?php

namespace Tests\Unit;

use App\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testMultiply_3と4の乗算結果を取得する()
    {
        //1.Calculatorクラスのインスタンスを生成する
        $target = new Calculator();

        //2. 想定する計算結果を用意する → 期待値
        $expected = 12;

        // 3. 3 x 4の結果を multiply()に計算させる → 実測値
        $actual = $target->multiply(3,4);

        //4. 想定する結果と multiply()の結果が等しいか検証する
        $this->assertSame($expected, $actual);
    }

    public function testMultiply_5と6の乗算結果を取得する()
    {
        $target = new Calculator();
        $expected = 30;
        //5 x 6の結果を`multiply()`に計算させる
        $actual = $target->multiply(5,6);
        $this->assertSame($expected, $actual);
    }

    // Calculatorクラス
    // 除算結果を返します
public function divide($x, $y)
    {
        return $x / $y;
    }

    /********************************/
   // CalculatorTestクラス
public function testDivide_3と2の除算結果を取得する()
    {
        $target = new Calculator();
        //想定する計算結果の用意
        $expected = 1.5;
        //3 + 2の結果をdivide()に計算させる
        $actual = $target->divide(3,2);
        //計算結果が1.5になるか検証
        $this->assertSame($expected, $actual);
    }

    //Q1
    public function testSum_3と2の加算結果を取得する()
    {
        $target = new Calculator();
        //想定結果の用意
        $expected = 5;
        //3 + 2の結果をsum()に計算
        $actual = $target->sum(3,2);
        //計算結果が5になるか検証
        $this->assertSame($expected, $actual);
    }

    //Q2
    public function testSubtract_10と3の減算結果を取得する()
    {
        $target = new Calculator();
        //想定結果の用意
        $expected = 7;
        //10 - 3の結果をsum()に計算
        $actual = $target->subtract(10,3);
        //計算結果が7になるか検証
        $this->assertSame($expected, $actual);
    }
}
