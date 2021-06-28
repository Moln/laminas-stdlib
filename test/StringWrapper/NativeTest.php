<?php

declare(strict_types=1);

namespace LaminasTest\Stdlib\StringWrapper;

use Laminas\Stdlib\StringWrapper\Native;

use function array_shift;

class NativeTest extends CommonStringWrapperTest
{
    /**
     * @param null|string $encoding
     * @param null|string $convertEncoding
     * @return StringWrapperInterface
     */
    protected function getWrapper($encoding = null, $convertEncoding = null)
    {
        if ($encoding === null) {
            $supportedEncodings = Native::getSupportedEncodings();
            $encoding           = array_shift($supportedEncodings);
        }

        if (! Native::isSupported($encoding, $convertEncoding)) {
            return false;
        }

        $wrapper = new Native();
        $wrapper->setEncoding($encoding, $convertEncoding);
        return $wrapper;
    }
}
