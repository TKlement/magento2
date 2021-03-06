<?php
/**
 * Event invoker interface
 *
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Event;

interface InvokerInterface
{
    /**
     * Dispatch event
     *
     * @param array $configuration
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function dispatch(array $configuration, \Magento\Framework\Event\Observer $observer);
}
