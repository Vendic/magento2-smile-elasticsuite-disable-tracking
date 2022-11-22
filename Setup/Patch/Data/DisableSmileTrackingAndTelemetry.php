<?php declare(strict_types=1);
/**
 * @copyright   Copyright (c) Vendic B.V https://vendic.nl/
 */

namespace Vendic\SmileElasticSuiteDisableTracking\Setup\Patch\Data;

use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class DisableSmileTrackingAndTelemetry implements DataPatchInterface
{
    private WriterInterface $configWriter;

    public function __construct(WriterInterface $configWriter)
    {
        $this->configWriter = $configWriter;
    }

    public static function getDependencies() : array
    {
        return [];
    }

    public function getAliases() : array
    {
        return [];
    }

    public function apply() : DataPatchInterface
    {
        $this->configWriter->save('smile_elasticsuite_telemetry/telemetry/enabled', '0');
        $this->configWriter->save('smile_elasticsuite_tracker/general/enabled', '0');

        return $this;
    }
}
