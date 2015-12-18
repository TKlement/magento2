<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Composer;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * A class to find path to root Composer json file
 */
class ComposerJsonFinder
{
    /**
     * @var DirectoryList $directoryList
     */
    private $directoryList;

    /**
     * Constructor
     *
     * @param DirectoryList $directoryList
     */
    public function __construct(DirectoryList $directoryList)
    {
        $this->directoryList = $directoryList;
    }

    /**
     * Find absolute path to root Composer json file
     *
     * @return string
     * @throws \Exception
     */
    public function findComposerJson()
    {
        $composerJson = $this->directoryList->getPath(DirectoryList::ROOT)->getAbsolutePath('composer.json');

        $composerJson = realpath($composerJson);

        if ($composerJson === false) {
            throw new \Exception('Composer file not found');
        }

        return $composerJson;
    }
}
