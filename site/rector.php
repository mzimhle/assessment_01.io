<?php
declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
  
    $rectorConfig->importNames();
    
    $rectorConfig->paths([
        __DIR__.'/src'
    ]);
    
    $rectorConfig->skip([
        // directories
        __DIR__.'/vendor',
        // filesize
        __DIR__.'/rector.php',
    ]);
    
    $rectorConfig->import(LevelSetList::UP_TO_PHP_81);
    
    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::TYPE_DECLARATION,
        SetList::PSR_4,
        SetList::PHP_80,
        SetList::PHP_81,
    ]);
};
?>