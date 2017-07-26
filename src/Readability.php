<?php

declare(strict_types=1);

namespace Walrider\Readability;

require('Pattern.php');

class Readability
{
    protected $pattern, $sample;

    const DELIMITERS = Array('.', '!', ';');

    const VOWELS = Array('a', 'e', 'i', 'o', 'u');

    public function __construct(Pattern $pattern)
    {
        $this->pattern = $pattern;
    }


    public function easeScore(String $writing_sample)
    {
        $this->sample = str_replace(',', '', strtolower($writing_sample));

        $asl = $this->getASL();
//        var_dump($asl);

        $asw = $this->getASW();
//        var_dump($asw);

        $result = 206.835 - (1.015 * $asl) - (84.6 * $asw);

        return $result;
    }


    protected function getASL()
    {
        $sentences = $this->getSentences();
        $words = $this->getWords();

        $amountOfSentences = sizeof($sentences);
        $amountOfWords = sizeof($words);

        return $amountOfWords / $amountOfSentences;
    }

    protected function getASW()
    {
        $words = $this->getWords();

        $amountOfWords = sizeof($words);
        $amountOfSyllables = $this->getAmountOfSyllables();
        var_dump($amountOfWords);
        var_dump($amountOfSyllables);

        return $amountOfSyllables / $amountOfWords;
    }

    protected function getSentences()
    {
        $sentences = preg_split('/[' . implode(self::DELIMITERS) . ']/', $this->sample, -1, PREG_SPLIT_NO_EMPTY);

        return $sentences;
    }

    protected function getWords()
    {
        $sentences = $this->getSentences();

        $allWords = Array();

        foreach ($sentences as $sentence) {
            $words = preg_split('/ /', $sentence, -1, PREG_SPLIT_NO_EMPTY);

            $allWords = array_merge($allWords, $words);
        }

        return $allWords;
    }

    protected function getAmountOfSyllables()
    {
        $words = $this->getWords();

        $allSyllables = 0;

        foreach ($words as $index => $word) {

            foreach ($this->pattern->problem_words as $problemWord => $weight) {
                if ($words[$index] == $problemWord) {

                    $allSyllables += $weight;

                    unset($words[$index]);
                    continue 2;
                }
            }

            foreach ($this->pattern->prefix_and_suffix_patterns as $pattern) {
                if (preg_match('/' . $pattern . '/', $words[$index], $matches)) {

                    $allSyllables++;

                    $words[$index] = preg_replace('/' . $pattern . '/', '', $words[$index]);
                }
            }

            foreach ($this->pattern->add_syllable_patterns as $pattern) {
                if (preg_match('/' . $pattern . '/', $words[$index])) {

                    $allSyllables += 2;

                    $words[$index] = preg_replace('/' . $pattern . '/', '', $words[$index]);
                }
            }

            foreach ($this->pattern->subtract_syllable_patterns as $pattern) {
                if (preg_match('/' . $pattern . '/', $words[$index])) {

                    $allSyllables++;

                    $words[$index] = preg_replace('/' . $pattern . '/', '', $words[$index]);
                }
            }

            $matches = [];

            preg_match_all('/[' . implode(self::VOWELS) . ']/', $words[$index], $matches);

            $allSyllables += sizeof($matches[0]);
        }

        return $allSyllables;
    }
}


$readabilty = new Readability(new Pattern());

echo $readabilty->easeScore('Heavy metals are generally defined as metals with relatively high densities, atomic weights, or atomic numbers. The criteria used, and whether metalloids are included, vary depending on the author and context. In metallurgy, for example, a heavy metal may be defined on the basis of density, whereas in physics the distinguishing criterion might be atomic number, while a chemist would likely be more concerned with chemical behavior. More specific definitions have been published, but none of these have been widely accepted. The definitions surveyed in this article encompass up to 96 out of the 118 chemical elements; only mercury, lead and bismuth meet all of them.');


