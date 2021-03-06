<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Eav\Test\Unit\Model\Attribute\Data;

class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Eav\Model\Attribute\Data\Boolean
     */
    protected $model;

    protected function setUp()
    {
        $timezoneMock = $this->getMock(\Magento\Framework\Stdlib\DateTime\TimezoneInterface::class);
        $loggerMock = $this->getMock(\Psr\Log\LoggerInterface::class, [], [], '', false);
        $localeResolverMock = $this->getMock(\Magento\Framework\Locale\ResolverInterface::class);

        $this->model = new \Magento\Eav\Model\Attribute\Data\Boolean($timezoneMock, $loggerMock, $localeResolverMock);
    }

    /**
     * @covers \Magento\Eav\Model\Attribute\Data\Boolean::_getOptionText
     *
     * @param string $format
     * @param mixed $value
     * @param mixed $expectedResult
     * @dataProvider getOptionTextDataProvider
     */
    public function testOutputValue($format, $value, $expectedResult)
    {
        $entityMock = $this->getMock(\Magento\Framework\Model\AbstractModel::class, [], [], '', false);
        $entityMock->expects($this->once())->method('getData')->will($this->returnValue($value));

        $attributeMock = $this->getMock(\Magento\Eav\Model\Attribute::class, [], [], '', false);

        $this->model->setEntity($entityMock);
        $this->model->setAttribute($attributeMock);
        $this->assertEquals($expectedResult, $this->model->outputValue($format));
    }

    /**
     * @return array
     */
    public function getOptionTextDataProvider()
    {
        return [
            [
                'format' => \Magento\Eav\Model\AttributeDataFactory::OUTPUT_FORMAT_TEXT,
                'value' => '0',
                'expectedResult' => 'No',
            ],
            [
                'format' => \Magento\Eav\Model\AttributeDataFactory::OUTPUT_FORMAT_TEXT,
                'value' => '1',
                'expectedResult' => 'Yes'
            ],
            [
                'format' => \Magento\Eav\Model\AttributeDataFactory::OUTPUT_FORMAT_TEXT,
                'value' => '2',
                'expectedResult' => ''
            ],
        ];
    }
}
