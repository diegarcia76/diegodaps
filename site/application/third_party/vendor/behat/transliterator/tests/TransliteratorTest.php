<?php

namespace Behat\Tests\Transliterator;

use Behat\Transliterator\Transliterator;

class TransliteratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideUtf8ConversionCases
     */
    public function testUtf8Conversion($input, $expected)
    {
        $this->assertSame($expected, Transliterator::utf8ToAscii($input));
    }

    public function provideUtf8ConversionCases()
    {
        return array(
            array('', ''),
            array('BonJour', 'BonJour'),
            array('DÃ©jÃ ', 'Deja'),
            array('trÄ…nslÄ¯teration tÄ—st Å³sÄ…ge Å«Å¾', 'transliteration test usage uz'),
            array('Ñ‚Ð¾Ð²Ð° Ðµ Ñ‚ÐµÑÑ‚Ð¾Ð²Ð¾ Ð·Ð°Ð³Ð»Ð°Ð²Ð¸Ðµ', 'tova ie tiestovo zaghlaviie'),
            array('ÑÑ‚Ð¾ Ñ‚ÐµÑÑ‚Ð¾Ð²Ñ‹Ð¹ Ð·Ð°Ð³Ð¾Ð»Ð¾Ð²Ð¾Ðº', 'eto tiestovyi zagholovok'),
            array('fÃ¼hren AktivitÃ¤ten HaglÃ¶fs', 'fuhren Aktivitaten Haglofs'),
        );
    }

    /**
     * @dataProvider provideTransliterationCases
     */
    public function testTransliteration($input, $expected)
    {
        $this->assertSame($expected, Transliterator::transliterate($input));
    }

    public function provideTransliterationCases()
    {
        return array(
            array('', ''),
            array('BonJour', 'bonjour'),
            array('BonJour & au revoir', 'bonjour-au-revoir'),
            array('DÃ©jÃ ', 'deja'),
            array('trÄ…nslÄ¯teration tÄ—st Å³sÄ…ge Å«Å¾', 'transliteration-test-usage-uz'),
            array('Ñ‚Ð¾Ð²Ð° Ðµ Ñ‚ÐµÑÑ‚Ð¾Ð²Ð¾ Ð·Ð°Ð³Ð»Ð°Ð²Ð¸Ðµ', 'tova-ie-tiestovo-zaghlaviie'),
            array('ÑÑ‚Ð¾ Ñ‚ÐµÑÑ‚Ð¾Ð²Ñ‹Ð¹ Ð·Ð°Ð³Ð¾Ð»Ð¾Ð²Ð¾Ðº', 'eto-tiestovyi-zagholovok'),
            array('fÃ¼hren AktivitÃ¤ten HaglÃ¶fs', 'fuhren-aktivitaten-haglofs'),
        );
    }

    /**
     * @dataProvider provideUnaccentCases
     */
    public function testUnaccent($input, $expected)
    {
        $this->assertSame($expected, Transliterator::unaccent($input));
    }

    public function provideUnaccentCases()
    {
        return array(
            array('', ''),
            array('BonJour', 'BonJour'),
            array('DÃ©jÃ ', 'Deja'),
            array('Ñ‚Ð¾Ð²Ð° Ðµ Ñ‚ÐµÑÑ‚Ð¾Ð²Ð¾ Ð·Ð°Ð³Ð»Ð°Ð²Ð¸Ðµ', 'Ñ‚Ð¾Ð²Ð° Ðµ Ñ‚ÐµÑÑ‚Ð¾Ð²Ð¾ Ð·Ð°Ð³Ð»Ð°Ð²Ð¸Ðµ'),
        );
    }

    /**
     * @dataProvider provideUrlizationCases
     */
    public function testUrlization($input, $expected)
    {
        $this->assertSame($expected, Transliterator::urlize($input));
    }

    public function provideUrlizationCases()
    {
        return array(
            array('', ''),
            array('BonJour', 'bonjour'),
            array('BonJour & au revoir', 'bonjour-au-revoir'),
            array('DÃ©jÃ ', 'deja'),
            array('Ñ‚Ð¾Ð²Ð° Ðµ Ñ‚ÐµÑÑ‚Ð¾Ð²Ð¾ Ð·Ð°Ð³Ð»Ð°Ð²Ð¸Ðµ', ''),
        );
    }
}
