<?php
namespace Lukasbableck\ContaoBackendViewTransitionBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Lukasbableck\ContaoBackendViewTransitionBundle\ContaoBackendViewTransitionBundle;

class Plugin implements BundlePluginInterface {
	public function getBundles(ParserInterface $parser): array {
		return [BundleConfig::create(ContaoBackendViewTransitionBundle::class)->setLoadAfter([ContaoCoreBundle::class])];
	}
}
