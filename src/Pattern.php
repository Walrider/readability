<?php

namespace Walrider\Readability;

class Pattern
{
    public $subtract_syllable_patterns = Array("cia(l|$)", "tia", "cius",
        "cious", "[^aeiou]giu", "[aeiouy][^aeiouy]ion", "iou", "sia$",
        "eous$", "[oa]gue$", ".[^aeiuoycgltdb]{2,}ed$", ".ely$", "^jua", "uai", "eau",
        "[aeiouy](b|c|ch|d|dg|f|g|gh|gn|k|l|ll|lv|m|mm|n|nc|ng|nn|p|r|rc|rn|rs|rv|s|sc|sk|sl|squ|ss|st|t|th|v|y|z)e$",
        "[aeiouy](b|c|ch|dg|f|g|gh|gn|k|l|lch|ll|lv|m|mm|n|nc|ng|nch|nn|p|r|rc|rn|rs|rv|s|sc|sk|sl|squ|ss|th|v|y|z)ed$",
        "[aeiouy](b|ch|d|f|gh|gn|k|l|lch|ll|lv|m|mm|n|nch|nn|p|r|rn|rs|rv|s|sc|sk|sl|squ|ss|st|t|th|v|y)es$", "^busi$");

    public $add_syllable_patterns = Array("([^s]|^)ia", "iu", "io",
        "eo($|[b-df-hj-np-tv-z])", "ii", "[ou]a$", "[aeiouym]bl$", "[aeiou]{3}",
        "[aeiou]y[aeiou]", "^mc", "ism$", "asm$", "thm$", "([^aeiouy])\1l$",
        "[^l]lien", "^coa[dglx].", "[^gq]ua[^auieo]", "dnt$", "uity$",
        "[^aeiouy]ie(r|st|t)$", "eings?$", "[aeiouy]sh?e[rsd]$", "iell",
        "dea$", "real", "[^aeiou]y[ae]", "gean$", "riet", "dien", "uen");

    public $prefix_and_suffix_patterns = Array("^un", "^fore", "^ware",
        "^none?", "^out", "^post", "^sub", "^pre", "^pro", "^dis", "^side",
        "ly$", "less$", "some$", "ful$", "ers?$", "ness$", "cians?$",
        "ments?$", "ettes?$", "villes?$", "ships?$", "sides?$", "ports?$",
        "shires?$", "tion(ed)?$");

    public $problem_words = Array('abalone' => 4, 'abare' => 3, 'abed' => 2,
        'abruzzese' => 4, 'abbruzzese' => 4, 'aborigine' => 5, 'acreage' => 3,
        'adame' => 3, 'adieu' => 2, 'adobe' => 3, 'anemone' => 4,
        'apache' => 3, 'aphrodite' => 4, 'apostrophe' => 4, 'ariadne' => 4,
        'cafe' => 2, 'calliope' => 4, 'catastrophe' => 4, 'chile' => 2,
        'chloe' => 2, 'circe' => 2, 'coyote' => 3, 'epitome' => 4,
        'forever' => 3, 'gethsemane' => 4, 'guacamole' => 4, 'hyperbole' => 4,
        'jesse' => 2, 'jukebox' => 2, 'karate' => 3, 'machete' => 3,
        'maybe' => 2, 'people' => 2, 'recipe' => 3, 'sesame' => 3,
        'shoreline' => 2, 'simile' => 3, 'syncope' => 3, 'tamale' => 3,
        'yosemite' => 4, 'daphne' => 2, 'eurydice' => 4, 'euterpe' => 3,
        'hermione' => 4, 'penelope' => 4, 'persephone' => 4, 'phoebe' => 2,
        'zoe' => 2);
}
